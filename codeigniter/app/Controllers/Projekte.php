<?php

namespace App\Controllers;

use App\Models\ProjekteModel;

class Projekte extends BaseController
{
    public function __construct() {
        $this->ProjekteModel = new ProjekteModel();
    }

    public function index_edit()
    {
        $data['projekte'] = $this->ProjekteModel->getProjekte();
        echo view('templates/header');
        echo view('pages/projekte', $data);
        echo view('templates/footer');
    }

    public function ced_edit($id = 0, $todo = 0) {
        echo('<pre>');
        var_dump($_POST);
        echo('</pre>');
        die();

        // Todo: 0 = create, 1 = Bearbeiten, 2 = löschen
        $data['todo'] = $todo;
        // Person bearbeiten oder löschen
        if($id > 0 && ($todo == 1 || $todo == 2 ))
            $data['projekte'] = $this->ProjekteModel->getProjekte($id);
        echo('<pre>');
        var_dump($id);
        echo('</pre>');
        die();
        echo view( 'templates/header');
        echo view( 'pages/projekte', $data);
        echo view( 'templates/footer');

    }

    public function submit_edit() {
        if(isset($_POST['btnReset'] )) {
            return redirect()->to(base_url('Projekte/index_edit'));
        }
        if(isset($_POST['btnSpeichern'] )) {
            // Daten speichern
            $data['todo'] = 1;
            if ($this->validation->run($_POST, 'projektebearbeiten')) {

                if(isset($_POST['name']) && $_POST['name'] != ''){
                    if(isset($_POST['id']) && $_POST['id'] != '') {
                        $this->ProjekteModel->updateProjekt();
                    }
                    else {
                        $this->ProjekteModel->createProjekt();
                    }
                    return redirect()->to(base_url('Projekte/index_edit'));
                }

            }else {
                // Daten zurück ans Formular übergeben
                $data['projekte'] = $_POST;
                // Fehlermeldungen generieren
                $data['error'] = $this->validation->getErrors();
                echo view('templates/header');
                echo view( 'pages/projekte', $data);
                echo view('templates/footer');
            }
        }
        // Projekt löschen
        elseif (isset($_POST['btnLoeschen'])) {
            $this->ProjekteModel->deleteProjekt();
            return redirect()->to(base_url('mitglieder/index_edit/'));
        }
    }
}
