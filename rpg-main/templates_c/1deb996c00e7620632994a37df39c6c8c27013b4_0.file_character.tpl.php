<?php
/* Smarty version 5.4.4, created on 2025-05-17 16:07:14
  from 'file:character.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.4',
  'unifunc' => 'content_6828b432cc3953_64398304',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1deb996c00e7620632994a37df39c6c8c27013b4' => 
    array (
      0 => 'character.tpl',
      1 => 1747481151,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6828b432cc3953_64398304 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9285760266828b432be7444_21243363', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_9285760266828b432be7444_21243363 extends \Smarty\Runtime\Block
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
            <p><strong>HP:</strong> <?php echo $_smarty_tpl->getValue('character')->getHealth();?>
</p>
            <p><strong>Attack:</strong> <?php echo $_smarty_tpl->getValue('character')->getAttack();?>
</p>
            <p><strong>Defense:</strong> <?php echo $_smarty_tpl->getValue('character')->getDefense();?>
</p>
            <p><strong>Range:</strong> <?php echo $_smarty_tpl->getValue('character')->getRange();?>
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

            <p><strong>Role:</strong> <?php echo $_smarty_tpl->getValue('character')->getRole();?>
</p>


            <ul class="list-group">
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

        <a href="index.php?action=listCharacters" class="btn btn-primary mt-3">Terug naar lijst</a>

    </div>
    <?php if ((true && ($_smarty_tpl->hasVariable('battleResult') && null !== ($_smarty_tpl->getValue('battleResult') ?? null)))) {?>
        <div class="battle-result">
            <h4>Battle Result</h4>
            <div><?php echo $_smarty_tpl->getValue('battleResult');?>
</div>
        </div>
    <?php }
}
}
/* {/block "content"} */
}
