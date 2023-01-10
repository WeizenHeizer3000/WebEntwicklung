<?php

namespace App\Controllers;

use App\Models\ReiterModel;

class Reiter extends BaseController
{
    public function __construct() {
        $this->ReiterModel = new ReiterModel();
    }

    public function index_edit()
    {
        $data['reiter'] = $this->ReiterModel->getReiter();

        echo view('templates/header');
        echo view('pages/reiter', $data);
        echo view('templates/footer');
    }

    public function ced_edit($id = 0, $todo = 0) {

        // Todo: 0 = create, 1 = Bearbeiten, 2 = löschen
        $data['todo'] = $todo;
        // Person bearbeiten oder löschen
        if($id > 0 && ($todo == 1 || $todo == 2 ))
            $data['reiter'] = $this->AufgabenModel->getReiter($id);

        echo view( 'templates/header');
        echo view( 'reiter/edit', $data);
        echo view( 'templates/footer');

    }

    public function submit_edit() {

        // Person ändern
        if(isset($_POST['btnSpeichern'] )) {

            // Daten speichern
            if(isset($_POST['id']) && $_POST['id'] != '') {
                $this->MitgliederModel->updateReiter();
            }
            else {
                $this->MitgliederModel->createReiter();
            }
            return redirect()->to(base_url('reiter/index_edit/'));

        }
        // Person löschen
        elseif (isset($_POST['btnLoeschen'])) {
            $this->MitgliederModel->deleteReiter();
            return redirect()->to(base_url('reiter/index_edit/'));
        }
        // Abbrechen
        elseif (isset($_POST['btnAbbrechen'])) {
            return redirect()->to(base_url('reiter/index_edit/'));
        }
    }
}
