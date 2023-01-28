<?php

namespace App\Controllers;

use App\Models\MitgliederModel;
use App\Models\ProjekteModel;

class Mitglieder extends BaseController
{
    public function __construct() {
        $this->MitgliederModel = new MitgliederModel();
        $this->ProjekteModel = new ProjekteModel();
    }

    public function index_edit()
    {
        if(session()->get('delM') != null){
            $data['id'] = session()->get('delM');
            $this->session->set('delM', null);
            echo view('templates/header');
            echo view('pages/confirmation', $data);
            echo view('templates/footer');
        }
        else {
            $data['mitglieder'] = $this->MitgliederModel->getMitglieder();
            echo view('templates/header');
            echo view('pages/mitglieder', $data);
            echo view('templates/footer');
        }
    }

    public function ced_edit($id = 0, $todo = 0) {
        // Todo: 0 = create, 1 = Bearbeiten, 2 = löschen
        $data['todo'] = $todo;
        // Person bearbeiten oder löschen
        if($id > 0 && ($todo == 1 || $todo == 2 ))
            $data['mitglieder'] = $this->MitgliederModel->getMitglieder($id);

        echo view( 'templates/header');
        echo view( 'pages/mitgliederEdit', $data);
        echo view( 'templates/footer');
    }

    public function submit_edit() {
        if(isset($_POST['btnReset'] )) {
            return redirect()->to(base_url('Mitglieder/index_edit'));
        }
        if(isset($_POST['btnSpeichern'] )) {
            // Daten speichern
            $data['todo'] = 1;
            if ($this->validation->run($_POST, 'mitgliederbearbeiten')) {

                if(isset($_POST['passwort']) && $_POST['passwort'] != ''){
                    if(isset($_POST['id']) && $_POST['id'] != '') {
                        $this->MitgliederModel->updateMitglied();
                    }
                    else {

                        $this->MitgliederModel->createMitglied();
                        if(isset($_POST['zugeordnet'])){
                            $neustesMitglied = $this->MitgliederModel->getNeustesMitglied();
                            $this->ProjekteModel->createPM($neustesMitglied);
                        }
                    }
                    return redirect()->to(base_url('Mitglieder/index_edit'));
                }
            }else {
                // Daten zurück ans Formular übergeben
                $data['mitglieder'] = $_POST;
                // Fehlermeldungen generieren
                $data['error'] = $this->validation->getErrors();
                echo view('templates/header');
                echo view( 'pages/mitgliederEdit', $data);
                echo view('templates/footer');
            }
        }
        // Mitglied löschen
        elseif (isset($_POST['btnLoeschen'])) {
            $id=$_POST['id'];
            $this->session->set('delM', $id);
            return redirect()->to(base_url('mitglieder/index_edit/'));
        }
        // Abbrechen
        elseif (isset($_POST['btnAbbrechen'])) {
            return redirect()->to(base_url('mitglieder/index_edit/'));
        }
    }

    public function delete(){
        if(isset($_POST['btnDelete'])){
            $id=$_POST['id'];
            $this->MitgliederModel->deleteMitglied($id);
        }
        return redirect()->to(base_url('mitglieder/index_edit/'));
    }
}
