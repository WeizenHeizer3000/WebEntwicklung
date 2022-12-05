<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Übersicht Mitglieder</title>
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
            <?php include("Menu.php");?>
        </div>
        <div class="col-8">
            <table class="table">
                <thead>
                <tr class="bg-light">
                    <th scope="col">Name</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">In Projekt</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        include('make_tbl.php');
                        include('mitglieder_array.php');
                        if(isset($mitglieder))
                            echo make_tbl($mitglieder);
                        else
                            echo "<td>Fehler beim Suchen der Einträge</td><td/><td/>";
                    ?>
                </tbody>
            </table>
        </div>
            <div class="col-2">
            </div>
        </div>
    </div>
</div>
</body>
