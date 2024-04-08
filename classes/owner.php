<?php
class Owner
{
    private static $wasCreated = false;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance(): ?Owner
    {
        if (!self::$wasCreated) {
            self::$wasCreated = true;
            return new Owner();
        }
        return null;
    }
}