<?php

$mitglieder = array(
    array(
        'Name' => 'Max Mustermann',
        'E-Mail' => 'mustermann@muster.de',
        'In Projekt' => True,
    ),
    array(
        'Name' => 'Petra Müller',
        'E-Mail' => 'petra@mueller.de',
        'In Projekt' => True,
    )
);

function make_tbl($mitglieder){

    $tbl_array = [];
    $tbl_array[] = "<table>";
    foreach( $mitglieder as $row){
        $tbl_array[] = "<tr>";
        foreach ( $row as $cell ) {
            $tbl_array[] = "<td>$cell</td>";
        }
        $tbl_array[] = "</tr>";
    }
    $tbl_array[] = "</table>";

    #return table as a string
    return implode('', $tbl_array);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ToDo Liste</title>
    <link href="https://unpkg.com/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://unpkg.com/bootstrap-table@1.20.1/dist/bootstrap-table.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <header class="bg-light mb-3 mt-4 p-5">
        <h1 class="display-5 text-center">Aufgabenplaner: Personen</h1>
    </header>
    <div class="row mt-4">
        <div class="col-2">
            <?php include("menu.php");?>
        </div>
        <div class="col-8">
                <?php
                     #               foreach ($mitglieder as $mitglieder) {
                     #                   echo($mitglieder['Name'] . '<br>');
                     #                   echo($mitglieder['E-Mail'] . '<br>');
                     #                   echo($mitglieder['In Projekt'] . '<br>');
                     #                   echo '<br/>';
                     #               }
                    make_tbl($mitglieder);
                ?>
        </div>
            <div class="col-2">
            </div>
        </div>
    </div>
</div>
</body>
