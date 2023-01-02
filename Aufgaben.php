<?php include('header.php');?>
<div class="container-fluid">
    <header class="bg-light mb-3 mt-4 p-5">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-10">
                <h1 class="display-5">Aufgabenplaner: Aufgaben</h1>
            </div>
        </div>
    </header>
    <div class="row mt-4">
        <div class="col-2">
            <?php include("menu.php");?>
        </div>
        <div class="col-8">
            <table class="table">
                <thead>
                <tr class="bg-light">
                    <th scope="col">Aufgabenbezeichnung:</th>
                    <th scope="col">Beschreibung der Aufgabe:</th>
                    <th scope="col">Reiter:</th>
                    <th scope="col">Zuständig:</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('make_tbl.php');
                include('aufgaben_array.php');
                if(isset($aufgaben))
                    echo make_tbl($aufgaben);
                else
                    echo "<td>Fehler beim Suchen der Einträge</td><td/><td/>";
                ?>
                </tbody>
            </table>
            <br>
            <br>
            <br>
            <h3>Bearbeiten/Erstellen</h3>
            <div class="form-group mt-3">
                <label for="ba">Bezeichnung der Aufgabe:</label>
                <input class="form-control mt-3" placeholder="Aufgabe">
            </div>
            <br>
            <div class="form-group">
                <label for="b">Beschreibung:</label>
                <textarea class="form-control mt-3" rows="5" placeholder="Beschreibung"></textarea>
            </div>
            <div class="form-group mt-2">
                <label for="ba">Erstelldatum:</label>
                <input class="form-control mt-3" placeholder="01.01.23">
            </div>
            <div class="form-group mt-2">
                <label for="ba">Fällig bis:</label>
                <input class="form-control mt-3" placeholder="01.01.23">
            </div>
            <div class="mt-3">
            Zugehöriger Reiter:
                <select class="form-select mt-2" aria-label="Default select example">
                    <option selected>- ToDo -</option>
                    <option value="1">ToDo</option>
                    <option value="2">Erledigt</option>
                    <option value="3">Verschoben</option>
                </select>
            </div>
            <div class="mt-3">
                Zuständig:
                <select class="form-select mt-2" aria-label="Default select example">
                    <option selected>- Max Mustermann -</option>
                    <option value="1">Max Mustermann</option>
                    <option value="2">Petra Müller</option>
                </select>
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

<?php include('footer.php');?>