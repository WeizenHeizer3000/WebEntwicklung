
<div class="container-fluid">
    <header class="bg-light mb-3 mt-4 p-5">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-10">
                <h1 class="display-5">Aufgabenplaner: Reiter</h1>
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
                    <th scope="col">Name</th>
                    <th scope="col">Beschreibung</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php

                include('make_tbl.php');

                include('reiter_array.php');
                if(isset($reiter))
                    echo make_tbl($reiter);
                else
                    echo "<td>Fehler beim Suchen der Einträge</td><td/><td/>";
                ?>
                </tbody>
            </table>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h3>Bearbeiten/Erstellen</h3>
            <div class="form-group mt-3">
                <label for="br">Bezeichnung des Reiters:</label>
                <input class="form-control mt-3" placeholder="Reiter">
            </div>
            <br>
            <div class="form-group">
                <label for="b">Beschreibung:</label>
                <textarea class="form-control mt-3" rows="5" placeholder="Beschreibung"></textarea>
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
