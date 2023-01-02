<?php

namespace App\Controllers;

class Reiter extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('pages/reiter');
        echo view('templates/footer');
    }
}
