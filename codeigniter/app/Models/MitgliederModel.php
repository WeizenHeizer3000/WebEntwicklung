<?php namespace App\Models;

use CodeIgniter\Model;

class MitgliederModel extends Model {

    public function login() {
        $this->aufgabenplaner = $this->db->table('mitglieder');
        $this->aufgabenplaner->select('*');
        $this->aufgabenplaner->where('mitglieder.email', $_POST['email']);
        $result = $this->aufgabenplaner->get();

        return $result->getRowArray();
    }

    public function getMitglieder($mitglieder_id = NULL) {
        $this->aufgabenplaner = $this->db->table('mitglieder');
        $this->aufgabenplaner->select('*');

        IF ($mitglieder_id != NULL)
            $this->aufgabenplaner->where('mitglieder.id', $mitglieder_id);

        $this->aufgabenplaner->orderBy('username');
        $result = $this->aufgabenplaner->get();

        if ($mitglieder_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function createMitglied() {
        $this->aufgabenplaner = $this->db->table('mitglieder');
        $this->aufgabenplaner->insert(array('username' => $_POST['username'],
            'email' => $_POST['email'],
            'passwort' => $_POST['passwort']));
    }

    public function updateMitglied() {

        $this->aufgabenplaner = $this->db->table('mitglieder');
        $this->aufgabenplaner->where('mitglieder.id', $_POST['id']);
        $this->aufgabenplaner->update(array('username' => $_POST['username'],
            'email' => $_POST['email'],
            'passwort' => $_POST['passwort']));
    }

    public function deleteMitglied() {
        $this->aufgabenplaner = $this->db->table('mitglieder');
        $this->aufgabenplaner->where('mitglieder.id', $_POST['id']);
        $this->aufgabenplaner->delete();
    }
}