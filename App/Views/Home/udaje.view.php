<?php
/** @var \App\Core\AKontrola $auth */
?>

<div class="container informacie udaje">
    <div class="nadpis">OSOBNE UDAJE</div>
    <hr class="delic">
    <b>Meno</b>: <?= $auth->getPouzivatel()->getMeno() ?> <br>
    <b>Priezvisko</b>: <?= $auth->getPouzivatel()->getPriezvisko() ?> <br>
    <b>Login</b>: <?= $auth->getPouzivatel()->getLogin() ?> <br>
    <b>Telefon</b>: <?= $auth->getPouzivatel()->getTelefon() ?> <br>
    <b>Email</b>: <?= $auth->getPouzivatel()->getEmail() ?> <br>
</div>
