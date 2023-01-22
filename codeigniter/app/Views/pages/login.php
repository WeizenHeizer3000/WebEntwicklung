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
            <?= form_open('login/index', array('role' => 'form'))?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email-Adresse</label>
                <input type="email" class="form-control <?=(isset($error['email']))?'is-invalid':'' ?>" id="exampleFormControlInput1" placeholder="Email Adresse eingeben" name="email"
                       value="<?=isset($login['email']) ? $login['email'] : '' ?>">
                <div class="invalid-feedback">
                    <?= (isset($error['email']))?$error['email']:''?>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Passwort</label>
                <input type="password" class="form-control <?=(isset($error['passwort']))?'is-invalid':'' ?>" id="inputPassword" placeholder="Passwort" name="passwort"
                       value="<?=isset($login['passwort']) ? $login['passwort'] : '' ?>" >
                <div class="invalid-feedback">
                    <?= (isset($error['passwort']))?$error['passwort']:''?>
                </div>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input <?=(isset($error['AGBs']))?'is-invalid':'' ?>" value="" id="AGBs" name="AGBs">
                <label class="form-check-label" for="flexCheckDefault">
                    AGBs und Datenschutzbedingung akzeptieren
                </label>
                <div class="invalid-feedback">
                    <?= (isset($error['AGBs']))?$error['AGBs']:''?>
                </div>
            </div>
            <button id="btnsubmit" type="submit" class="btn btn-primary mt-3">Einloggen</button>
            <div>
                Noch nicht registriert?
                <a class="text-decoration-none" href="<?php echo site_url('Registrierung/index')?>">Registrierung</a>
            </div>
        </div>
    </div>
    <div class="col-2">
    </div>
</div>
