{extends file="layout.tpl"}

{block name="content"}
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="card-title">{$character->getName()}</h2>
        </div>
        <div class="card-body">

            <p><strong>Summary:</strong> {$character->getSummary()}</p>

            {if $character->getRole() == "Warrior" && $character->getRage() !== null}
                <p><strong>Rage:</strong> {$character->getRage()}</p>
            {/if}

            {if $character->getRole() == "Mage" && $character->getMana() !== null}
                <p><strong>Mana:</strong> {$character->getMana()}</p>
            {/if}

            {if $character->getRole() == "Rogue" && $character->getEnergy() !== null}
                <p><strong>Energy:</strong> {$character->getEnergy()}</p>
            {/if}

            {if $character->getRole() == "Healer" && $character->getSpirit() !== null}
                <p><strong>Spirit:</strong> {$character->getSpirit()}</p>
            {/if}

            {if $character->getRole() == "Tank" && $character->getshield() !== null}
                <p><strong>Shield:</strong> {$character->getShield()}</p>
            {/if}


            <ul class="list-group mt-3">
                {foreach $character->getInventory()->getItems() as $item}
                    <li class="list-group-item">{$item}</li>
                {/foreach}
            </ul>
        </div>

        <a href="index.php?page=listCharacters" class="btn btn-primary mt-3">Terug naar lijst</a>
    </div>

    {if isset($battleResult)}
        <div class="battle-result mt-4">
            <h4>Battle Result</h4>
            <div>{$battleResult}</div>
        </div>
    {/if}
{/block}
