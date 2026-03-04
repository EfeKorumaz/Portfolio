<?php
require_once "vendor/autoload.php";

use Game\Mage;
use Game\Warrior;
use Game\Rogue;
use Game\Healer;
use Game\Tank;
use Smarty\Smarty;
use Game\Character;
use Game\Battle;
use Game\CharacterList;
use Game\Mysql;
use Game\DatabaseManager;
use Game\Item;
use Game\ItemList;
use Dotenv\Dotenv;

session_start();


$template = new Smarty();
$template->setTemplateDir("templates/");
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $database = new Mysql($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
    DatabaseManager::setInstance($database);

} catch (PDOException $error) {
    throw new PDOException($error->getMessage());
}

$characterList = $_SESSION['characterList'] ?? new CharacterList();
Character::initalizeSession();
$testSword = new Item("Iron Sword", "weapon", 50);
$testArmor = new Item("Dragon armor", "armor", 500);
$page = $_GET['page'] ?? null;


switch ($page) {
    case "home":
        $template->display("home.tpl");
        break;

    case "Character":
        $template->display("Character.tpl");
        break;

    case "showCharacter":
        if (isset($_SESSION['character'])) {
            $character = $_SESSION['character'];
            $template->assign('character', $character);
        }
        $template->display("Character.tpl");
        break;

    case "createCharacter":
        $template->display("createCharacterForm.tpl");
        break;

    case "saveCharacter":
        if (
            !empty($_POST['name']) &&
            !empty($_POST['health']) &&
            !empty($_POST['attack']) &&
            !empty($_POST['defense']) &&
            !empty($_POST['range']) &&
            !empty($_POST['role'])
        ) {
            $name = $_POST['name'];
            $hp = (int)$_POST['health'];
            $attack = (int)$_POST['attack'];
            $defense = (int)$_POST['defense'];
            $range = (int)$_POST['range'];
            $role = $_POST['role'];
            $rage = $_POST['hateField'] ?? null;
            $mana = $_POST['magicField'] ?? null;
            $energy = $_POST['energyField'] ?? null;
            $spirit = $_POST['spiritField'] ?? null;
            $shield = $_POST['ShieldField'] ?? null;

            switch ($role) {
                case "Warrior":
                    $newCharacter = new Warrior($name, $role, $hp, $attack, $defense, $range, $rage ?? 100);
                    break;
                case "Mage":
                    $newCharacter = new Mage($name, $role, $hp, $attack, $defense, $range, $mana ?? 150);
                    break;
                case "Rogue":
                    $newCharacter = new Rogue($name, $role, $hp, $attack, $defense, $range, $energy ?? 100);
                    break;
                case "Healer":
                    $newCharacter = new Healer($name, $role, $hp, $attack, $defense, $range, $spirit ?? 200);
                    break;
                case "Tank":
                    $newCharacter = new Tank($name, $role, $hp, $attack, $defense, $range, $shield ?? 50);
                    break;
                default:
                    die("Fout: Ongeldig karaktertype '$role'.");
            }

            $newCharacter->getInventory()->addItem("starter sword");
            $_SESSION['newCharacter'] = $newCharacter;
            $characterList->addCharacter($newCharacter);

            // Static properties opslaan in session
            Character::saveSession();

            // CharacterList opslaan in session (onderaan)
            $_SESSION['characterList'] = $characterList;

            $template->assign('newCharacter', $newCharacter);
            $template->assign('success', "Character is gemaakt.");
            $template->display("characterCreated.tpl");
            exit;
        } else {
            $template->assign('error', "Vul alle verplichte velden in.");
            $template->display("createCharacterForm.tpl");
        }
        break;

    case "listCharacters":
        $allCharacters = $characterList->getCharactersList();
        $template->assign('characters', $allCharacters);
        $template->display("characterList.tpl");
        break;

    case "deleteCharacter":
        if (isset($_GET['name'])) {
            $characterName = $_GET['name'];
            $character = $characterList->getCharacter($characterName);
            if ($character instanceof Character) {
                $characterList->removeCharacter($character);

                // Update static properties na verwijderen
                $_SESSION['characterStats'] = [
                    'totalCharacters' => Character::$totalCharacters,
                    'characterTypes' => Character::$characterTypes,
                    'existingNames' => Character::$existingNames,
                ];

                $_SESSION['characterList'] = $characterList;
                header("Location: index.php?page=listCharacters");
                exit;
            } else {
                $template->assign('error', 'Character niet gevonden');
                $template->display("characterList.tpl");
            }
        }
        break;

    case "viewCharacter":
        if (isset($_GET['name'])) {
            $characterName = $_GET['name'];
            $character = $characterList->getCharacter($characterName);
            if ($character instanceof Character) {
                $template->assign('character', $character);
                $template->display("Character.tpl");
            } else {
                $template->assign('error', 'Character niet gevonden');
                $template->display("characterList.tpl");
            }
        }
        break;

    case "battleForm":
        $allCharacters = $characterList->getCharactersList();
        $template->assign('characters', $allCharacters);
        $template->display("battleForm.tpl");
        break;

    case "startBattle":
        $allCharacters = $characterList->getCharactersList();

        if (!empty($_POST['character1']) && !empty($_POST['character2'])) {
            if ($_POST['character1'] === $_POST['character2']) {
                $template->assign("error", "Characters kunnen niet hetzelfde zijn");
                $template->assign('characters', $allCharacters);
                $template->display("battleForm.tpl");
                exit();
            }

            $char1 = $characterList->getCharacter($_POST['character1']);
            $char2 = $characterList->getCharacter($_POST['character2']);

            if ($char1 && $char2) {
                $battle = new Battle($char1, $char2);
                $_SESSION['battle'] = $battle;
                $template->assign('battle', $battle);
                $template->display("battleResult.tpl");
            } else {
                $template->assign('error', 'Beide characters moeten bestaan.');
                $template->assign('characters', $allCharacters);
                $template->display("battleForm.tpl");
            }
        } else {
            $template->assign('error', 'Kies twee characters.');
            $template->assign('characters', $allCharacters);
            $template->display("battleForm.tpl");
        }
        break;

    case "battleRound":
        if (isset($_SESSION['battle']) && $_SESSION['battle'] instanceof Battle) {
            $battle = $_SESSION['battle'];
            $fighter1Attack = $_POST['attack_fighter1'] ?? 'normal';
            $fighter2Attack = $_POST['attack_fighter2'] ?? 'normal';

            $fighter1Attack = ($fighter1Attack === 'normal') ? null : $fighter1Attack;
            $fighter2Attack = ($fighter2Attack === 'normal') ? null : $fighter2Attack;

            $battle->setAttackForFighter($battle->getFighter1(), $fighter1Attack);
            $battle->setAttackForFighter($battle->getFighter2(), $fighter2Attack);

            $battleResult = $battle->executeTurn();
            $_SESSION['battle'] = $battle;

            $template->assign('battle', $battle);
            $template->assign('battleResult', $battleResult);
            $template->display("battleResult.tpl");
        } else {
            header("Location: index.php?page=battleForm");
            exit;
        }
        break;

    case "resetHealth":
        if (isset($_SESSION['battle']) && $_SESSION['battle'] instanceof Battle) {
            $battle = $_SESSION['battle'];
            $battle->endBattle();
            $_SESSION['battle'] = $battle;
        }
        header("Location: index.php?page=battleForm");
        exit;

    case "characterStats":
        // Haal totaal aantal characters op
        $totalCharacters = Character::getTotalCharacters();

        // Haal bestaande namen op
        $existingNames = Character::getAllCharacterNames();

        // Tel hoeveel van elk type
        $types = ['Warrior', 'Mage', 'Rogue', 'Healer', 'Tank'];
        $typeCounts = [];

        foreach ($types as $type) {
            $count = Character::getCharacterTypeCount($type);
            if ($count > 0) {
                $typeCounts[$type] = $count;
            }
        }

        // Wijs data toe aan template
        $template->assign('totalCharacters', $totalCharacters);
        $template->assign('characterTypes', $typeCounts);
        $template->assign('existingNames', $existingNames);
        $template->display("characterStatistics.tpl");
        break;


    case "resetStats":
        Character::resetAllStatistics();
        header("Location: index.php?page=characterStats");
        break;
    case "recalculateStats":
        Character::recalculateStatistics($characterList);
        header("Location: index.php?page=characterStats");
        exit();
    case "testDatabase":
        if (DatabaseManager::getInstance()->testConnection()) {
            $template->assign("message", 'Database conected');
        } else {
            $template->assign("message", 'Database not connected');
        }
        $template->display("Database.tpl");
        break;

    case "createItem":
        $template->display("createItem.tpl");
        break;
    case "saveItem":
        if (!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['value'])) {
            $item = new Item($_POST['name'], $_POST['type'], $_POST['value']);
            if ($item->save()) {
                $template->assign('item', $item);
                $template->display("itemList.tpl");
            } else {
                $template->assign('error', 'Item could not be saved.');
                $template->display("createItem.tpl");
            }
        } else {
            $template->assign('error', "Post ain't gut fam");
            var_dump($_POST);
            $template->display("createItem.tpl");
        }
        break;

    case 'itemsList':
        $template->display("itemList.tpl");
        break;
    case "listItems";
        $itemList = new ItemList();
        $items = $itemList->loadAllFromDatabase();
        $template->assign('items', $itemList->getItems());
        $template->assign('count', $itemList->count());
        $template->display("itemList.tpl");
        break;
    case "listItem":
        $itemList = new itemList();
        $param = [];
        if (!empty($_POST['id'])) {
            $param['id'] = (int)$_POST['id'];
            $template->assign('selectId', $_POST['id']);
        }
        if (!empty($_POST['type'])) {
            $param['type'] = $_POST['type'];
            $template->assign('selectType', $_POST['type']);
        }
        if (isset($_POST['sinValue']) && is_numeric($_POST['sinValue'])) {
            $param['sinValue'] = (int)$_POST['sinValue'];
            $template->assign('selectValue', $_POST['value']);
        }
        if (!empty($_POST('name'))) {
            $param['name'] = $_POST['name'];
            $template->assign('selectName', $_POST['name']);
        }

        if (!empty($param)) {
            $itemList->loadByParams($param);
        } else {
            $itemList->loadAllFromDatabase();
        }
        $itemList->loadAllFromDatabase();
        $template->assign('items', $itemList->getItems());
        $template->assign('count', $itemList->count());
        $template->display("itemList.tpl");
        break;

    case "updateItem":
        if (empty($_GET['id'])) {
            $item = Item::loadFromDatabase((int)$_GET['id']);
            if ($item !== null) {
                $template->assign('item', $item);
                $template->display("updateItemForm.tpl");
            } else {
                $template->assign('error', 'Item not found.');
                $template->display("error.tpl");
            }
        } else {
            $template->assign('error', "Mising item id");
            $template->display("error.tpl");
        }
        break;


    case "saveUpdateItem":
        if (empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['value']) && !empty($_POST['id'])) {
            $item = new Item($_POST['name'], $_POST['type'], $_POST['value'], $_POST['id']);
            if ($item->update()) {
                $template->assign('item', $item);
                $template->display("updateItemForm.tpl");
            } else {
                $template->assign('error', 'Unable to update item.');
                $template->display("error.tpl");
            }
        } else {
            $template->assign('error', "Mising item id");
            $template->display("error.tpl");
        }

        break;

    case "deleteItem":
        if (!empty($_GET['id'])) {
            $item = Item::loadFromDatabase((int)$_GET['id']);
            if ($item !== null) {
                $template->assign('item', $item);
                $template->display("deleteItemConfirm.tpl");
            } else {
                $template->assign('error', 'Item niet gevonden.');
                $template->display("error.tpl");
            }
        } else {
            $template->assign('error', "Ontbrekend item-ID.");
            $template->display("error.tpl");
        }
        break;


    case "deleteItemConfirmed":
        if (!empty($_POST['id'])) {
            $item = Item::loadFromDatabase((int)$_POST['id']);
            if ($item !== null) {
                if ($item->delete()) {
                    $template->assign('item', $item);
                    $template->display("itemDeleted.tpl");
                } else {
                    $template->assign('error', 'Verwijderen van item is mislukt.');
                    $template->display("error.tpl");
                }
            } else {
                $template->assign('error', 'Item niet gevonden.');
                $template->display("error.tpl");
            }
        } else {
            $template->assign('error', "Ontbrekend item-ID.");
            $template->display("error.tpl");
        }
        break;

    default:
        $template->assign('error', 'Geen geldige pagina geselecteerd.');
        $template->display("home.tpl");
        break;
}

