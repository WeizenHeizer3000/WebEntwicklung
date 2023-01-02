<?php

namespace App\Controllers;

class Mitglieder extends BaseController
{
    public function index()
    {
        $data["mitglieder"]= array(
            array(
                'Name' => 'Max Mustermann',
                'E-Mail' => 'mustermann@muster.de',
                'In Projekt' => True,
            ),
            array(
                'Name' => 'Petra Müller',
                'E-Mail' => 'petra@mueller.de',
                'In Projekt' => True,
            )
        );
        echo view('templates/header');
        echo view('pages/mitglieder', $data);
        echo view('templates/footer');
    }
}
