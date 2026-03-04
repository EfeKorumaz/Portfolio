<?php
/* Smarty version 5.4.4, created on 2025-06-02 13:08:36
  from 'file:error.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.4',
  'unifunc' => 'content_683da2541d3430_73787050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f4c79e35274c88af911785278273ac432bfca83' => 
    array (
      0 => 'error.tpl',
      1 => 1748869711,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683da2541d3430_73787050 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1680340353683da2541c5ca3_38094053', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1680340353683da2541c5ca3_38094053 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
?>

    <div class="container mt-5">
    <div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error</h4>
        <p><?php echo (($tmp = $_smarty_tpl->getValue('errorMessage') ?? null)===null||$tmp==='' ? "An unexpected error occurred." ?? null : $tmp);?>
</p>
        <hr>
        <a href="index.php" class="btn btn-secondary">Back to Home</a></div>    </div><?php
}
}
/* {/block "content"} */
}
