
<div class="container-fluid">
    <header class="bg-light mb-3 mt-4 p-5">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-10">
                <h1 class="display-5">Aufgabenplaner: Personen</h1>
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
                    <th scope="col">E-Mail</th>
                    <th scope="col">In Projekt</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('make_tbl.php');

                if(isset($mitglieder))
                    echo make_tbl($mitglieder);
                else
                    echo "<td>Fehler beim Suchen der Einträge</td><td/><td/>";
                ?>
                </tbody>
            </table>
            <br>
            <h3>Bearbeiten/Erstellen</h3>
            <div class="form-group mb-3 mt-3">
                <label for="ba">Username:</label>
                <input class="form-control mt-3" placeholder="Username">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">E-Mail-Adresse:</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="E-Mail-Adresse eingeben">
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Passwort</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Passwort">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Dem Projekt zugeordnet
                </label>
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

