<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('pages/login');
        echo view('templates/footer');
    }
}
