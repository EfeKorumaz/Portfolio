<?php
/* Smarty version 5.4.4, created on 2025-06-02 12:51:32
  from 'file:createItem.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.4',
  'unifunc' => 'content_683d9e54dd86c3_80730577',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82039647b3595c617427d3327d3b833c1d9a07e1' => 
    array (
      0 => 'createItem.tpl',
      1 => 1748868645,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683d9e54dd86c3_80730577 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1471041150683d9e54db4573_26653487', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1471041150683d9e54db4573_26653487 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
?>


    <?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>
        <div class="alert alert-danger">
            <?php echo $_smarty_tpl->getValue('error');?>

        </div>
    <?php }?>

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
<?php
}
}
/* {/block "content"} */
}
