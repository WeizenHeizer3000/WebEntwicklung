<div style="position: fixed;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: dimgray;
            padding-top: 50px;">
    <form style="background-color: whitesmoke;
                 margin: 5% auto 15% auto;
                 width: 80%;" action="delete" method="post">
        <input name="id" value="<?=$id?>" style="visibility: hidden">
        <div style="padding: 16px; text-align: center;">
            <h1>Eintrag Löschen</h1>
            <p>Möchten Sie den Eintrag wirklich löschen?</p>
            <div class="clearfix">
                <button style="float: left;
                               width: 50%;
                               padding: 14px 20px;
                               margin: 8px 0;
                               background-color: lightgrey;" type="submit" name="btnAbbrechen">Abbrechen</button>
                <button style="float: left;
                               width: 50%;
                               padding: 14px 20px;
                               margin: 8px 0;
                               background-color: firebrick;" type="submit" name="btnDelete">Löschen</button>
            </div>
        </div>
    </form>
</div>