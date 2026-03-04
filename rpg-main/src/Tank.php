<?php

namespace Game;

use Game\Character;

class Tank extends Character
{
    private int $shield;
    private int $originalShield;

    public function __construct(string $name, string $role, int $health, int $attack, int $defense = 10, int $range = 1, int $shield = 50)
    {
        parent::__construct($name, $role, $health, $attack, $defense, $range);

        $this->shield = $shield;
        $this->originalShield = $shield;
        $this->specialAttacks = ['barrierShield', 'taunt'];
    }

    public function activateBarrierShield(): string
    {
        if ($this->shield >= 15) {
            $this->shield -= 15;

            $attackMod = (int)($this->attack * 0.5);
            $defenseMod = (int)($this->defense * 2);

            $modResult = $this->modifyTemporaryStats($attackMod, $defenseMod);

            return "Shield has been raised, dfs doubled and atk lowered by 50%. $modResult";
        }

        return "Not enough energy to activate Barrier Shield.";
    }

    public function performTaunt(): string
    {
        if ($this->shield < 10) {
            return "Not enough energy to perform Taunt.";
        }

        $this->shield -= 10;

        $attackMod = (int)($this->attack * 0.4);
        $defenseMod = (int)($this->defense * 1.3);

        $modResult = $this->modifyTemporaryStats($attackMod, $defenseMod);

        return "Taunt activated: Atk 40%, Dfs 130%. $modResult";
    }

    public  function executeSpecialAttacks(string $attackName): string
    {
        switch ($attackName) {
            case 'barrierShield':
                return $this->activateBarrierShield();

            case 'Taunt':
                return $this->performTaunt();

            default:
                return "Unknown special attack: {$attackName}";
        }
    }

    public function resetAttributes(): void
    {
        $this->shield = $this->originalShield;
    }

    public function getSummary(): string
    {
        $summary = parent::getSummary();
        $tankStatus = "This tank has a shield with {$this->shield} durability.";
        return $summary . $tankStatus;
    }

    public function getShield(): int
    {
        return $this->shield;
    }

    public function setShield(int $shield): void
    {
        $this->shield = $shield;
    }
}
