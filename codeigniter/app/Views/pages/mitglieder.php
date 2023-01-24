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
            <table class="table table-responsive table-hover d-md-table"
                data-show-columns="true"
                data-show-toggle="true"
                data-sort-stable="true">
                <thead>
                    <tr class="bg-light">
                        <th scope="col">Name</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">In Projekt</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <? foreach( $mitglieder as $item ): ?>
                    <tr>
                        <td><?= $item['username'] ?></td>
                        <td><?= $item['email'] ?></td>
                        <td><?
                            if($item['projekteid']==session()->get('aktuellesProjekt'))
                                echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckChecked' disabled='disabled' checked>";
                            else
                                echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' disabled='disabled'>";
                            ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?=base_url('/mitglieder/ced_edit/' . $item['id'] . '/1/')?>">
                                    <button type='button' name='btnBearbeiten' id='btnBearbeiten' class='btn'><i style="color: Dodgerblue;" class="fas fa-edit"></i></button>
                                </a>
                                <a href="<?=base_url('/mitglieder/ced_edit/' . $item['id'] . '/2/')?>">
                                    <button type='submit' name='btnLoeschen' id='btnLoeschen' class='btn'><i style="color: Dodgerblue;" class="fas fa-trash"></i></button>
                                </a>
                            </div>
                        </td>
                    </tr>
                <? endforeach; ?>
                </tbody>
            </table>
            <br>
            <br>
            <h3>Bearbeiten/Erstellen</h3>
            <div>
                <?= form_open('mitglieder/submit_edit', array('role' => 'form'))?>
                <div class="form-group mb-3 mt-3">
                    <label for="ba" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">E-Mail-Adresse:</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="E-Mail-Adresse eingeben">
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Passwort</label>
                    <input type="password" class="form-control" id="inputPassword" name="passwort" placeholder="Passwort">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="zugeordnet" name="zugeordnet">
                    <label class="form-check-label" for="flexCheckDefault">
                        Dem Projekt zugeordnet
                    </label>
                </div>
                <br>
                <div class="mb-3">
                    <button id="btnsubmit" type="submit" name="btnSpeichern" class="btn btn-primary">Speichern</button>
                    <button id="btnsubmit" type="submit" name="btnReset" class="btn btn-info">Reset</button>
                </div>
            </div>
        </div>
        <div class="col-2">
        </div>
    </div>
</div>

