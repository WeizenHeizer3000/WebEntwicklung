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
        </div>
        <div class="col-8">
            <?php include("menu.php");?>
            <div>
                <h3>Projekt auswählen:</h3>
                <div class="form-group">
                    <form action="ced_edit" method="post">
                    <select class="form-select mb-3" aria-label="Default select example" name="id">
                        <? foreach( $projekte as $item ): ?>
                            <option <? if(isset($projektBearbeiten['id']) && $item['id']==$projektBearbeiten['id']): ?>selected<?endif;?>
                                    value="<?= $item['id'] ?>"> <?= $item['name'] ?> </option>
                        <? endforeach; ?>
                    </select>

                    <div class="mb-3">
                        <button id="btnAuswählen" type="submit" name="btnAuswaehlen" class="btn btn-primary">Auswählen</button>
                        <button id="btnBearbeiten" type="submit" name="btnBearbeiten" class="btn btn-primary">Bearbeiten</button>
                        <button id="btnLoeschen" type="submit" name="btnLoeschen" class="btn btn-danger">Löschen</button>
                    </div>
                    </form>
                </div>

                <div class="form-group">
                    <form action="submit_edit" method="post">
                    <h3>Projekt bearbeiten/erstellen:</h3>
                    <div class="form-group">
                        <label for="pn">Projektname:</label>
                        <input type="text" id="name" name="name" class="form-control <?=(isset($error['name']))?'is-invalid':'' ?>" placeholder="Projekt"
                               value="<?=isset($projektBearbeiten['name']) ? $projektBearbeiten['name'] : '' ?>">
                        <div class="invalid-feedback">
                            <?= (isset($error['name']))?$error['name']:''?>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="pb">Projektbeschreibung:</label>
                        <textarea type="text" id="beschreibung" name="beschreibung" class="form-control <?=(isset($error['beschreibung']))?'is-invalid':'' ?>" rows="5" placeholder="Beschreibung"><?=isset($projektBearbeiten['beschreibung']) ? $projektBearbeiten['beschreibung'] : '' ?></textarea>
                        <div class="invalid-feedback">
                            <?= (isset($error['beschreibung']))?$error['beschreibung']:''?>
                        </div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <button id="btnSpeichern" type="submit" name="btnSpeichern" class="btn btn-primary">Speichern</button>
                        <button id="btnReset" type="submit" name="btnReset" class="btn btn-info">Reset</button>
                        <input name="id" value="<?=isset($projektBearbeiten['id']) ? $projektBearbeiten['id'] : '' ?>" style="visibility: hidden">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-2">
        </div>
    </div>
</div>

