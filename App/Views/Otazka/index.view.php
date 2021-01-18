<?php
/** @var \App\Core\AKontrola $auth */
?>
<div class="container">
    <h1>Otazky a odpovede</h1>
    <a href="?c=Otazka&a=Add" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Pridat otazku</a>
    <br>
    <br>
    <form action="">
        <select name="filterOtazok" onchange="new Otazky(this.value, <?= $auth->getPouzivatel()->getId() ?>)">
            <option value="vsetky">Vsetky otazky</option>
            <option value="moje">Moje otazky</option>
            <option value="zodpovedane">Zodpovedane otazky</option>
            <option value="nezodpovedane">Nezodpovedane otazky</option>
        </select>
    </form>
    <br>
    <div class="row" id="zoznamOtazok">

    </div>




</div>

