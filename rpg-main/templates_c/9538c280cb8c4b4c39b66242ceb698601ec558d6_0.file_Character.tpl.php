<?php
/* Smarty version 5.4.4, created on 2025-05-19 10:06:30
  from 'file:Character.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.4',
  'unifunc' => 'content_682b02a668fe54_06720636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9538c280cb8c4b4c39b66242ceb698601ec558d6' => 
    array (
      0 => 'Character.tpl',
      1 => 1747615644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_682b02a668fe54_06720636 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_633092164682b02a6600279_85018445', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_633092164682b02a6600279_85018445 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
?>

    <div class="card mb-4">
        <div class="card-header">
            <h2 class="card-title"><?php echo $_smarty_tpl->getValue('character')->getName();?>
</h2>
        </div>
        <div class="card-body">

            <p><strong>Summary:</strong> <?php echo $_smarty_tpl->getValue('character')->getSummary();?>
</p>

            <?php if ($_smarty_tpl->getValue('character')->getRole() == "Warrior" && $_smarty_tpl->getValue('character')->getRage() !== null) {?>
                <p><strong>Rage:</strong> <?php echo $_smarty_tpl->getValue('character')->getRage();?>
</p>
            <?php }?>

            <?php if ($_smarty_tpl->getValue('character')->getRole() == "Mage" && $_smarty_tpl->getValue('character')->getMana() !== null) {?>
                <p><strong>Mana:</strong> <?php echo $_smarty_tpl->getValue('character')->getMana();?>
</p>
            <?php }?>

            <?php if ($_smarty_tpl->getValue('character')->getRole() == "Rogue" && $_smarty_tpl->getValue('character')->getEnergy() !== null) {?>
                <p><strong>Energy:</strong> <?php echo $_smarty_tpl->getValue('character')->getEnergy();?>
</p>
            <?php }?>

            <?php if ($_smarty_tpl->getValue('character')->getRole() == "Healer" && $_smarty_tpl->getValue('character')->getSpirit() !== null) {?>
                <p><strong>Spirit:</strong> <?php echo $_smarty_tpl->getValue('character')->getSpirit();?>
</p>
            <?php }?>

            <?php if ($_smarty_tpl->getValue('character')->getRole() == "Tank" && $_smarty_tpl->getValue('character')->getshield() !== null) {?>
                <p><strong>Shield:</strong> <?php echo $_smarty_tpl->getValue('character')->getShield();?>
</p>
            <?php }?>


            <ul class="list-group mt-3">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('character')->getInventory()->getItems(), 'item');
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

        <a href="index.php?page=listCharacters" class="btn btn-primary mt-3">Terug naar lijst</a>
    </div>

    <?php if ((true && ($_smarty_tpl->hasVariable('battleResult') && null !== ($_smarty_tpl->getValue('battleResult') ?? null)))) {?>
        <div class="battle-result mt-4">
            <h4>Battle Result</h4>
            <div><?php echo $_smarty_tpl->getValue('battleResult');?>
</div>
        </div>
    <?php }
}
}
/* {/block "content"} */
}
