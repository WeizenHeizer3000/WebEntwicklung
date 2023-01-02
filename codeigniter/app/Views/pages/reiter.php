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
        </div>
        <div class="col-2">
        </div>
    </div>
</div>
</div>