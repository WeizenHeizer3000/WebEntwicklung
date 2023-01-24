<?php namespace App\Models;

use CodeIgniter\Model;

class AufgabenModel extends Model {

    public function getAufgaben($aufgaben_id = NULL) {
        $this->aufgabenplaner = $this->db->table('aufgaben');
        $this->aufgabenplaner->select('aufgaben.*, group_concat("<li>", , "",
                mitglieder.username, "</li>" separator "")
                as zustaendige, reiter.name as reitername');
        $this->aufgabenplaner->join('mitglieder_aufgaben', 'mitglieder_aufgaben.aufgabenid = aufgaben.id');
        $this->aufgabenplaner->join('mitglieder', 'mitglieder_aufgaben.mitgliederid = mitglieder.id');
        $this->aufgabenplaner->join('reiter', 'aufgaben.reiterid = reiter.id');

        IF ($aufgaben_id != NULL)
            $this->aufgabenplaner->where('aufgaben.id', $aufgaben_id);

        $this->aufgabenplaner->groupBy('aufgaben.id');
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
            'erstellerid' => session()->get('id'),
            'reiterid' => $_POST['reiterid']));
    }

    public function getNeusteAufgabe(){
        $this->aufgabenplaner = $this->db->table('aufgaben');
        $this->aufgabenplaner->select('id');
        $this->aufgabenplaner->orderBy('id DESC');
        $this->aufgabenplaner->limit(1);

        $result = $this->aufgabenplaner->get();
        return $result->getRowArray();
    }

    public function createMitglied_aufgabe($zustaendiger, $aufgaben_id = null){
        if ($aufgaben_id == null){
            $this->aufgabenplaner = $this->db->table('mitglieder_aufgaben');
            $this->aufgabenplaner->insert(array('mitgliederid' => $zustaendiger,
                'aufgabenid' => $_POST['id'],
                'mitglied_aufgabe' => ''));
        }else{
            $this->aufgabenplaner = $this->db->table('mitglieder_aufgaben');
            $this->aufgabenplaner->insert(array('mitgliederid' => $zustaendiger,
                'aufgabenid' => $aufgaben_id,
                'mitglied_aufgabe' => ''));
        }
    }

    public function updateAufgabe() {
        $this->aufgabenplaner = $this->db->table('aufgaben');
        $this->aufgabenplaner->where('aufgaben.id', $_POST['id']);
        $this->aufgabenplaner->update(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung'],
            'erstellungsdatum' => $_POST['erstellungsdatum'],
            'faelligkeitsdatum' => $_POST['faelligkeitsdatum'],
            'reiterid' => $_POST['reiterid']));
    }

    public function deleteAufgabe($id=null) {
        $this->aufgabenplaner = $this->db->table('mitglieder_aufgaben');
        $this->aufgabenplaner->where('aufgabenid', $id);
        $this->aufgabenplaner->delete();
        $this->aufgabenplaner = $this->db->table('aufgaben');
        $this->aufgabenplaner->where('aufgaben.id', $id);
        $this->aufgabenplaner->delete();
    }
}