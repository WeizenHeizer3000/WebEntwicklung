<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MitgliederModel;

class Login extends BaseController
{
    public function __construct() {
        $this->MitgliederModel = new MitgliederModel();
    }

    public function index()
    {
        $this->session->set('aktuellesProjekt', null);
        $this->session->set('projektId', null);
        $this->session->set('mitgliederId', null);
        $this->session->set('aktuellesProjektName', null);
        // Anlegen oder ändern
        if (isset($_POST['email']) && isset($_POST['passwort'])) {

            if ($this->validation->run($_POST, 'loginueberpruefen')) {
                if ($this->MitgliederModel->login() != NUll) {
                    $passwort = password_hash($this->MitgliederModel->login()['passwort'], PASSWORD_DEFAULT);

                    if(password_verify ($_POST['passwort'], $passwort)) {
                        $this->session->set('loggedin', TRUE);
                        $this->session->set('id', $this->MitgliederModel->login()['id']);
                        $this->session->set('email', $this->MitgliederModel->login()['email']);
                        return redirect()->to(base_url() . '/projekte/index_edit');
                    }else{
                        $data['login'] = 1;
                        // Fehlermeldungen generieren für falsches Passwort
                        $data['error'] = $this->validation->getErrors();
                        echo view('templates/header');
                        echo view( 'pages/login', $data);
                        echo view('templates/footer');
                    }
                }
            }else {
                // Daten zurück ans Formular übergeben
                $data['login'] = $_POST;
                // Fehlermeldungen generieren
                $data['error'] = $this->validation->getErrors();

                echo view('templates/header');
                echo view( 'pages/login', $data);
                echo view('templates/footer');
            }
        }else{
            // Daten zurück ans Formular übergeben
            $data['login'] = $_POST;
            // Fehlermeldungen generieren
            $data['error'] = $this->validation->getErrors();
            echo view('templates/header');
            echo view( 'pages/login', $data);
            echo view('templates/footer');
        }
    }
}
