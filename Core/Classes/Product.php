<?php

declare(strict_types=1);

namespace Core\Classes;

class Product
{
    /*
     * @var string
    */
    private $name;

    /*
     * @var double
    */
    private $price;

    /*
     * @var float
     * unit: kilogram(kg)
    */
    private $weight;

    /*
     * @var float
     * unit: meter(m)
    */
    private $width;

    /*
     * @var float
     * unit: meter(m)
    */
    private $height;

    /*
     * @var float
    */
    private $depth;

    /*
     * @var float
    */
    private $extraFee;

    public function __construct($name, $price, $weight, $width, $height, $depth, $extraFee = [])
    {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
        $this->extraFee = $extraFee;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}