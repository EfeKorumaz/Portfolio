<?php

namespace Game;

class CharacterList
{
    /**
     * @var array
     */
    private array $characters = [];

    /**
     * @param Character $character
     * @return string
     */
    public function addCharacter(Character $character): string
    {
        $this->characters[] = $character;
        return $character->getName() . "has been added";

    }

    /**
     * @return array
     */
    public function getCharactersList(): array
    {
        return $this->characters;
    }

    public function getCharacter(string $name): Character|string
    {
        foreach ($this->characters as $character) {
            if ($character->getName() === $name) {
                return $character;
            }
        }
        return "Character $name does not exist";
    }

    public function removeCharacter(Character $character): string
    {
        $key = array_search($character, $this->characters, true); // strict comparison (===)

        if ($key !== false) {
            $name = $character->getName();
            $role = $character->getRole();

            unset($this->characters[$key]);
            $this->characters = array_values($this->characters); // herindexeren

            Character::removeCharacterFromStats($name, $role); // statische methode aanroepen

            return "Character '{$name}' is verwijderd.";
        } else {
            return "Character '{$character->getName()}' is niet gevonden en kon niet worden verwijderd.";
        }
    }



}