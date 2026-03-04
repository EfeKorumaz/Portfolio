<?php
/* Smarty version 5.4.4, created on 2025-05-19 01:13:04
  from 'file:characterList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.4',
  'unifunc' => 'content_682a85a06a1130_01328219',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e6f94be955893d8aba0f4527d7735a73d6d0d78' => 
    array (
      0 => 'characterList.tpl',
      1 => 1747615644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_682a85a06a1130_01328219 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1455306115682a85a0655683_57694839', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1455306115682a85a0655683_57694839 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
?>

    <h2>Characterlijst</h2>
    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('characters')) > 0) {?>
        <table border="1">
            <thead>
            <tr>
                <th>Name</th>
                <th>Hp</th>
                <th>Attack</th>
                <th>Defence</th>
                <th>Range</th>
                <th>Role</th>
                <th>Bekijk</th>
                <th>Verwijder</th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('characters'), 'char', false, 'index');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('index')->value => $_smarty_tpl->getVariable('char')->value) {
$foreach0DoElse = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getValue('char')->getName();?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('char')->getHealth();?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('char')->getAttack();?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('char')->getDefense();?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('char')->getRange();?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('char')->getRole();?>
</td>
                    <td>
                        <a href="index.php?page=viewCharacter&name=<?php echo $_smarty_tpl->getValue('char')->getName();?>
">View</a>
                    </td>
                    <td>
                        <a href="index.php?page=deleteCharacter&name=<?php echo $_smarty_tpl->getValue('char')->getName();?>
">Delete</a>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>Er zijn nog geen characters toegevoegd.</p>
    <?php }
}
}
/* {/block "content"} */
}
