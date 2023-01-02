<?php include('header.php');?>
<div class="container-fluid">
    <header class="bg-light mb-3 mt-4 p-5">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-10">
                <h1 class="display-5">Aufgabenplaner: Login</h1>
            </div>
        </div>
    </header>
    <div class="row mt-4">
        <div class="col-2">
        </div>
        <div class="col-8">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email-Adresse</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email Adresse eingeben">
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Passwort</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Passwort">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    AGBs und Datenschutzbedingung akzeptieren
                </label>
            </div>
            <button type="button" class="btn btn-primary mt-3">Einloggen</button>
            <div>
                <?php echo "Noch nicht registriert? "; ?>
                <a class="text-decoration-none" href="registrierung.php">Registrierung</a>
            </div>
            <div>
                <br>
                <?php echo "Da der Login Vorgang technisch noch nicht realisiert wurde:"; ?>
                <a class="text-decoration-none" href="index.php">Überspringen</a>
            </div>


        </div>

    </div>
    <div class="col-2">
    </div>
</div>
<?php include('footer.php');?>