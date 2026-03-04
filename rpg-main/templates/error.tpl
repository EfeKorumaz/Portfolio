{extends file="layout.tpl"}{block name="content"}
    <div class="container mt-5">
    <div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error</h4>
        <p>{$errorMessage|default:"An unexpected error occurred."}</p>
        <hr>
        <a href="index.php" class="btn btn-secondary">Back to Home</a></div>    </div>{/block}