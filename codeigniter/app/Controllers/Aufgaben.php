<?php

namespace App\Controllers;

use App\Models\AufgabenModel;
use App\Models\ReiterModel;
use App\Models\MitgliederModel;

class Aufgaben extends BaseController
{
    public function __construct() {
        $this->AufgabenModel = new AufgabenModel();
        $this->ReiterModel = new ReiterModel();
        $this->MitgliederModel = new MitgliederModel();
    }

    public function index_edit()
    {
        $data['reiter'] = $this->ReiterModel->getReiter();
        $data['mitglieder'] = $this->MitgliederModel->getMitglieder();
        $data['aufgaben'] = $this->AufgabenModel->getAufgaben();

        echo view('templates/header');
        echo view('pages/aufgaben', $data);
        echo view('templates/footer');
    }

    public function ced_edit($id = 0, $todo = 0) {
        // Löschen
        if($todo == 2){
            $this->AufgabenModel->deleteAufgabe($id);
            return redirect()->to(base_url('aufgaben/index_edit/'));
        }
        // Bearbeiten
        if($todo == 1){
            $data['aufgaben'] = $this->AufgabenModel->getAufgaben();
            $data['aufgabeBearbeiten'] = $this->AufgabenModel->getAufgaben($id);
            $data['reiter'] = $this->ReiterModel->getReiter();
            $data['mitglieder'] = $this->MitgliederModel->getMitglieder();

            echo view( 'templates/header');
            echo view( 'pages/aufgaben', $data);
            echo view( 'templates/footer');
        }
    }

    public function submit_edit() {
        // Aufgabe ändern
        if(isset($_POST['btnSpeichern'] )) {

            if ($_POST['name']!="" && $_POST['beschreibung']!="" && $_POST['erstellungsdatum']!="" && $_POST['faelligkeitsdatum']!="") {
                // Daten speichern
                if ($this->validation->run($_POST, 'aufgabenbearbeiten')) {

                    if(isset($_POST['id']) && $_POST['id'] != '') {
                        $this->AufgabenModel->updateAufgabe();
                        foreach( $_POST['zustaendige'] as $zustaendige)
                            $this->AufgabenModel->createMitglied_aufgabe($zustaendige);
                    }
                    else {
                        $this->AufgabenModel->createAufgabe();
                        $neusteAufgabe = $this->AufgabenModel->getNeusteAufgabe();
                        foreach( $_POST['zustaendige'] as $zustaendige)
                            $this->AufgabenModel->createMitglied_aufgabe($zustaendige, $neusteAufgabe);

                    }
                    return redirect()->to(base_url('aufgaben/index_edit/'));

                }else {
                    // Daten zurück ans Formular übergeben
                    $data['aufgaben'] = $_POST;
                    // Fehlermeldungen generieren
                    $data['error'] = $this->validation->getErrors();
                    echo view('templates/header');
                    echo view( 'pages/aufgaben', $data);
                    echo view('templates/footer');
                }
            }else{
                return redirect()->to(base_url('aufgaben/index_edit'));
            }
        }
        // Aufgabe löschen
        elseif (isset($_POST['btnLoeschen'])) {
            $this->AufgabenModel->deleteAufgabe();
            return redirect()->to(base_url('aufgaben/index_edit/'));
        }
        // Reset
        elseif(isset($_POST['btnReset'] )) {
            return redirect()->to(base_url('aufgaben/index_edit'));
        }
    }
}
