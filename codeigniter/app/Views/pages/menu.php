<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo site_url('Projekte/index_edit')?>">Projekte</a>
                    </li>
                    <li <? if(session()->get('aktuellesProjektName') == null) : ?>style="visibility: hidden"<? endif ?> class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo(session()->get('aktuellesProjektName'))?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li <? if(session()->get('aktuellesProjekt') == null) : ?>style="visibility: hidden"<? endif ?>>
                                <a class="dropdown-item" href="<?php echo site_url('Index/index')?>">Projektübersicht</a>
                            </li>
                            <li <? if(session()->get('aktuellesProjekt') == null) : ?>style="visibility: hidden"<? endif ?>>
                                <a class="dropdown-item" href="<?php echo site_url('Reiter/index_edit')?>">Reiter</a>
                            </li>
                            <li <? if(session()->get('aktuellesProjekt') == null) : ?>style="visibility: hidden"<? endif ?>>
                                <a class="dropdown-item" href="<?php echo site_url('Aufgaben/index_edit')?>">Aufgaben</a>
                            </li>
                            <li <? if(session()->get('aktuellesProjekt') == null) : ?>style="visibility: hidden"<? endif ?>>
                                <a class="dropdown-item" href="<?php echo site_url('Mitglieder/index_edit')?>">Mitglieder</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <a class="me-2" href="<?php echo site_url('Login/index')?>">
                    <button id="btnsubmit" type="submit" name="btnLogout" class="btn btn-primary">Logout</button>
                </a>
            </div>
        </div>
    </nav>

</div>