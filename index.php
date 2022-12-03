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

        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            ToDo:
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">HTML Datei erstellen (Max Mustermann)</li>
                            <li class="list-group-item">CSS Datei erstellen (Max Mustermann)</li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Erledigt:
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">PC eigeschaltet (Petra Müller)</li>
                            <li class="list-group-item">Kaffee trinken (Petra Müller)</li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Verschoben:
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">Für die Uni lernen (Max Mustermann)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
