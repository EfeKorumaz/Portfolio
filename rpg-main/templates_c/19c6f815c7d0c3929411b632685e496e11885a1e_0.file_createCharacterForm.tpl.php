<?php
/* Smarty version 5.4.4, created on 2025-05-23 08:57:01
  from 'file:createCharacterForm.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.4',
  'unifunc' => 'content_6830385dc17201_42494949',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19c6f815c7d0c3929411b632685e496e11885a1e' => 
    array (
      0 => 'createCharacterForm.tpl',
      1 => 1747990621,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6830385dc17201_42494949 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Character creation</title>
</head>
<body>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_6589103786830385dc03da4_37047196', "content");
?>



</body>
</html>
<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_6589103786830385dc03da4_37047196 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\wamp64\\www\\RPG\\templates';
?>


<div class="container mt-4">
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="card-title">
                Character Creation
            </h2>
        </div>
        <div class="card-body">
            <form action="index.php?page=saveCharacter" method="POST">
                <div class="form-group">
                    <label for="name" class="form-label">Naam van character</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="role">Choose Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="" selected>Choose...</option>
                        <option value="Warrior">Warrior</option>
                        <option value="Mage">mage</option>
                        <option value="Rogue">Rogue</option>
                        <option value="Healer">Healer</option>
                        <option value="Tank">Tank</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="health" class="form-label">Health</label>
                    <input type="number" class="form-control" id="health" name="health" min="50" max="200" value="100"
                           required>
                </div>

                <div class="mb-3">
                    <label for="attack" class="form-label">Attack</label>
                    <input type="number" class="form-control" id="attack" name="attack" min="10" max="50" value="20"
                           required>
                </div>

                <div class="mb-3">
                    <label for="defense" class="form-label">Defense</label>
                    <input type="number" class="form-control" id="defense" name="defense" min="5" max="30" value="10"
                           required>
                </div>

                <div class="mb-3">
                    <label for="range" class="form-label">Range</label>
                    <input type="number" class="form-control" id="range" name="range" min="1" max="10" value="5"
                           required>
                </div>

                <div id="rageField" style="display: none">
                    <label for="hateField" class="form-label">Rage field</label>
                    <input type="number" class="form-control" id="hateField" name="hateField" value="100">
                </div>


                <div id="manaField" style="display: none">
                    <label for="magicField" class="form-label">Mana field</label>
                    <input type="number" class="form-control" id="magicField" name="magicField" value="150">
                </div>

                <div id="energyField" style="display: none">
                    <label for="staminaField" class="form-label">Energy field</label>
                    <input type="number" class="form-control" id="staminaField" value="100" name="staminaField" >
                </div>

                <div id="spiritField" style="display: none">
                    <label for="soulField" class="form-label">Spirit field</label>
                    <input type="number" class="form-control" id="soulField" value="200" name="soulField" >
                </div>

                <div id="shieldField" style="display: none">
                    <label for="defenseField" class="form-label">Shield field</label>
                    <input type="number" class="form-control" id="shieldField" value="200" name="defenseField" >
                </div>



                <button type="submit" class="btn btn-primary">Toevoegen</button>


            </form>
            <?php echo '<script'; ?>
>
                function toggleFields() {
                    let role = document.getElementById('role').value;
                    document.getElementById('rageField').style.display = (role === 'Warrior') ? 'block' : 'none';
                    document.getElementById('manaField').style.display = (role === 'Mage') ? 'block' : 'none';
                    document.getElementById('energyField').style.display = (role === 'Rogue') ? 'block' : 'none';
                    document.getElementById('spiritField').style.display = (role === 'Healer') ? 'block' : 'none';
                    document.getElementById('shieldField').style.display = (role === 'Tank') ? 'block' : 'none';

                }

                document.getElementById('role').addEventListener('change', toggleFields);

                // Call the function on page load to set the initial state
                toggleFields();
            <?php echo '</script'; ?>
>
        </div>
        <?php if ($_smarty_tpl->getValue('error')) {?>
            <div class="error" style="color: red;"><?php echo $_smarty_tpl->getValue('error');?>
</div>
        <?php }?>


        <?php
}
}
/* {/block "content"} */
}
