<?php
    /** @var string $contentHTML */
/** @var \App\Core\AKontrola $auth */
?>

<html>
<head>
    <title>COPY SERVIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="SemkaVAII/public/pravidla.css">
</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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
                    <?php if ($auth->jePrihlaseny()) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?c=Otazka">Forum</a>
                        </li>
                    <?php } ?>
                    <?php if ($auth->jeSpravca()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=Ziadost">Ziadosti o kontakt</a>
                    </li>
                    <?php } ?>
                </ul>
                    <?php if ($auth->jePrihlaseny()) { ?>
                        <form class="form-inline mt-2 mt-md-0">
                            <a class="btn btn-secondary btn-bg" href="?c=Prihlasovanie&a=odhlasit">Odhlasit</a>
                        </form>
                    <?php } ?>
                    <?php if (!$auth->jePrihlaseny()) { ?>
                        <form class="form-inline mt-2 mt-md-0">
                            <a class="btn btn-secondary btn-bg" href="?c=Prihlasovanie">Prihlasit sa</a>
                        </form>
                    <?php } ?>

            </div>
        </nav>


<div class="web-content">
    <?= $contentHTML ?>
</div>

</body>
</html>
