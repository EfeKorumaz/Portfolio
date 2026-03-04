<?php

namespace Game;

class Warrior extends Character
{
    private ?int $rage = null;
    private int $originalRage;

    public function __construct(
        string $name,
        string $role,
        int $health,
        int $attack,
        int $defense = 2,
        int $range = 1,
        int $rage = 100,
    ) {
        parent::__construct($name, $role, $health, $attack, $defense, $range);
        $this->rage = $rage;
        $this->originalRage = $rage;
        $this->specialAttacks = ['rageAttack', 'whirlwind'];
    }

    public function setRage(int $rage): void
    {
        $this->rage = $rage;
    }

    public function getRage(): int
    {
        return $this->rage;
    }

    public function performRageAttack(): string
    {
        if ($this->rage >= 25) {
            $this->rage -= 25;

            $attackMod = $this->attack * 0.75;
            $defenseMod = $this->defense * 0.3;

            $modResult = $this->modifyTemporaryStats($attackMod, $defenseMod);

            return "Rage attack performed. $modResult";
        }

        return "Not enough rage.";
    }

    public function performWhirlwind(): string
    {
        if ($this->rage < 35) {
            return "Not enough rage to perform Whirlwind!";
        }

        $attackMod = (int)($this->attack * 0.6);
        $defenseMod = (int)($this->defense * 0.5);

        $this->rage -= 35;

        $modResult = $this->modifyTemporaryStats($attackMod, $defenseMod);

        return "Whirlwind performed! $modResult";
    }

    public function executeSpecialAttacks(string $attackName): string
    {
        switch ($attackName) {
            case 'rageAttack':
                return $this->performRageAttack();

            case 'whirlwind':
                return $this->performWhirlwind();

            default:
                return "Unknown special attack: {$attackName}";
        }
    }

    public function resetAttributes(): void
    {
        $this->rage = $this->originalRage;
    }



    public function getSummary(): string
    {
        $summary = parent::getSummary();
        $rageStatus = "Additionally, this warrior has {$this->rage} rage left.";
        return $summary . $rageStatus;
    }
}
