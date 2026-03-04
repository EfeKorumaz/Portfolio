<?php
/* Smarty version 5.4.4, created on 2025-05-19 10:00:12
  from 'file:battleForm.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.4',
  'unifunc' => 'content_682b012ca1a811_15387957',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69b92bfd5a70e2038f84d2eaff50a8992bbba89a' => 
    array (
      0 => 'battleForm.tpl',
      1 => 1747615644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_682b012ca1a811_15387957 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_815998142682b012c9c9d84_25809661', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_815998142682b012c9c9d84_25809661 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
?>

    <h2>Start een gevecht</h2>
    <?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>
        <p style="color:red;"><?php echo $_smarty_tpl->getValue('error');?>
</p>
    <?php }?>
    <form method="post" action="index.php?page=startBattle">
        <label for="character1">Character 1:</label>
        <select name="character1" id="character1" required>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('characters'), 'char');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('char')->value) {
$foreach0DoElse = false;
?>
                <option value="<?php echo $_smarty_tpl->getValue('char')->getName();?>
"><?php echo $_smarty_tpl->getValue('char')->getName();?>
</option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>

        <label for="character2">Character 2:</label>
        <select name="character2" id="character2" required>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('characters'), 'char');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('char')->value) {
$foreach1DoElse = false;
?>
                <option value="<?php echo $_smarty_tpl->getValue('char')->getName();?>
"><?php echo $_smarty_tpl->getValue('char')->getName();?>
</option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>

        <br><br>
        <input type="submit" value="Start Battle">
    </form>
<?php
}
}
/* {/block "content"} */
}
