<?php
/* Smarty version 5.4.4, created on 2025-06-08 11:33:39
  from 'file:itemList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.4',
  'unifunc' => 'content_684575132f0de3_49987574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5fb44d6aa3b90d736140c801ecf46ae9e97738b8' => 
    array (
      0 => 'itemList.tpl',
      1 => 1749382415,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_684575132f0de3_49987574 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9875903036845751323cf39_70666103', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "content"} */
class Block_9875903036845751323cf39_70666103 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
?>



    <h1>Item List</h1>
    <!-- Combined Filter Section -->
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white"><h3>Filter Items</h3></div>
        <div class="card-body">            <!-- Unified Filter Form -->
            <form action="index.php?page=listItems" method="POST"><input type="hidden" name="type" id="type"
                                                                         value="<?php echo (($tmp = $_smarty_tpl->getValue('selectedType') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"> <input
                        type="hidden" name="minValue" value="<?php echo (($tmp = $_smarty_tpl->getValue('minValue') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"> <input type="hidden" name="id"
                                                                                             value="<?php echo (($tmp = $_smarty_tpl->getValue('selectedId') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <input type="hidden" name="name" value="<?php echo (($tmp = $_smarty_tpl->getValue('searchName') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                <div class="mb-4"><h4>Filter by Type:</h4>
                    <div class="btn-group" role="group">
                        <button type="submit" class="btn btn-outline-primary <?php if (!$_smarty_tpl->getValue('selectedType')) {?>active<?php }?>"
                                onclick="document.getElementById('type').value=''">All Items
                        </button>
                        <button type="submit" class="btn btn-outline-primary <?php if ($_smarty_tpl->getValue('selectedType') == 'weapon') {?>active<?php }?>"
                                onclick="document.getElementById('type').value='weapon'">Weapons
                        </button>
                        <button type="submit" class="btn btn-outline-primary <?php if ($_smarty_tpl->getValue('selectedType') == 'armor') {?>active<?php }?>"
                                onclick="document.getElementById('type').value='armor'">Armor
                        </button>
                        <button type="submit"
                                class="btn btn-outline-primary <?php if ($_smarty_tpl->getValue('selectedType') == 'consumable') {?>active<?php }?>"
                                onclick="document.getElementById('type').value='consumable'">Consumables
                        </button>
                        <button type="submit" class="btn btn-outline-primary <?php if ($_smarty_tpl->getValue('selectedType') == 'misc') {?>active<?php }?>"
                                onclick="document.getElementById('type').value='misc'">Misc
                        </button>
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-md-4"><label for="minValue" class="form-label">Minimum Value:</label>
                        <div class="input-group"><input type="number" class="form-control" id="minValue" name="minValue"
                                                        min="0" step="0.01" value="<?php echo (($tmp = $_smarty_tpl->getValue('minValue') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"> <span
                                    class="input-group-text">gold</span></div>
                    </div>
                    <div class="col-md-4">
                        <label for="id" class="form-label">Item ID:</label>
                        <input type="number"
                               class="form-control"
                               id="id" name="id"
                               min="1"
                               value="<?php echo (($tmp = $_smarty_tpl->getValue('selectedId') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                    </div>
                    <div class="col-md-4"><label for="name" class="form-label">Name Contains:</label>
                        <input type="text"
                               class="form-control"
                               id="name"
                               name="name"
                               value="<?php echo (($tmp = $_smarty_tpl->getValue('searchName') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                    <a href="index.php?page=listItems" class="btn btn-secondary">Clear All Filters</a></div>
            </form>
        </div>
    </div>
    <!-- Items List -->
    <div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <h2>                <?php if ((true && ($_smarty_tpl->hasVariable('selectedType') && null !== ($_smarty_tpl->getValue('selectedType') ?? null))) || (true && ($_smarty_tpl->hasVariable('minValue') && null !== ($_smarty_tpl->getValue('minValue') ?? null))) || (true && ($_smarty_tpl->hasVariable('selectedId') && null !== ($_smarty_tpl->getValue('selectedId') ?? null))) || (true && ($_smarty_tpl->hasVariable('searchName') && null !== ($_smarty_tpl->getValue('searchName') ?? null)))) {?>                    Filtered Items                <?php } else { ?>                <?php }?>
            All Items </h2>
        <div class="mt-2 text-white"><small> Filters applied: <?php if ((true && ($_smarty_tpl->hasVariable('selectedType') && null !== ($_smarty_tpl->getValue('selectedType') ?? null)))) {?><span class="badge bg-info">
                    Type: <?php echo $_smarty_tpl->getValue('selectedType');?>
</span><?php }?>                    <?php if ((true && ($_smarty_tpl->hasVariable('minValue') && null !== ($_smarty_tpl->getValue('minValue') ?? null)))) {?><span
                        class="badge bg-info">
                    Min Value: <?php echo $_smarty_tpl->getValue('minValue');?>
 gold</span><?php }?>                    <?php if ((true && ($_smarty_tpl->hasVariable('selectedId') && null !== ($_smarty_tpl->getValue('selectedId') ?? null)))) {?><span
                        class="badge bg-info">ID: <?php echo $_smarty_tpl->getValue('selectedId');?>
</span><?php }?>                    <?php if ((true && ($_smarty_tpl->hasVariable('searchName') && null !== ($_smarty_tpl->getValue('searchName') ?? null)))) {?>
                    <span class="badge bg-info">Name: "<?php echo $_smarty_tpl->getValue('searchName');?>
"</span><?php }?>                </small></div>
    </div>
    <div class="card-body">            <?php if (( !$_smarty_tpl->hasVariable('items') || empty($_smarty_tpl->getValue('items')))) {?>
            <div class="alert alert-info"> No items found matching your criteria.</div>
        <?php } else { ?>            <?php }?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('items'), 'item');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('item')->value) {
$foreach0DoElse = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getValue('item')->getId();?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('item')->getName();?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('item')->getType();?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('item')->getValue();?>
 gold</td>
                    <td><a href="index.php?page=updateItem&id=<?php echo $_smarty_tpl->getValue('item')->getId();?>
" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?page=deleteItem&id=<?php echo $_smarty_tpl->getValue('item')->getId();?>
" class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                </tr>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        <p class="mt-3">Total items displayed: <strong><?php echo (($tmp = $_smarty_tpl->getValue('itemCount') ?? null)===null||$tmp==='' ? $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('items')) ?? null : $tmp);?>
</strong></p></div>
    <div class="card-footer"><a href="index.php?page=createItem" class="btn btn-primary">Create New Item</a> <a
                href="index.php" class="btn btn-secondary">Back to Home</a></div>    </div><?php
}
}
/* {/block "content"} */
}
