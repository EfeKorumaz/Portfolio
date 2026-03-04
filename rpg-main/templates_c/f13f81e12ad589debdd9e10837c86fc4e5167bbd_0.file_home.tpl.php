<?php
/* Smarty version 5.4.4, created on 2025-05-15 12:20:45
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.4',
  'unifunc' => 'content_6825dc1d3692d3_98390725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f13f81e12ad589debdd9e10837c86fc4e5167bbd' => 
    array (
      0 => 'home.tpl',
      1 => 1747300878,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6825dc1d3692d3_98390725 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_21054558956825dc1d35fe72_16733371', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_21054558956825dc1d35fe72_16733371 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
?>

    <H1>Wolkom!</H1>
    <p>dit is glory RPG in dit spel ga je met je zelf-gemaakte karakter tegen andere karakters vechten.</p>
<?php
}
}
/* {/block "content"} */
}
