<?php
/* Smarty version 5.4.4, created on 2025-05-18 11:37:03
  from 'file:characterCreated.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.4',
  'unifunc' => 'content_6829c65f210c74_40372732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84b19e9d5dda86e749f9399e7da7ce40aaa33802' => 
    array (
      0 => 'characterCreated.tpl',
      1 => 1747565433,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6829c65f210c74_40372732 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20370150306829c65f1aedc9_98684960', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_20370150306829c65f1aedc9_98684960 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
?>

    <?php if ($_smarty_tpl->getValue('success')) {?>
        <div class="success" style="color: green;"><?php echo $_smarty_tpl->getValue('success');?>
</div>
    <?php }?>
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="card-title"><?php echo $_smarty_tpl->getValue('newCharacter')->getName();?>
</h2>
        </div>
        <div class="card-body">
            <p><strong>HP:</strong> <?php echo $_smarty_tpl->getValue('newCharacter')->getHealth();?>
</p>
            <p><strong>Attack:</strong> <?php echo $_smarty_tpl->getValue('newCharacter')->getAttack();?>
</p>
            <p><strong>Defense:</strong> <?php echo $_smarty_tpl->getValue('newCharacter')->getDefense();?>
</p>
            <p><strong>Range:</strong> <?php echo $_smarty_tpl->getValue('newCharacter')->getRange();?>
</p>
            <p><strong>Role:</strong> <?php echo $_smarty_tpl->getValue('newCharacter')->getRole();?>
</p>

            <h5>Inventory:</h5>
            <ul class="list-group">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('newCharacter')->getInventory()->getItems(), 'item');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('item')->value) {
$foreach0DoElse = false;
?>
                    <li class="list-group-item"><?php echo $_smarty_tpl->getValue('item');?>
</li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        </div>

    </div>
<?php
}
}
/* {/block "content"} */
}
