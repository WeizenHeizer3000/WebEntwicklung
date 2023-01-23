<?php namespace App\Models;

use CodeIgniter\Model;

class Mitglieder_aufgabenModel extends Model
{
    public function getMitglieder_aufgaben()
    {
        $this->aufgabenplaner = $this->db->table('mitglieder');
        $this->aufgabenplaner->select('group_concat("<li>", mitglieder.name, "</li>") as zuständige');
        $this->aufgabenplaner->join('mitglieder_aufgaben', 'mitglieder_aufgaben.mitgliederid = mitglieder.id');
        $result = $this->aufgabenplaner->get();

        return $result->getResultArray();
    }
}