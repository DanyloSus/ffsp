<?php
require_once realpath(dirname(__FILE__) . "/../../traits/deleteble.php");

class User
{
    use Deleteble;

    function __construct(protected string $name = "", protected int $age = 0)
    {
    }

    function showInfo(): void
    {
        printWithBreak($this->name . " " . $this->age);
    }

    function __call($method, $args)
    {
        printWithBreak("Excuse me, '{$method}' doesn't exist ;(");
    }
}