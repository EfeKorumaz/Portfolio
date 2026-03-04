{extends file="layout.tpl"}

{block name="content"}
    <h2>Characterlijst</h2>
    {if $characters|@count > 0}
        <table border="1">
            <thead>
            <tr>
                <th>Name</th>
                <th>Hp</th>
                <th>Attack</th>
                <th>Defence</th>
                <th>Range</th>
                <th>Role</th>
                <th>Bekijk</th>
                <th>Verwijder</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$characters item=char key=index}
                <tr>
                    <td>{$char->getName()}</td>
                    <td>{$char->getHealth()}</td>
                    <td>{$char->getAttack()}</td>
                    <td>{$char->getDefense()}</td>
                    <td>{$char->getRange()}</td>
                    <td>{$char->getRole()}</td>
                    <td>
                        <a href="index.php?page=viewCharacter&name={$char->getName()}">View</a>
                    </td>
                    <td>
                        <a href="index.php?page=deleteCharacter&name={$char->getName()}">Delete</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    {else}
        <p>Er zijn nog geen characters toegevoegd.</p>
    {/if}
{/block}
