<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ToDo Liste</title>
    <link href="https://unpkg.com/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
<div class="container-fluid">
    <header class="bg-light mb-3 mt-4 p-5">
        <h1 class="display-5 text-center">Aufgabenplaner: Todos (Aktuelles Projekt)</h1>
    </header>
    <div class="row mt-4">
        <div class="col-2">
            <?php include("menu.php");?>
        </div>
        <div><div class="col-8">
                <?php
                    include 'mitglieder_array';
                    foreach ($mitglieder as $mitglied) {
                        echo ($mitglied['Name'].'<br>');
                        echo ($mitglied['E-Mail'].'<br>');
                        echo ($['In Projekt'].<br>');
                    echo '<br/>';
                ?>
        </div>
            <div class="col-2">
            </div>
        </div>
    </div>
</div>
</body>