<?php
namespace Game;

class DatabaseManager
{
private static ?database $instance;

public static function getInstance(): ?database
{
return self::$instance;
}

public static function setInstance(database $instance)
{
self::$instance = $instance;
}

public static function hasInstance(): bool
{
return !empty(self::$instance);
}
}
