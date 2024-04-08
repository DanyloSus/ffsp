<?php
require_once realpath(dirname(__FILE__) . "/../../interfaces/shape.php");

class Circle implements Shape
{

    function __construct(private float $radius = 0)
    {
    }

    function calcSizes(): float
    {
        return pi() * pow($this->radius, 2);
    }
}