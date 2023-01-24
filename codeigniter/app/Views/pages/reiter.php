
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
            <table class="table table-responsive table-hover d-md-table"
                   data-show-columns="true"
                   data-show-toggle="true"
                   data-sort-stable="true">
                <thead>
                <tr class="bg-light">
                    <th scope="col">Name</th>
                    <th scope="col">Beschreibung</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <? foreach( $reiter as $item ): ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['beschreibung'] ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="">
                                    <button type='button' name='btnBearbeiten' id='btnBearbeiten' class='btn'><i style="color: Dodgerblue;" class="fas fa-edit"></i></button>
                                </a>
                                <a href="">
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
            <div class="form-group mt-3">
                <label for="br" class="form-label">Bezeichnung des Reiters:</label>
                <input class="form-control" placeholder="Reiter">
            </div>
            <br>
            <div class="form-group">
                <label for="b" class="form-label">Beschreibung:</label>
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
