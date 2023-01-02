<?php

namespace App\Controllers;

class Database extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('pages/databaseConnection');
        echo view('templates/footer');
    }
}
