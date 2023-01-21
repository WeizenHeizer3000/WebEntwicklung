<?php namespace App\Models;

use CodeIgniter\Model;

class AufgabenModel extends Model {

    public function getAufgaben($aufgaben_id = NULL) {
        $this->aufgabenplaner = $this->db->table('aufgaben');
        $this->aufgabenplaner->select('*');

        IF ($aufgaben_id != NULL)
            $this->aufgabenplaner->where('aufgaben.id', $aufgaben_id);

        $this->aufgabenplaner->orderBy('reiterid');
        $result = $this->aufgabenplaner->get();

        if ($aufgaben_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function createAufgabe() {

        $this->aufgabenplaner = $this->db->table('aufgaben');
        $this->aufgabenplaner->insert(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung'],
            'erstellungsdatum' => $_POST['erstellungsdatum'],
            'faelligkeitsdatum' => $_POST['faelligkeitsdatum'],
            'erstellerid' => $_POST['erstellerid'],
            'reiterid' => $_POST['reiterid']));

    }

    public function updateAufgabe() {

        $this->aufgabenplaner = $this->db->table('aufgaben');
        $this->aufgabenplaner->where('aufgaben.id', $_POST['id']);
        $this->aufgabenplaner->update(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung'],
            'erstellungsdatum' => $_POST['erstellungsdatum'],
            'faelligkeitsdatum' => $_POST['faelligkeitsdatum'],
            'erstellerid' => $_POST['erstellerid'],
            'reiterid' => $_POST['reiterid']));
    }

    public function deleteAufgabe() {
        $this->aufgabenplaner = $this->db->table('aufgaben');
        $this->aufgabenplaner->where('aufgaben.id', $_POST['id']);
        $this->aufgabenplaner->delete();
    }
}