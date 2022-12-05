<?php
function make_tbl($data){
    try{
        if (count($data) == 0)
            return "<td>keine Einträge vorhanden</td><td/><td/>";
        $tbl_array = [];                                                  # Array initialisieren
        foreach($data as $row){                                           # Erstellen der rows
            $tbl_array[] = "<tr>";
            foreach ($row as $cell){                                      # Erstellen der Zellen
                $tbl_array[] = "<td>$cell</td>";
            }
            $tbl_array[] = "</tr>";
        }
        return implode('', $tbl_array);                           # Rückgabe des Table als String
    } catch(Exception $e) {
        echo "<td>Fehler beim Suchen der Einträge</td><td/><td/>";
    }
}
?>