<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projekte</title>
    <link href="https://unpkg.com/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://unpkg.com/bootstrap-table@1.20.1/dist/bootstrap-table.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <header class="bg-light mb-3 mt-4 p-5">
        <h1 class="display-5 text-center">Aufgabenplaner: Projekte</h1>
    </header>
    <div class="row mt-4">
        <div class="col-2">
            <?php include("Menu.php");?>
        </div>
        <div class="col-8">
            <div>
                <header class="p-3"
                    <h1 class="display-5" Projekt auswählen </h1>
                </header>
            </div>
            <div>
                <select class="form-select mb-3" aria-label="Default select example">
                    <option selected>- Bitte auswählen -</option>
                    <option value="1">Pizza</option>
                    <option value="2">Burger</option>
                    <option value="3">Döner</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-primary">Auswählen</button>
                <button type="button" class="btn btn-primary">Bearbeiten</button>
                <button type="button" class="btn btn-danger">Löschen</button>
            </div>

        </div>
        <div class="col-2">
        </div>
    </div>
</div>
</div>
</body>
