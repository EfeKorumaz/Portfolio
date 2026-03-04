<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Character creation</title>
</head>
<body>
{extends file="layout.tpl"}

{block name="content"}

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
            <script>
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
            </script>
        </div>
        {if $error}
            <div class="error" style="color: red;">{$error}</div>
        {/if}


        {/block}


</body>
</html>
