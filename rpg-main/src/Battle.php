<?php
namespace Game;

class Battle
{
private int $fighter1OriginalHealth;
private int $fighter2OriginalHealth;



private Character $fighter1;
private Character $fighter2;

private array $battleLog = [];
private array $selectedAttacks = ['fighter1' => null, 'fighter2' => null];
private int $maxRounds = 10;
private int $roundNumber = 1;

public function __construct(
Character $fighter1,
Character $fighter2,
int $maxRounds = 10
)
{
$this->fighter1 = $fighter1;
$this->fighter2 = $fighter2;

$this->fighter1OriginalHealth = $fighter1->getHealth();
$this->fighter2OriginalHealth = $fighter2->getHealth();

$this->maxRounds = $maxRounds;
$this->roundNumber = 1;

$this->battleLog[] = "Battle Start!";

// Reset tijdelijke stats van beide fighters
$this->fighter1->resetTemporaryStats();
$this->fighter2->resetTemporaryStats();
}

public function setAttackForFighter(Character $fighter, ?string $attackName): void
{
if ($fighter === $this->fighter1) {
$this->selectedAttacks['fighter1'] = $attackName;
} elseif ($fighter === $this->fighter2) {
$this->selectedAttacks['fighter2'] = $attackName;
}
}

    public function getFighter1OriginalHealth(): int
    {
        return $this->fighter1OriginalHealth;
    }

    public function getFighter2OriginalHealth(): int
    {
        return $this->fighter2OriginalHealth;
    }


public function executeTurn(): string
{
if ($this->roundNumber > $this->maxRounds
|| !$this->fighter1->isAlive()
|| !$this->fighter2->isAlive()
) {
return "<strong>The battle is over.</strong><br>";
}

$output = "Round {$this->roundNumber} starts!<br>";

// Fighter1 valt aan met geselecteerde aanval
$attack1 = $this->selectedAttacks['fighter1'];
$output .= $this->executeAttack($this->fighter1, $this->fighter2, $attack1);

// Fighter2 valt alleen aan als nog leeft
if ($this->fighter2->isAlive()) {
$attack2 = $this->selectedAttacks['fighter2'];
$output .= $this->executeAttack($this->fighter2, $this->fighter1, $attack2);
}

// Reset geselecteerde aanvallen
$this->selectedAttacks = ['fighter1' => null, 'fighter2' => null];

// Reset tijdelijke stats van beide fighters
$this->fighter1->resetTemporaryStats();
$this->fighter2->resetTemporaryStats();

$this->roundNumber++;

return $output;
}

private  function executeAttack(Character $attacker, Character $defender, ?string $specialAttack = null): string
{
$message = "";

if ($specialAttack !== null && method_exists($attacker, 'executeSpecialAttack')) {
$result = $attacker->executeSpecialAttacks($specialAttack);
if ($result) {
$message .= "<em>{$result}</em><br>";
}
} else {
// Gewone aanval
$damage = max(0, $attacker->getAttack() - $defender->getDefense());
$defender->setHealth($defender->getHealth() - $damage);
$message .= "{$attacker->getName()} attacks {$defender->getName()} for {$damage} damage!<br>";
}

// Check of verdediger is verslagen
if (!$defender->isAlive()) {
$message .= "<strong>{$defender->getName()} has been defeated!</strong><br>";
}

$this->battleLog[] = strip_tags($message, '<br><em><strong>');

        return $message;
        }

        public function getBattleLog(): array
        {
        return $this->battleLog;
        }

        // Voeg deze getters toe:
        public function getFighter1(): Character
        {
        return $this->fighter1;
        }

        public function getFighter2(): Character
        {
        return $this->fighter2;
        }

    public function endBattle(): void
    {
        // Reset health van beide fighters naar origineel
        $this->fighter1->setHealth($this->fighter1OriginalHealth);
        $this->fighter2->setHealth($this->fighter2OriginalHealth);

        // Reset overige tijdelijke stats
        $this->fighter1->resetTemporaryStats();
        $this->fighter2->resetTemporaryStats();

        // Reset attributes naar originele
        $this->fighter1->resetAttributes();
        $this->fighter2->resetAttributes();

        // Optioneel: reset ronde nummer en battle log
        $this->roundNumber = 1;
        $this->battleLog = ["Battle reset!"];
    }


}

