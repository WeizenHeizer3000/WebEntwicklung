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
        </div>
        <div class="col-8">
            <?php include("menu.php");?>
            <div class="form-group">
                <table class="table table-responsive table-hover d-md-table"
                       data-show-columns="true"
                       data-show-toggle="true"
                       data-sort-stable="true">
                    <thead>
                    <tr class="bg-light">
                        <th scope="col">Aufgabenbezeichnung:</th>
                        <th scope="col">Beschreibung der Aufgabe:</th>
                        <th scope="col">Reiter:</th>
                        <th scope="col">Zuständig:</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach( $aufgaben as $item ): ?>
                        <tr>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['beschreibung'] ?></td>
                            <td><?= $item['reitername'] ?></td>
                            <td><ul class="list-unstyled mb-0"><?= $item['zustaendige'] ?></ul></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?=base_url('/aufgaben/ced_edit/' . $item['id'] . '/1/')?>">
                                        <button type='button' name='btnBearbeiten' id='btnBearbeiten' class='btn'><i style="color: Dodgerblue;" class="fas fa-edit"></i></button>
                                    </a>
                                    <a href="<?=base_url('/aufgaben/ced_edit/' . $item['id'] . '/2/')?>">
                                        <button type='submit' name='btnLoeschen' id='btnLoeschen' class='btn'><i style="color: Dodgerblue;" class="fas fa-trash"></i></button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <? endforeach; ?>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <h3>Bearbeiten/Erstellen</h3>
            <div class="form-group mt-3">
            <?= form_open('aufgaben/submit_edit', array('role' => 'form'))?>
                <label for="ba" class="form-label">Bezeichnung der Aufgabe:</label>
                <input type="text" id="name" name="name" class="form-control <?=(isset($error['name']))?'is-invalid':'' ?>" placeholder="Aufgabe"
                       value="<?=isset($aufgabeBearbeiten['name']) ? $aufgabeBearbeiten['name'] : '' ?>">
                    <div class="invalid-feedback">
                        <?= (isset($error['name']))?$error['name']:''?>
                    </div>
            </div>
            <div class="form-group">
                <label for="b" class="form-label">Beschreibung:</label>
                <textarea type="text" id="beschreibung" name="beschreibung" class="form-control <?=(isset($error['beschreibung']))?'is-invalid':'' ?>" rows="5" placeholder="Beschreibung"><?=isset($aufgabeBearbeiten['beschreibung']) ? $aufgabeBearbeiten['beschreibung'] : '' ?></textarea>
                <div class="invalid-feedback">
                    <?= (isset($error['beschreibung']))?$error['beschreibung']:''?>
                </div>
            </div>
            <div class="form-group mt-2">
                <label for="ed" class="form-label">Erstelldatum:</label>
                <input type="text" id="erstellungsdatum" name="erstellungsdatum" class="form-control <?=(isset($error['erstellungsdatum']))?'is-invalid':'' ?>" placeholder="01.01.23"
                       value="<?=isset($aufgabeBearbeiten['erstellungsdatum']) ? $aufgabeBearbeiten['erstellungsdatum'] : '' ?>">
                <div class="invalid-feedback">
                    <?= (isset($error['erstellungsdatum']))?$error['erstellungsdatum']:''?>
                </div>
            </div>
            <div class="form-group mt-2">
                <label for="fd" class="form-label">Fällig bis:</label>
                <input type="text" id="faelligkeitsdatum" name="faelligkeitsdatum" class="form-control <?=(isset($error['faelligkeitsdatum']))?'is-invalid':'' ?>" placeholder="01.01.23"
                       value="<?=isset($aufgabeBearbeiten['faelligkeitsdatum']) ? $aufgabeBearbeiten['faelligkeitsdatum'] : '' ?>">
                <div class="invalid-feedback">
                    <?= (isset($error['faelligkeitsdatum']))?$error['faelligkeitsdatum']:''?>
                </div>
            </div>
            <div class="class="form-group mt-3">
                <label for="zr" class="form-label mt-1">Zugehöriger Reiter:</label>
                <select class="form-select" aria-label="Default select example" name="reiterid">
                    <? foreach( $reiter as $item ): ?>
                        <option <? if(isset($aufgabeBearbeiten['reiterid']) && $item['id']==$aufgabeBearbeiten['reiterid']): ?>selected<?endif;?>
                                value="<?= $item['id'] ?>"> <?= $item['name'] ?> </option>
                    <? endforeach; ?>
                </select>
            </div>
            <div class="class="form-group mt-3">
                <label for="zr" class="form-label mt-1">Zuständig:</label>
                <select multiple name="zustaendige[]" class="form-control" >
                    <? foreach( $mitglieder as $item ): ?>
                        <option value="<?= $item['id'] ?>" > <?= $item['username'] ?> </option>
                    <? endforeach; ?>
                </select>
            </div>
            <br>
            <div class="mb-3">
                <button id="btnSpeichern" type="submit" name="btnSpeichern" class="btn btn-primary">Speichern</button>
                <button id="btnReset" type="submit" name="btnReset" class="btn btn-info">Reset</button>
                <input name="id" value="<?=isset($aufgabeBearbeiten['id']) ? $aufgabeBearbeiten['id'] : '' ?>" style="visibility: hidden">
            </div>
            </form>
        </div>
        <div class="col-2">
        </div>
    </div>
</div>

