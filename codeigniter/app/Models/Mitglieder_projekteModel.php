<?php namespace App\Models;

use CodeIgniter\Model;

class Mitglieder_projekteModel extends Model
{
    public function getMitglieder_projekte()
    {
        $this->aufgabenplaner = $this->db->table('mitglieder_projekte');
        $this->aufgabenplaner->select('*');
        $this->aufgabenplaner->where('mitgliederid', session()->get('id'));
        $result = $this->aufgabenplaner->get();

        return $result->getRowArray();
    }

    public function getMitgliederInProjekte()
    {
        $this->aufgabenplaner = $this->db->table('mitglieder_projekte');
        $this->aufgabenplaner->select('mitgliederid');
        $result = $this->aufgabenplaner->get();

        return $result->getRowArray();
    }
}