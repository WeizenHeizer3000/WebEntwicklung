<?php

namespace App\Controllers;

use App\Models\MitgliederModel;
use App\Models\Mitglieder_projekteModel;

class Mitglieder extends BaseController
{
    public function __construct() {
        $this->MitgliederModel = new MitgliederModel();
        $this->Mitglieder_projekteModel = new Mitglieder_projekteModel();
    }

    public function index_edit()
    {
        $data['mitglieder'] = $this->MitgliederModel->getMitglieder();
        $data['mitgliederInProjekte'] = $this->Mitglieder_projekteModel->getMitgliederInProjekte();
        echo view('templates/header');
        echo view('pages/mitglieder', $data);
        echo view('templates/footer');
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
        // Person ändern
        if(isset($_POST['btnReset'] )) {
            return redirect()->to(base_url('Mitglieder/index_edit'));
        }
        if(isset($_POST['btnSpeichern'] )) {
            // Daten speichern
            if(isset($_POST['passwort']) && $_POST['passwort'] != ''){
                if(isset($_POST['id']) && $_POST['id'] != '') {
                    $this->MitgliederModel->updateMitglied();
                }
                else {
                    $this->MitgliederModel->createMitglied();
                }
                return redirect()->to(base_url('Mitglieder/index_edit'));
            }
            else{
                echo view( 'templates/header');
                echo view('pages/fehler');
                echo view( 'templates/footer');
            }
        }
        // Person löschen
        elseif (isset($_POST['btnLoeschen'])) {
            $this->MitgliederModel->deleteMitglied();
            return redirect()->to(base_url('mitglieder/index_edit/'));
        }
        // Abbrechen
        elseif (isset($_POST['btnAbbrechen'])) {
            return redirect()->to(base_url('mitglieder/index_edit/'));
        }
    }
}
