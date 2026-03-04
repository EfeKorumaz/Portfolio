<?php
/* Smarty version 5.4.4, created on 2025-06-02 12:35:24
  from 'file:Database.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.4',
  'unifunc' => 'content_683d9a8c5e9ec6_64732631',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c41c8375f7f8382b1594a273d6521af9ec00c8e8' => 
    array (
      0 => 'Database.tpl',
      1 => 1747901453,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683d9a8c5e9ec6_64732631 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2087780711683d9a8c5997e7_60373076', "style");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "style"} */
class Block_2087780711683d9a8c5997e7_60373076 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
?>

    <div class="card-body" style="padding: 20px; margin: 20px;">
        <h2>Database Connectie Status</h2>
        <p>
            <?php if ((true && ($_smarty_tpl->hasVariable('message') && null !== ($_smarty_tpl->getValue('message') ?? null)))) {?>
                <?php echo $_smarty_tpl->getValue('message');?>

            <?php } else { ?>
                Geen status beschikbaar.
            <?php }?>
        </p>
    </div>
<?php
}
}
/* {/block "style"} */
}
