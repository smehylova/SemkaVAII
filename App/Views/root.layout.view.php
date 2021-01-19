<?php
    /** @var string $contentHTML */
/** @var \App\Core\AKontrola $auth */
?>
<!DOCTYPE html>
<html>
<head>
    <title>COPY SERVIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="SemkaVAII/public/pravidla.css">
    <script src="SemkaVAII/public/otazky.js"></script>
    <script src="SemkaVAII/public/ziadosti.js"></script>
</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php if ($auth->jePrihlaseny()) { ?>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Vitaj <?= $auth->getPouzivatel()->getMeno() ?> <?= $auth->getPouzivatel()->getPriezvisko() ?>
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?c=Home&a=udaje">Osobne udaje</a>
                        <a class="dropdown-item" href="?c=Otazka">Forum</a>
                        <?php if ($auth->jeSpravca()) { ?>
                            <a class="dropdown-item" href="?c=Ziadost">Ziadosti o kontakt</a>
                        <?php } ?>
                        <a class="dropdown-item" href="?c=Home&a=pouzivatelia">Registrovani</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?c=Prihlasovanie&a=odhlasit">Odhlasit</a>
                    </div>
                </div>
            <?php } ?>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?c=Home">Domov</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=Home&a=onas">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=Home&a=kontakt">Kontakt</a>
                    </li>
                    <?php if (!$auth->jePrihlaseny()) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?c=Prihlasovanie">Prihlasit sa</a>
                        </li>
                    <?php } ?>
                </ul>

            </div>
        </nav>


<div class="web-content">
    <?= $contentHTML ?>
</div>

</body>
</html>
