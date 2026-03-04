<?php

namespace Game;

use Game\Character;

class Healer extends Character
{
    private int $spirit;
    private int $originalSpirit;

    public function __construct(string $name, string $role, int $health, int $attack, int $defense = 6, int $range = 3, int $spirit = 200)
    {
        parent::__construct($name, $role, $health, $attack, $defense, $range);
        $this->spirit = $spirit;
        $this->originalSpirit = $spirit;
        $this->specialAttacks = ['healingPrayer', 'divineShield'];
    }

    public function getSpirit(): int
    {
        return $this->spirit;
    }

    public function setSpirit(int $spirit): void
    {
        $this->spirit = $spirit;
    }

    public function performHealingPrayer(): string
    {
        if ($this->spirit >= 30) {
            $this->spirit -= 30;

            $healingAmount = 20;
            $newHealth = $this->getHealth() + $healingAmount;
            if ($newHealth > $this->getHealth()) {
                $newHealth = $this->getHealth(); // Let op: deze check is onlogisch. Waarschijnlijk bedoel je een maximale waarde.
            }
            $this->setHealth($newHealth);

            $attackMod = 0;
            $defenseMod = $this->defense * 2;
            $modResult = $this->modifyTemporaryStats($attackMod, $defenseMod);

            return "Healing Prayer performed. Healed for 20 HP and 2x defense. $modResult";
        }

        return "Not enough spirit to perform Healing Prayer.";
    }

    public function castDivineShield(): string
    {
        if ($this->spirit < 60) {
            return "Not enough spirit to perform Divine Shield.";
        }

        $this->spirit -= 60;

        $attackMod = $this->attack * 0.3;
        $defenseMod = $this->defense * 1.5;

        $modResult = $this->modifyTemporaryStats($attackMod, $defenseMod);

        return "Divine Shield activated! $modResult";
    }

    public function executeSpecialAttacks(string $attackName): string
    {
        switch ($attackName) {
            case 'healingPrayer':
                return $this->performHealingPrayer();

            case 'divineShield':
                return $this->castDivineShield();

            default:
                return "Unknown special attack: {$attackName}";
        }
    }

    public function resetAttributes(): void
    {
        $this->spirit = $this->originalSpirit;
    }

    public function getSummary(): string
    {
        $summary = parent::getSummary();
        $spiritStatus = "This healer possesses {$this->spirit} spirit power.";
        return $summary . $spiritStatus;
    }
}
