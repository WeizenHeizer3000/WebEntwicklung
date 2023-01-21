<div class="container">
    <div class="card bg-light mt-4">
        <legend class="card-header">
            <div class="d-flex justify-content-between">
                <div class="h5"><strong>Datensatz <?= $todo == 2 ? ' löschen' : ' bearbeiten oder neu erstellen'?></strong></div>
                <div class="h5"><strong></strong></div>
            </div>
        </legend>
        <div class="card-body">

            <form action="<?= base_url('Mitglieder/submit_edit') ?>" method="post">

                <div class="form-group row mb-2">
                    <label for="Username" class="col-sm-2 col-form-label">Username:</label>
                    <div class="col-sm-10">
                        <input type="hidden" id="id" name="id" value="<?=isset($mitglieder['id']) ? $mitglieder['id'] : '' ?>">
                        <input <? if($todo == 2) : ?>disabled='disabled'<? endif ?> type="text" class="form-control"  id="username" name="username" placeholder="username"
                               value="<?=isset($mitglieder['username']) ? $mitglieder['username'] : '' ?>" >
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input <? if($todo == 2) : ?>disabled='disabled'<? endif ?>type="email" class="form-control" id="email" name="email" placeholder="email" value="<?=isset($mitglieder['email']) ? $mitglieder['email'] : '' ?>">
                    </div>
                </div>

                <div <? if(session()->get('id') != $mitglieder['id']) : ?>style="visibility: hidden"<? endif ?> class="form-group row mb-2">
                    <label for="passwort" class="col-sm-2 col-form-label">Passwort:</label>
                    <div class="col-sm-10">
                        <input <? if($todo == 2) : ?>disabled='disabled'<? endif ?>type="password" class="form-control" id="passwort" name="passwort" placeholder="passwort" value="<?=isset($mitglieder['passwort']) ? $mitglieder['passwort'] : '' ?>">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">

                        <? if($todo == 0) : ?>
                            <button type="submit" class="btn btn-success mb-2 mr-2" name="btnSpeichern" id="btnSpeichern"><i class="far fa-plus-square"></i> Erstellen</button>
                        <? endif ?>

                        <? if($todo == 1) : ?>
                            <button type="submit" class="btn btn-success mb-2 mr-2" name="btnSpeichern" id="btnSpeichern"><i class="far fa-save"></i> Speichern</button>
                        <? endif ?>

                        <? if($todo == 2) : ?>
                            <button type="submit" class="btn btn-danger mb-2 mr-2" name="btnLoeschen" id="btnLoeschen"><i class="fas fa-trash"></i> Löschen</button>
                        <? endif ?>

                        <button class="btn btn-primary mb-2" type="submit" name="btnAbbrechen" id="btnAbbrechen"><i class="far fa-window-close"></i> Abbrechen</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
