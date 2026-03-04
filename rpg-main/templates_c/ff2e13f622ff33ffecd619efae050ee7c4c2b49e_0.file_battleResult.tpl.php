<?php
/* Smarty version 5.4.4, created on 2025-06-02 14:21:39
  from 'file:battleResult.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.4',
  'unifunc' => 'content_683db3736e27f3_43512048',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff2e13f622ff33ffecd619efae050ee7c4c2b49e' => 
    array (
      0 => 'battleResult.tpl',
      1 => 1748874095,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_683db3736e27f3_43512048 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_976129938683db37359f7b5_29760064', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_976129938683db37359f7b5_29760064 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
?>

<main style="padding-top: 70px;">
    <?php if ((true && ($_smarty_tpl->hasVariable('battle') && null !== ($_smarty_tpl->getValue('battle') ?? null)))) {?>
        <div class="battle-result">
            <h4>Battle Result</h4>

            <?php $_smarty_tpl->assign('fighter1', $_smarty_tpl->getValue('battle')->getFighter1(), false, NULL);?>
            <?php $_smarty_tpl->assign('fighter2', $_smarty_tpl->getValue('battle')->getFighter2(), false, NULL);?>

            <div class="fighter">
                <h5><?php echo $_smarty_tpl->getValue('fighter1')->getName();?>
 (<?php echo $_smarty_tpl->getValue('fighter1')->getRole();?>
)</h5>
                <ul>
                    <li>Health: <?php echo $_smarty_tpl->getValue('fighter1')->getHealth();?>
 / <?php echo $_smarty_tpl->getValue('battle')->getFighter1OriginalHealth();?>
</li>
                    <li>Attack: <?php echo $_smarty_tpl->getValue('fighter1')->getAttack();?>
</li>
                    <li>Defense: <?php echo $_smarty_tpl->getValue('fighter1')->getDefense();?>
</li>
                    <li>Range: <?php echo $_smarty_tpl->getValue('fighter1')->getRange();?>
</li>

                    <?php if ($_smarty_tpl->getValue('fighter1')->getRole() == "Warrior") {?>
                        <li>Rage: <?php echo $_smarty_tpl->getValue('fighter1')->getRage();?>
</li>
                    <?php }?>
                    <?php if ($_smarty_tpl->getValue('fighter1')->getRole() == "Mage") {?>
                        <li>Mana: <?php echo $_smarty_tpl->getValue('fighter1')->getMana();?>
</li>
                    <?php }?>
                    <?php if ($_smarty_tpl->getValue('fighter1')->getRole() == "Rogue") {?>
                        <li>Energy: <?php echo $_smarty_tpl->getValue('fighter1')->getEnergy();?>
</li>
                    <?php }?>
                    <?php if ($_smarty_tpl->getValue('fighter1')->getRole() == "Healer") {?>
                        <li>Spirit: <?php echo $_smarty_tpl->getValue('fighter1')->getSpirit();?>
</li>
                    <?php }?>
                    <?php if ($_smarty_tpl->getValue('fighter1')->getRole() == "Tank") {?>
                        <li>Shield: <?php echo $_smarty_tpl->getValue('fighter1')->getShield();?>
</li>
                    <?php }?>
                </ul>
            </div>

            <div class="fighter">
                <h5><?php echo $_smarty_tpl->getValue('fighter2')->getName();?>
 (<?php echo $_smarty_tpl->getValue('fighter2')->getRole();?>
)</h5>
                <ul>
                    <li>Health: <?php echo $_smarty_tpl->getValue('fighter2')->getHealth();?>
 / <?php echo $_smarty_tpl->getValue('battle')->getFighter2OriginalHealth();?>
</li>
                    <li>Attack: <?php echo $_smarty_tpl->getValue('fighter2')->getAttack();?>
</li>
                    <li>Defense: <?php echo $_smarty_tpl->getValue('fighter2')->getDefense();?>
</li>
                    <li>Range: <?php echo $_smarty_tpl->getValue('fighter2')->getRange();?>
</li>

                    <?php if ($_smarty_tpl->getValue('fighter2')->getRole() == "Warrior") {?>
                        <li>Rage: <?php echo $_smarty_tpl->getValue('fighter2')->getRage();?>
</li>
                    <?php }?>
                    <?php if ($_smarty_tpl->getValue('fighter2')->getRole() == "Mage") {?>
                        <li>Mana: <?php echo $_smarty_tpl->getValue('fighter2')->getMana();?>
</li>
                    <?php }?>
                    <?php if ($_smarty_tpl->getValue('fighter2')->getRole() == "Rogue") {?>
                        <li>Energy: <?php echo $_smarty_tpl->getValue('fighter2')->getEnergy();?>
</li>
                    <?php }?>
                    <?php if ($_smarty_tpl->getValue('fighter2')->getRole() == "Healer") {?>
                        <li>Spirit: <?php echo $_smarty_tpl->getValue('fighter2')->getSpirit();?>
</li>
                    <?php }?>
                    <?php if ($_smarty_tpl->getValue('fighter2')->getRole() == "Tank") {?>
                        <li>Shield: <?php echo $_smarty_tpl->getValue('fighter2')->getShield();?>
</li>
                    <?php }?>
                </ul>
            </div>

            <?php if ((true && ($_smarty_tpl->hasVariable('battleResult') && null !== ($_smarty_tpl->getValue('battleResult') ?? null)))) {?>
                <div class="battle-log">
                    <strong>Resultaat van de ronde:</strong>
                    <div><?php echo $_smarty_tpl->getValue('battleResult');?>
</div>
                </div>
            <?php }?>

            <?php $_smarty_tpl->assign('fighter1Defeated', ($_smarty_tpl->getValue('fighter1')->getHealth() <= 0), false, NULL);?>
            <?php $_smarty_tpl->assign('fighter2Defeated', ($_smarty_tpl->getValue('fighter2')->getHealth() <= 0), false, NULL);?>

            <form action="index.php?page=battleRound" method="POST">
                <fieldset <?php if ($_smarty_tpl->getValue('fighter1Defeated') || $_smarty_tpl->getValue('fighter2Defeated')) {?>disabled<?php }?>>
                    <label for="attack_fighter1">Kies aanval voor <?php echo $_smarty_tpl->getValue('fighter1')->getName();?>
:</label>
                    <select name="attack_fighter1" id="attack_fighter1">
                        <option value="normal" selected>Normal Attack</option>
                        <?php if ($_smarty_tpl->getValue('fighter1')->getRole() == "Warrior") {?>
                            <option value="rageAttack">Rage Attack</option>
                            <option value="whirlwind">Whirlwind</option>
                        <?php }?>
                        <?php if ($_smarty_tpl->getValue('fighter1')->getRole() == "Mage") {?>
                            <option value="fireBall">Fireball</option>
                            <option value="frostNova">FrostNova</option>
                        <?php }?>
                        <?php if ($_smarty_tpl->getValue('fighter1')->getRole() == "Rogue") {?>
                            <option value="sneakAttack">Sneak Attack</option>
                            <option value="poisonDagger">Poison Dagger</option>
                        <?php }?>
                        <?php if ($_smarty_tpl->getValue('fighter1')->getRole() == "Healer") {?>
                            <option value="healing">Healing Prayer</option>
                            <option value="divineShield">Divine Shield</option>
                        <?php }?>

                        <?php if ($_smarty_tpl->getValue('fighter1')->getRole() == "Tank") {?>
                            <option value="barrierShield">Barrier Shield</option>
                            <option value="Taunt">Taunt</option>
                        <?php }?>
                    </select>

                    <br><br>

                    <label for="attack_fighter2">Kies aanval voor <?php echo $_smarty_tpl->getValue('fighter2')->getName();?>
:</label>
                    <select name="attack_fighter2" id="attack_fighter2">
                        <option value="normal" selected>Normal Attack</option>
                        <?php if ($_smarty_tpl->getValue('fighter2')->getRole() == "Warrior") {?>
                            <option value="rageAttack">Rage Attack</option>
                            <option value="whirlwind">Whirlwind</option>
                        <?php }?>
                        <?php if ($_smarty_tpl->getValue('fighter2')->getRole() == "Mage") {?>
                            <option value="fireBall">Fireball</option>
                            <option value="frostNova">FrostNova</option>
                        <?php }?>
                        <?php if ($_smarty_tpl->getValue('fighter2')->getRole() == "Rogue") {?>
                            <option value="sneakAttack">Sneak Attack</option>
                            <option value="poisonDagger">Poison Dagger</option>
                        <?php }?>
                        <?php if ($_smarty_tpl->getValue('fighter2')->getRole() == "Healer") {?>
                            <option value="healing">Healing Prayer</option>
                            <option value="divineShield">Divine Shield</option>
                        <?php }?>
                        <?php if ($_smarty_tpl->getValue('fighter1')->getRole() == "Tank") {?>
                            <option value="barrierShield">Barrier Shield</option>
                            <option value="Taunt">Taunt</option>
                        <?php }?>
                    </select>

                    <br><br>

                    <button type="submit" class="btn btn-success">Fight Round</button>
                </fieldset>
            </form>

            <form action="index.php?page=resetHealth" method="POST" style="display:inline;">
                <button type="submit" class="btn btn-warning">Reset Health</button>
            </form>
            <form action="index.php?page=battleForm" method="POST" style="display:inline;">
                <button type="submit" class="btn btn-primary">Terug</button>
            </form>
        </div>
    <?php }?>
</main>
<?php
}
}
/* {/block "content"} */
}
