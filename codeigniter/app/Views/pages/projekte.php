
<body>
<div class="container-fluid">
    <header class="bg-light mb-3 mt-4 p-5">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-10">
                <h1 class="display-5">Aufgabenplaner: Projekte</h1>
            </div>
        </div>
    </header>
    <div class="row mt-4">
        <div class="col-2">
            <?php include("menu.php");?>
        </div>
        <div class="col-8">
            <div>
                <header class="p-3"
                <h1 class="display-5" Projekt auswählen </h1>
                </header>
            </div>
            <div>
                <h3>Projekt auswählen:</h3>
                <select class="form-select mb-3" aria-label="Default select example">
                    <option selected>- bitte auswählen -</option>
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
            <h3>Projekt bearbeiten/erstellen:</h3>
            <div class="form-group">
                <label for="pn">Projektname:</label>
                <input class="form-control" placeholder="Projekt">
            </div>
            <br>
            <div class="form-group">
                <label for="pb">Projektbeschreibung:</label>
                <textarea class="form-control" rows="5" placeholder="Beschreibung"></textarea>
            </div>
            <br>
            <div class="mb-3">
                <button type="button" class="btn btn-primary">Speichern</button>
                <button type="button" class="btn btn-info">Reset</button>
            </div>
        </div>
        <div class="col-2">
        </div>
    </div>
</div>

