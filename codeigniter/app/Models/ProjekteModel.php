<?php namespace App\Models;

use CodeIgniter\Model;

class ProjekteModel extends Model {

    public function getProjekte($projekte_id = NULL) {
        $this->aufgabenplaner = $this->db->table('projekte');
        $this->aufgabenplaner->select('*');

        IF ($projekte_id != NULL)
            $this->aufgabenplaner->where('projekte.id', $projekte_id);

        $this->aufgabenplaner->orderBy('name');
        $result = $this->aufgabenplaner->get();

        if ($projekte_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function createProjekt() {
        $this->aufgabenplaner = $this->db->table('projekte');
        $this->aufgabenplaner->insert(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung'],
            'erstellerid' => session()->get('id')));
    }

    public function updateProjekt() {

        $this->aufgabenplaner = $this->db->table('projekte');
        $this->aufgabenplaner->where('projekte.id', $_POST['id']);
        $this->aufgabenplaner->update(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung'],
            'erstellerid' => $_POST['erstellerid']));
    }

    public function deleteProjekt() {
        $this->aufgabenplaner = $this->db->table('projekte');
        $this->aufgabenplaner->where('projekte.id', $_POST['id']);
        $this->aufgabenplaner->delete();
    }
}