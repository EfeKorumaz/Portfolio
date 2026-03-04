<?php

namespace Game;

interface Database
{
    /**
     * @param string $host
     * @param string $database
     * @param string $user
     * @param string $password
     * @return mixed
     */

    public function connect(string $host, string $database, string $user, string $password);

    /*
     * insert into table SET
     * $user = user, data = [username, password]
     */

    /**
     * @param string $table
     * @param string[] $data
     * @return int
     */
    public function insert(string $table, array $data): int;


    /*
        * UPDATE user SET username=:username, password =:password WHERE id= 5]
        */

    /**
     * @param string $table
     * @param string[] $data
     * @param string[] $conditions
     * @return int
     */
    public function update( string $table, array $data, array $conditions ): int;

    /*
     * DELETE FROM user WHERE id= 4
     */

    /**
     * @param string $table
     * @param string[] $data
     * @return mixed
     */
    public function delete(string $table, array $data);

    /*
     * SELECT kolom1, kolom2 FROM table
     * SELECT kolom1, kolom2 FROM table
     * SELECT user.name, schoolclass.name FROM user.schoolclass WHERE user.schoolclassid = schoolclass.id
     * SELECT user.name FROM user WHERE schoolclass.name LIKE "_M%"
     * SELECT order.date FROM order WHERE order.date BETWEEN 10--5-2002 AND 15-5-2003
     * data = [user=> [name, email];
     * 'order'=>[id, date];
     * ]
     * $conditions = []
     * user.id = 5
     * order.date LIKE '%0%'
     */

    /**
     * @param string[][] $tableColumns
     * @param string[] $conditions
     * @return array
     */
    public function select(array $tableColumns, array $conditions): array;

    /**
     * @return bool
     */
    public function testConnection():bool;

    /**
     * @return int
     */
    public function getLastInsertId():int;

}