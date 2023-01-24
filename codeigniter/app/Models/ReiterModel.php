<?php namespace App\Models;

use CodeIgniter\Model;

class ReiterModel extends Model {

    public function getReiter($reiter_id = NULL) {
        $this->aufgabenplaner = $this->db->table('reiter');
        $this->aufgabenplaner->select('*');

        IF ($reiter_id != NULL)
            $this->aufgabenplaner->where('reiter.id', $reiter_id);

        $this->aufgabenplaner->orderBy('id');
        $result = $this->aufgabenplaner->get();

        if ($reiter_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function createReiter() {

        $this->aufgabenplaner = $this->db->table('reiter');
        $this->aufgabenplaner->insert(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung']));

    }

    public function updateReiter() {

        $this->aufgabenplaner = $this->db->table('reiter');
        $this->aufgabenplaner->where('reiter.id', $_POST['id']);
        $this->aufgabenplaner->update(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung']));
    }

    public function deleteReiter() {
        $this->aufgabenplaner = $this->db->table('reiter');
        $this->aufgabenplaner->where('reiter.id', $_POST['id']);
        $this->aufgabenplaner->delete();
    }
}