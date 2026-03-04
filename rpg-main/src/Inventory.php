<?php

namespace Game;

/**
 *
 */
class Inventory
{

    private array $items = [];


    /**
     * @param $item
     * @return void
     */
    public function addItem($item): void
    {
        $this->items[] = $item;
    }

    /**
     * @param $item
     * @return void
     */
    public function removeItem($item): void
    {
        $key = array_search($item, $this->items);
        if ($key !== false) {
            unset($this->items[$key]);
        }
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        echo "<strong>Inventory:</strong><br>";
        foreach ($this->items as $item) {
            echo $item . "<br>";
        }
        return $this->items;
    }


}