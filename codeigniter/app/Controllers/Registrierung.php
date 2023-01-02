<?php

namespace App\Controllers;

class Registrierung extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('pages/registrierung');
        echo view('templates/footer');
    }
}