<?php

namespace Game;

abstract class Character
{
    private string $name;
    private string $role;
    private int $health = 100;
    protected int $attack;
    protected int $tempAttack = 0;
    protected int $defense;
    protected int $tempDefense = 0;
    private int $range;
    public static int $totalCharacters = 0;
    public static array $characterTypes = [];
    public static array $existingNames = [];
    private Inventory $inventory;
    protected array $specialAttacks = [];

    public function __construct(string $name, string $role, int $health, int $attack, int $defense = 5, int $range = 1)
    {
        $this->name = $name;
        $this->role = $role;
        $this->health = $health;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->range = $range;
        $this->inventory = new Inventory();

        self::$totalCharacters++; // verhoogt aantal characters met 1
        self::$characterTypes[] = $this->role; // voeg rol toe aan de lijst van characterTypes
        self::$existingNames[] = $this->name; // voeg naam toe aan de lijst van bestaande namen
    }

    public static function getCharacterTypeCount(string $type): int
    {
        // Tel hoe vaak elke type voorkomt
        $counts = array_count_values(self::$characterTypes);

        // Geef het aantal terug voor het gevraagde type, of 0 als het niet voorkomt
        return $counts[$type] ?? 0;
    }


    /**
     * @return array
     */
    public function getSpecialAttacks(): array
    {
        return $this->specialAttacks;
    }

    public function resetTemporaryStats()
    {
        // Implementatie indien nodig
    }

    protected abstract function executeSpecialAttacks(string $attackName): string;

    abstract public function resetAttributes(): void;

    public function getInventory(): Inventory
    {
        if (!isset($this->inventory)) {
            $this->inventory = new Inventory();
        }
        return $this->inventory;
    }

    // -- Static methoden voor sessiebeheer en statistieken --

    private static function loadFromSession(): void
    {
        if (isset($_SESSION['characterStats']) && is_array($_SESSION['characterStats'])) {
            $stats = $_SESSION['characterStats'];

            if (isset($stats['totalCharacters']) && is_int($stats['totalCharacters'])) {
                self::$totalCharacters = $stats['totalCharacters'];
            }

            if (isset($stats['characterTypes']) && is_array($stats['characterTypes'])) {
                self::$characterTypes = $stats['characterTypes'];
            }

            if (isset($stats['existingNames']) && is_array($stats['existingNames'])) {
                self::$existingNames = $stats['existingNames'];
            }
        }
    }

    private static function saveToSession(): void
    {
        $_SESSION['characterStats'] = [
            'totalCharacters' => self::$totalCharacters,
            'characterTypes' => self::$characterTypes,
            'existingNames' => self::$existingNames,
        ];
    }

    public static function getTotalCharacters(): int
    {
        return self::$totalCharacters;
    }

    public static function getAllCharacterNames(): array
    {
        return self::$existingNames;
    }

    public static function getCharacterTypes(): array
    {
        return self::$characterTypes;
    }

    public static function resetAllStatistics(): void
    {
        self::$totalCharacters = 1;
        self::$characterTypes = [];
        self::$existingNames = [];
        self::saveToSession();
    }

    public static function recalculateStatistics(CharacterList $characterList): void
    {
        self::resetAllStatistics();

        foreach ($characterList->getCharactersList() as $character) {
            self::$totalCharacters++;
            self::$characterTypes[] = $character->getRole();
            self::$existingNames[] = $character->getName();
        }

        self::saveToSession();
    }

    public static function removeCharacterFromStats(string $name, string $role): void
    {
        $nameIndex = array_search($name, self::$existingNames);
        $roleIndex = array_search($role, self::$characterTypes);

        // Alleen verwijderen als beide gevonden zijn
        if ($nameIndex !== false && $roleIndex !== false) {
            self::$totalCharacters = max(0, self::$totalCharacters - 1);

            unset(self::$existingNames[$nameIndex]);
            unset(self::$characterTypes[$roleIndex]);

            // Herindexeer de arrays zodat ze netjes doorlopen blijven
            self::$existingNames = array_values(self::$existingNames);
            self::$characterTypes = array_values(self::$characterTypes);

            // Optioneel: meteen opslaan in session
            self::saveToSession();
        }
    }

    public static function initalizeSession(): void
    {
        self::loadFromSession();
    }


    public static function saveSession(): void
    {
        self::saveToSession();
    }


    public function getAttack(): int
    {
        return $this->attack + $this->tempAttack;
    }

    public function getDefense(): int
    {
        return $this->defense + $this->tempDefense;
    }

    public function resetTempStats(): void
    {
        $this->tempAttack = 0;
        $this->tempDefense = 0;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getRange(): int
    {
        return $this->range;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setHealth($newHealth): string
    {
        if ($newHealth < 0) {
            return "the character is already dead";
        } else {
            return $this->health = $newHealth;
        }
    }

    protected function modifyTemporaryStats(int $attackMod, int $defenseMod): string
    {
        $this->tempAttack = $attackMod;
        $this->tempDefense = $defenseMod;

        return "Temporary stats updated: Attack modifier set to {$attackMod}, Defense modifier set to {$defenseMod}.";
    }

    public function takeDamage(int $amount): void
{
    $damageTaken = max(0, $amount - $this->getDefense());
    $this->health = max(0, $this->health - $damageTaken);
    echo "{$this->name} takes {$damageTaken} damage. Remaining health: {$this->health}<br>";
}


    public function attack(Character $opponent): string
    {
        $opponent->takeDamage($this->getAttack());
        return "<div class='attack-summary'>
                    <strong>{$this->getName()}</strong> attacks <strong>{$opponent->getName()}</strong> for {$this->getAttack()} damage!
                </div>";
    }

    public function isAlive(): bool
    {
        return $this->getHealth() > 0;
    }

    public function displayStats(): string
    {
        return "<div class='character-stats'>
                    <h3>{$this->getName()}'s Stats</h3>
                    <p><strong>Health:</strong> {$this->setHealth($this->getHealth())}</p>
                    <p><strong>Attack:</strong> {$this->getAttack()}</p>
                    <p><strong>Defense:</strong> {$this->getDefense()}</p>
                    <p><strong>Range:</strong> {$this->getRange()}</p>
                    <p><strong>Role:</strong> {$this->getRole()}</p>
                </div>";
    }

    public function getSummary(): string
    {
        return "<div class='character-summary'>
                    <h4>{$this->getName()} is a {$this->getRole()}</h4>
                    <p><strong>Attack:</strong> {$this->getAttack()}</p>
                    <p><strong>Health:</strong> {$this->setHealth($this->getHealth())} HP</p>
                    <p><strong>Defense:</strong> {$this->getDefense()}</p>
                    <p><strong>Range:</strong> {$this->getRange()}</p>
                </div>";
    }
}
