{extends file="layout.tpl"}

{block name="style"}
    <div class="card-body" style="padding: 20px; margin: 20px;">
        <h2>Database Connectie Status</h2>
        <p>
            {if isset($message)}
                {$message}
            {else}
                Geen status beschikbaar.
            {/if}
        </p>
    </div>
{/block}