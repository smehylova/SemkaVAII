<?php
/** @var \App\Core\AKontrola $auth */
?>
<div class="container">
    <div class="nadpis">Otazky a odpovede</div>
    <a href="?c=Otazka&a=Add" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Pridat otazku</a>
    <br>
    <br>
    <form action="">
        <select name="filterOtazok" onchange="new Otazky(this.value, <?= $auth->getPouzivatel()->getId() ?>)">
            <option value="">Vyber filter: </option>
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

