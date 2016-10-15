<?php

namespace MVC\Modules\Main\Controller;
use MVC\Modules\Main\Model\Product as Product;

class Home
{
    public function index(){
    }

    public function alive(){

        $product = new Product();
    }
}