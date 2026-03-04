{extends file="layout.tpl"}

{block name="content"}
    <h2>Start een gevecht</h2>
    {if isset($error)}
        <p style="color:red;">{$error}</p>
    {/if}
    <form method="post" action="index.php?page=startBattle">
        <label for="character1">Character 1:</label>
        <select name="character1" id="character1" required>
            {foreach $characters as $char}
                <option value="{$char->getName()}">{$char->getName()}</option>
            {/foreach}
        </select>

        <label for="character2">Character 2:</label>
        <select name="character2" id="character2" required>
            {foreach $characters as $char}
                <option value="{$char->getName()}">{$char->getName()}</option>
            {/foreach}
        </select>

        <br><br>
        <input type="submit" value="Start Battle">
    </form>
{/block}