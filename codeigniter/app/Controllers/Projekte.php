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

    public function delete(){
        if(isset($_POST['btnDelete'])){
            $id=$_POST['id'];
            $this->ProjekteModel->deleteProjekt();
            if($id==session()->get('aktuellesProjekt')){
                $this->session->set('aktuellesProjekt', null);
                $this->session->set('aktuellesProjektName', null);
            }
        }
        return redirect()->to(base_url('projekte/index_edit/'));
    }

    public function ced_edit($id = 0, $todo = 0) {
        // Todo: 0 = create, 1 = Bearbeiten, 2 = löschen
        $id=$_POST['id'];
        if(isset($_POST['btnLoeschen'])){
            $data['id'] = $id;
            echo view( 'templates/header');
            echo view( 'pages/confirmation', $data);
            echo view( 'templates/footer');
        }
        if(isset($_POST['btnBearbeiten'])){
            // Projekt bearbeiten oder löschen
            $data['projekte'] = $this->ProjekteModel->getProjekte();
            $data['projektBearbeiten'] = $this->ProjekteModel->getProjekte($id);
            echo view( 'templates/header');
            echo view( 'pages/projekte', $data);
            echo view( 'templates/footer');
        }
        if(isset($_POST['btnAuswaehlen'])){
            $this->session->set('aktuellesProjekt', $id);

            $name = $this->ProjekteModel->getProjektName($id);
            $this->session->set('aktuellesProjektName', $name['name']);

            return redirect()->to(base_url('projekte/index_edit/'));
        }
        if(isset($_POST['btnCancel'])){
            return redirect()->to(base_url('projekte/index_edit/'));
        }
    }

    public function submit_edit() {
        if(isset($_POST['btnReset'] )) {
            return redirect()->to(base_url('Projekte/index_edit'));
        }
        if(isset($_POST['btnSpeichern'] )) {

            if ($_POST['name']!="" && $_POST['beschreibung']!="") {
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
            }else{
                return redirect()->to(base_url('Projekte/index_edit'));
            }
        }
    }
}
