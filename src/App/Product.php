<?php

namespace App;

class Product
{
    protected $productId;

    public function __construct()
    {
        $this->productId = rand();
    }
}