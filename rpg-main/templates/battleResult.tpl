{extends file="layout.tpl"}

{block name="content"}
<main style="padding-top: 70px;">
    {if isset($battle)}
        <div class="battle-result">
            <h4>Battle Result</h4>

            {assign var="fighter1" value=$battle->getFighter1()}
            {assign var="fighter2" value=$battle->getFighter2()}

            <div class="fighter">
                <h5>{$fighter1->getName()} ({$fighter1->getRole()})</h5>
                <ul>
                    <li>Health: {$fighter1->getHealth()} / {$battle->getFighter1OriginalHealth()}</li>
                    <li>Attack: {$fighter1->getAttack()}</li>
                    <li>Defense: {$fighter1->getDefense()}</li>
                    <li>Range: {$fighter1->getRange()}</li>

                    {if $fighter1->getRole() == "Warrior"}
                        <li>Rage: {$fighter1->getRage()}</li>
                    {/if}
                    {if $fighter1->getRole() == "Mage"}
                        <li>Mana: {$fighter1->getMana()}</li>
                    {/if}
                    {if $fighter1->getRole() == "Rogue"}
                        <li>Energy: {$fighter1->getEnergy()}</li>
                    {/if}
                    {if $fighter1->getRole() == "Healer"}
                        <li>Spirit: {$fighter1->getSpirit()}</li>
                    {/if}
                    {if $fighter1->getRole() == "Tank"}
                        <li>Shield: {$fighter1->getShield()}</li>
                    {/if}
                </ul>
            </div>

            <div class="fighter">
                <h5>{$fighter2->getName()} ({$fighter2->getRole()})</h5>
                <ul>
                    <li>Health: {$fighter2->getHealth()} / {$battle->getFighter2OriginalHealth()}</li>
                    <li>Attack: {$fighter2->getAttack()}</li>
                    <li>Defense: {$fighter2->getDefense()}</li>
                    <li>Range: {$fighter2->getRange()}</li>

                    {if $fighter2->getRole() == "Warrior"}
                        <li>Rage: {$fighter2->getRage()}</li>
                    {/if}
                    {if $fighter2->getRole() == "Mage"}
                        <li>Mana: {$fighter2->getMana()}</li>
                    {/if}
                    {if $fighter2->getRole() == "Rogue"}
                        <li>Energy: {$fighter2->getEnergy()}</li>
                    {/if}
                    {if $fighter2->getRole() == "Healer"}
                        <li>Spirit: {$fighter2->getSpirit()}</li>
                    {/if}
                    {if $fighter2->getRole() == "Tank"}
                        <li>Shield: {$fighter2->getShield()}</li>
                    {/if}
                </ul>
            </div>

            {if isset($battleResult)}
                <div class="battle-log">
                    <strong>Resultaat van de ronde:</strong>
                    <div>{$battleResult}</div>
                </div>
            {/if}

            {assign var="fighter1Defeated" value=($fighter1->getHealth() <= 0)}
            {assign var="fighter2Defeated" value=($fighter2->getHealth() <= 0)}

            <form action="index.php?page=battleRound" method="POST">
                <fieldset {if $fighter1Defeated || $fighter2Defeated}disabled{/if}>
                    <label for="attack_fighter1">Kies aanval voor {$fighter1->getName()}:</label>
                    <select name="attack_fighter1" id="attack_fighter1">
                        <option value="normal" selected>Normal Attack</option>
                        {if $fighter1->getRole() == "Warrior"}
                            <option value="rageAttack">Rage Attack</option>
                            <option value="whirlwind">Whirlwind</option>
                        {/if}
                        {if $fighter1->getRole() == "Mage"}
                            <option value="fireBall">Fireball</option>
                            <option value="frostNova">FrostNova</option>
                        {/if}
                        {if $fighter1->getRole() == "Rogue"}
                            <option value="sneakAttack">Sneak Attack</option>
                            <option value="poisonDagger">Poison Dagger</option>
                        {/if}
                        {if $fighter1->getRole() == "Healer"}
                            <option value="healing">Healing Prayer</option>
                            <option value="divineShield">Divine Shield</option>
                        {/if}

                        {if $fighter1->getRole() == "Tank"}
                            <option value="barrierShield">Barrier Shield</option>
                            <option value="Taunt">Taunt</option>
                        {/if}
                    </select>

                    <br><br>

                    <label for="attack_fighter2">Kies aanval voor {$fighter2->getName()}:</label>
                    <select name="attack_fighter2" id="attack_fighter2">
                        <option value="normal" selected>Normal Attack</option>
                        {if $fighter2->getRole() == "Warrior"}
                            <option value="rageAttack">Rage Attack</option>
                            <option value="whirlwind">Whirlwind</option>
                        {/if}
                        {if $fighter2->getRole() == "Mage"}
                            <option value="fireBall">Fireball</option>
                            <option value="frostNova">FrostNova</option>
                        {/if}
                        {if $fighter2->getRole() == "Rogue"}
                            <option value="sneakAttack">Sneak Attack</option>
                            <option value="poisonDagger">Poison Dagger</option>
                        {/if}
                        {if $fighter2->getRole() == "Healer"}
                            <option value="healing">Healing Prayer</option>
                            <option value="divineShield">Divine Shield</option>
                        {/if}
                        {if $fighter1->getRole() == "Tank"}
                            <option value="barrierShield">Barrier Shield</option>
                            <option value="Taunt">Taunt</option>
                        {/if}
                    </select>

                    <br><br>

                    <button type="submit" class="btn btn-success">Fight Round</button>
                </fieldset>
            </form>

            <form action="index.php?page=resetHealth" method="POST" style="display:inline;">
                <button type="submit" class="btn btn-warning">Reset Health</button>
            </form>
            <form action="index.php?page=battleForm" method="POST" style="display:inline;">
                <button type="submit" class="btn btn-primary">Terug</button>
            </form>
        </div>
    {/if}
</main>
{/block}
