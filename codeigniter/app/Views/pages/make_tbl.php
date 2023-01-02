<?php
function make_tbl($data){
    try{
        if (count($data) == 0)
            return "<td>keine Einträge vorhanden</td><td/><td/>";
        $tbl_array = [];                                                  # Array initialisieren
        foreach($data as $row){                                           # Erstellen der rows
            $tbl_array[] = "<tr>";
            foreach ($row as $cell){# Erstellen der Zellen
                if($cell==1){
                    $tbl_array[] ="<td><input class='form-check-input' type='checkbox' value='' id='flexCheckChecked' disabled='disabled' checked></td>";
                }
                else if ($cell==0){
                    $tbl_array[] ="<td><input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' disabled='disabled'></td>";
                }
                else $tbl_array[] = "<td>$cell</td>";
            }

            $tbl_array[] = "<td><a href=''><i class='fa-solid fa-pen-to-square'></i></a></td>
                            <td><a href=''><i class='fa-regular fa-trash-can'></i></a></td></tr>";
        }
        return implode('', $tbl_array);                           # Rückgabe des Table als String
    } catch(Exception $e) {
        echo "<td>Fehler beim Suchen der Einträge</td><td/><td/>";
    }
}
?>