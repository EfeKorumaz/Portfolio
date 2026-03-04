<?php
/* Smarty version 5.4.4, created on 2025-05-19 09:55:57
  from 'file:characterStatistics.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.4',
  'unifunc' => 'content_682b002de54b10_78657403',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13f3b67d8d568ccd62bd743e61f4e595d1f9546f' => 
    array (
      0 => 'characterStatistics.tpl',
      1 => 1747648556,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_682b002de54b10_78657403 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2106968302682b002de39455_23537668', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_2106968302682b002de39455_23537668 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
?>

    <div class="container mt-4">
        <h2>Character Statistics</h2>

        <p><strong>Totaal aantal characters:</strong> <?php echo $_smarty_tpl->getValue('totalCharacters');?>
</p>

        <h4>Character Types</h4>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Type</th>
                <th>Aantal</th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('characterTypes'), 'count', false, 'type');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('type')->value => $_smarty_tpl->getVariable('count')->value) {
$foreach0DoElse = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getValue('type');?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('count');?>
</td>
                </tr>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>

        <h4>Alle Character Namen</h4>
        <ul class="list-group mb-4">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('existingNames'), 'name');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('name')->value) {
$foreach1DoElse = false;
?>
                <li class="list-group-item"><?php echo $_smarty_tpl->getValue('name');?>
</li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
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
<?php
}
}
/* {/block "content"} */
}
