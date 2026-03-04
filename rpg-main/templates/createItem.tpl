{extends file="layout.tpl"}
{block name="content"}

    {if isset($error)}
        <div class="alert alert-danger">
            {$error}
        </div>
    {/if}

    <div class="container mt-5">
        <div class="card">
            <div class="card-header"><h4>Create Item</h4></div>
            <div class="card-body">
                <form action="index.php?page=saveItem" method="POST">
                    <div class="form-group mb-3"><label for="name">Name</label> <input type="text" class="form-control"
                                                                                       id="name" name="name" required>
                    </div>
                    <div class="form-group mb-3"><label for="type">Type</label> <select class="form-control" id="type"
                                                                                        name="type" required>
                            <option value="" disabled selected>Choose Type</option>
                            <option value="weapon">Weapon</option>
                            <option value="armor">Armor</option>
                            <option value="consumable">Consumable</option>
                            <option value="misc">Misc</option>
                        </select></div>
                    <div class="form-group mb-3"><label for="value">Value</label> <input type="number"
                                                                                         class="form-control" id="value"
                                                                                         name="value" step="0.01"
                                                                                         min="0" required></div>
                    <button type="submit" class="btn btn-primary">Create Item</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a></form>
            </div>
        </div>
    </div>
{/block}