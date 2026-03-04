{extends file="layout.tpl"}

{block name="content"}
    <div class="container mt-4">
        <h2>Character Statistics</h2>

        <p><strong>Totaal aantal characters:</strong> {$totalCharacters}</p>

        <h4>Character Types</h4>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Type</th>
                <th>Aantal</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$characterTypes item=count key=type}
                <tr>
                    <td>{$type}</td>
                    <td>{$count}</td>
                </tr>
            {/foreach}
            </tbody>
        </table>

        <h4>Alle Character Namen</h4>
        <ul class="list-group mb-4">
            {foreach from=$existingNames item=name}
                <li class="list-group-item">{$name}</li>
            {/foreach}
        </ul>

        <div class="d-flex gap-3">
            <a href="index.php?page=resetStats" class="btn btn-danger">
                🔄 Reset Statistics
            </a>
            <a href="index.php?page=recalculateStats" class="btn btn-primary">
                ♻️ Recalculate Statistics
            </a>
        </div>
    </div>
{/block}
