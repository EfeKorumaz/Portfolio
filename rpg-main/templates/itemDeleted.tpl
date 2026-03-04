{extends file="layout.tpl"}

{block name="content"}
    <div class="container mt-5">
        <!-- Success Alert -->
        <div class="alert alert-success" role="alert">
            Item has been successfully deleted!
        </div>

        <!-- Deleted Item Details -->
        <div class="card">
            <div class="card-header bg-success text-white">
                <h2>Deleted Item Details</h2>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {$item->getId()}</p>
                <p><strong>Name:</strong> {$item->getName()}</p>
                <p><strong>Type:</strong> {$item->getType()}</p>
                <p><strong>Value:</strong> {$item->getValue()} gold</p>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <a href="index.php?page=listItems" class="btn btn-secondary">Back to Item List</a>
            <a href="index.php?page=createItem" class="btn btn-primary">Create New Item</a>
        </div>
    </div>
{/block}