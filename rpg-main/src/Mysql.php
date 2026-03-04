<?php

namespace Game;

use Exception;
use PDO;
use PDOException;


class Mysql implements Database
{
    private PDO $connection;

    public function __construct(string $host, string $database, string $user, string $password)
    {
        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$database", $user, $password);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            echo "Connected successfully";
        } catch (PDOException $error) {
            throw new PDOException($error->getMessage());
        }
    }

    /**
     * @param string $host
     * @param string $database
     * @param string $user
     * @param string $password
     * @return mixed
     */
    public function connect(string $host, string $database, string $user, string $password)
    {
        // TODO: Implement connect() method.
    }

    /**
     * @param string $table
     * @param array $data
     * @param array $conditions
     * @return mixed
     */
    public function insert(string $table, array $data): int
    {
        try {


            $columns = array_keys($data);
            $placeholders = ":" . implode(", :", $columns);
            $columnList = implode(", ", $columns);
            $sql = "INSERT INTO {$table} ({$columnList}) VALUES ({$placeholders})";
            $statement = $this->connection->prepare($sql);


            foreach ($data as $key => $value) {
                $statement->bindValue(':' . $key, $value);
            }
            $statement->execute();
            return $this->connection->lastInsertId();
        } catch (PDOException $error) {
            throw new PDOException("Fout bij insert: " . $error->getMessage());
        }
    }



    /**
     * @param string $table
     * @param array $data
     * @param array $conditions
     * @return int
     */
    public function update(string $table, array $data, array $conditions): int
    {
        try {
            if (empty($conditions)) {
                throw new Exception("No conditions provided");
            }

            $setClause = [];

            foreach ($data as $column => $value) {
                $setClause[] = "{$column} = :{$column}"; //
            }
            $setClauseString = implode(', ', $setClause); // name =:name, email = :email: string
            $whereClause = "id = :id";

            $sql = "UPDATE {$table} SET {$setClauseString} WHERE {$whereClause}";
            $statement = $this->connection->prepare($sql);
            foreach ($data as $column => $value) {
                $statement->bindValue(':' . $column, $value);
            }

            $statement->bindValue(':id', $conditions['id']);
            $statement->execute();
            return $statement->rowCount();
        } catch (PDOException $error) {
            throw new PDOException($error->getMessage());
        }
    }

    /**
     * @param string $table
     * @param array $data
     * @return mixed
     */
    public function delete(string $table, array $data)
    {
        try {
            if (!isset($conditions['id']))
            {
                throw new Exception("No conditions provided");
            }
            $sql = "DELETE FROM {$table} WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $statement->bindValue(':id', $conditions['id']);
            $statement->execute();
            return $statement->rowCount();
        }catch(PDOException $error){
            throw new PDOException("Delete failed". $error->getMessage());
        }
    }

    /**
     * @param string[][] $tableColumns
     * @param string[] $conditions
     * @return array
     * @throws Exception
     */
    public function select(array $tableColumns, array $conditions = []): array
    {

        try {


            $columns = [];
            foreach ($tableColumns as $table => $cols) {
                foreach ($cols as $col) {
                    if ($col === "*") {
                        $columns[] = "{$table}.*";
                    } // user.*

                    else {
                        $columns[] = "{$table}.{$col}";// user.name or user.email
                    }

                }
            }
            $select = implode(', ', $columns); // Maakt de cols een string
            $tables = array_keys($tableColumns); // {user, order}
            $from = implode(', ', $tables);// user.order
            $query = "SELECT {$select} FROM {$from}"; //Select user.*, order.date FROM user.array
            $whereConditions = [];
            $parameters = [];
            $paramCount = 0;

            if (!empty($conditions)) {
                foreach ($conditions as $key => $value) // user.username LIKE === $var;
                {
                    $paramName = "param" . $paramCount++;

                    if (str_contains($key, " LIKE")) {
                        $columnNames = str_replace(" LIKE", "", $key);// user.username
                        $whereConditions = "{$columnNames} LIKE {$paramName}"; // user.username LIKE :param1
                        $parameters[$paramName] = "%value%"; // $paraments['param'] = $value
                    } elseif (str_contains($key, " BETWEEN")) {
                        $columnNames = str_replace(" BETWEEN", "", $key); // order.date
                        if (is_array($value) && count($value) === 2) {
                            $whereConditions[] = "$columnNames BETWEEN :param{$paramCount} AND :param" . $paramCount + 1;
                            $parameters['param' . $paramCount++] = $value[0];
                            $parameters['param' . $paramCount] = $value[1];
                        }

                    } elseif (preg_match('/\s+[<>=!]+$/', $key)) {
                        $parts = preg_split('/\s+/', trim($key), 2);
                        $columnNames = $parts[0];
                        $operator = $parts[1];
                        $whereConditions = "{$columnNames} {$operator} {$columnNames}";
                        $parameters[$paramName] = $value;
                    } elseif (str_contains($key, ".") && str_contains($value, ".")) {
                        //user.id = order.userid
                        $whereConditions = "$key = $value";
                    } else {
                        $whereConditions[] = "$key = :$paramName";
                        $parameters[$paramName] = $value;
                    }

                }

                if (!empty($whereConditions)) {
                    $query .= " WHERE " . implode(" AND ", $whereConditions);
                }
            }


            $statement = $this->connection->prepare($query);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);// {'name' == value} id === value
        } catch (PDOException $error) {
            throw new PDOException( $error->getMessage());
        }

    }

    /**
     * @return bool
     */
    public function testConnection(): bool
    {
        try {
            $test = $this->connection->query("SELECT 1");
            return $test !== false;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * @return int
     */
    public function getLastInsertId(): int
    {
        throw new Exception("Not implemented yet");
    }


}