<?php

namespace App\Controllers;

class Projekte extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('pages/projekte');
        echo view('templates/footer');
    }
}
