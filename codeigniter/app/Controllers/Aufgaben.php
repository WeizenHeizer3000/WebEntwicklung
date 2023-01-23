<?php

namespace App\Controllers;

use App\Models;

class Aufgaben extends BaseController
{
    public function __construct() {
        $this->AufgabenModel = new AufgabenModel();
        $this->ReiterModel = new ReiterModel();
        $this->MitgliederModel = new MitgliederModel();
    }

    public function index_edit()
    {
        $data['aufgaben'] = $this->AufgabenModel->getAufgaben();
        $data['reiter'] = $this->ReiterModel->getReiter();
        $data['mitglieder'] = $this->MitgliederModel->getMitglieder();
        $data['zuständige'] = $this->Mitglieder_aufgabenModel->getMitglieder_aufgaben();

        echo view('templates/header');
        echo view('pages/aufgaben', $data);
        echo view('templates/footer');
    }

    public function ced_edit($id = 0, $todo = 0) {

        // Todo: 0 = create, 1 = Bearbeiten, 2 = löschen
        $data['todo'] = $todo;
        // Person bearbeiten oder löschen
        if($id > 0 && ($todo == 1 || $todo == 2 ))
            $data['aufgaben'] = $this->AufgabenModel->getAufgabe($id);

        echo view( 'templates/header');
        echo view( 'aufgaben/edit', $data);
        echo view( 'templates/footer');

    }

    public function submit_edit() {

        // Person ändern
        if(isset($_POST['btnSpeichern'] )) {

            // Daten speichern
            if(isset($_POST['id']) && $_POST['id'] != '') {
                $this->MitgliederModel->updateAufgabe();
            }
            else {
                $this->MitgliederModel->createAufgabe();
            }
            return redirect()->to(base_url('aufgaben/index_edit/'));

        }
        // Person löschen
        elseif (isset($_POST['btnLoeschen'])) {
            $this->MitgliederModel->deleteAufgabe();
            return redirect()->to(base_url('aufgaben/index_edit/'));
        }
        // Abbrechen
        elseif (isset($_POST['btnAbbrechen'])) {
            return redirect()->to(base_url('aufgaben/index_edit/'));
        }
    }
}
