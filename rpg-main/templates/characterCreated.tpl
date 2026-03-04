{extends file="layout.tpl"}

{block name="content"}
    {if $success}
        <div class="success" style="color: green;">{$success}</div>
    {/if}
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="card-title">{$newCharacter->getName()}</h2>
        </div>
        <div class="card-body">
            <p><strong>HP:</strong> {$newCharacter->getHealth()}</p>
            <p><strong>Attack:</strong> {$newCharacter->getAttack()}</p>
            <p><strong>Defense:</strong> {$newCharacter->getDefense()}</p>
            <p><strong>Range:</strong> {$newCharacter->getRange()}</p>
            <p><strong>Role:</strong> {$newCharacter->getRole()}</p>

            <h5>Inventory:</h5>
            <ul class="list-group">
                {foreach $newCharacter->getInventory()->getItems() as $item}
                    <li class="list-group-item">{$item}</li>
                {/foreach}
            </ul>
        </div>

    </div>
{/block}