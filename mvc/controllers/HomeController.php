<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        $data = "Hello from ExampleModel!";
        include('views/home.php');
    }
}
