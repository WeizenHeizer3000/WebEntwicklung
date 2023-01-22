<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MitgliederModel;
use App\Models\Mitglieder_projekteModel;

class Login extends BaseController
{
    public function __construct() {
        $this->MitgliederModel = new MitgliederModel();
        $this->Mitglieder_projekteModel = new Mitglieder_projekteModel();
    }

    public function index()
    {
        if ($this->validation->run($_POST, 'personbearbeiten')) {
            // Anlegen oder ändern
            if (isset($_POST['email']) && isset($_POST['passwort'])) {

                if ($this->MitgliederModel->login() != NUll) {
                    $passwort = password_hash($this->MitgliederModel->login()['passwort'], PASSWORD_DEFAULT);

                    if(password_verify ($_POST['passwort'], $passwort)) {
                        $this->session->set('loggedin', TRUE);
                        $this->session->set('id', $this->MitgliederModel->login()['id']);
                        $this->session->set('email', $this->MitgliederModel->login()['email']);
                        if (isset($this->Mitglieder_projekteModel->getMitglieder_Projekte()['projekteid'])) {
                            $this->session->set('projektId', $this->Mitglieder_projekteModel->getMitglieder_Projekte()['projekteid']);
                            $this->session->set('mitgliederId', $this->Mitglieder_projekteModel->getMitglieder_Projekte()['mitgliederid']);
                        }else{
                            $this->session->set('projektId', -1);
                        }
                        return redirect()->to(base_url() . '/index');
                    }
                }
            }
            echo view('templates/header');
            echo view('pages/login');
            echo view('templates/footer');
        } else {
            // Daten zurück ans Formular übergeben
            $data['personen'] = $_POST;
            // Fehlermeldungen generieren
            $data['error'] = $this->validation->getErrors();

            echo('<pre>');
            var_dump($data);
            echo('</pre>');
            die();
            echo view('templates/header');
            echo view( 'pages/login', $data);
            echo view('templates/footer');
        }
    }
}
