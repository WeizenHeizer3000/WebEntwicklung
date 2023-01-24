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
        $this->aufgabenplaner->select('mitglieder.*, mitglieder_projekte.*');
        $this->aufgabenplaner->join('mitglieder_projekte', 'mitglieder_projekte.mitgliederid = mitglieder.id', 'left');

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

    public function getNeustesMitglied(){
        $this->aufgabenplaner = $this->db->table('mitglieder');
        $this->aufgabenplaner->select('id');
        $this->aufgabenplaner->orderBy('id DESC');
        $this->aufgabenplaner->limit(1);
        $result = $this->aufgabenplaner->get();
        return $result->getRowArray();
    }

    public function deleteMitglied($id=null) {
        $this->aufgabenplaner = $this->db->table('mitglieder_projekte');
        $this->aufgabenplaner->where('mitgliederid', $id);
        $this->aufgabenplaner->delete();
        $this->aufgabenplaner = $this->db->table('mitglieder');
        $this->aufgabenplaner->where('mitglieder.id', $id);
        $this->aufgabenplaner->delete();
    }
}