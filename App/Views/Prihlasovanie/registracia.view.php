<?php  ?>
<?php /** @var \App\Models\Pouzivatel $data */ ?>
<div class="container informacie col-12">
    <h1>Vyplnte formular pre uspesnu registraciu</h1>
    <form method="post">
        <div class="form-group">
            <label>Meno: </label>
            <input  class="form-control" type="text" name="meno" required>
        </div>
        <div class="chyba">
        <?php if (isset($data['err']['meno'])) {
            foreach ($data['err']['meno'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>
        </div>
        <br>

        <div class="form-group">
            <label>Priezvisko: </label>
            <input type="text" class="form-control" name="priezvisko" required>
        </div>
        <div class="chyba">
        <?php if (isset($data['err']['priezvisko'])) {
            foreach ($data['err']['priezvisko'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>
        </div>
        <br>

        <div class="form-group">
            <label>Pouzivatelke meno: </label>
            <input type="text" class="form-control" name="login" required>
        </div>
        <div class="chyba">
        <?php if (isset($data['err']['login'])) {
            foreach ($data['err']['login'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>
        </div>
        <br>

        <div class="form-group">
            <label>Heslo: </label>
            <input type="password" class="form-control" name="heslo" required>
        </div>
        <div class="chyba">
        <?php if (isset($data['err']['heslo'])) {
            foreach ($data['err']['heslo'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>
        </div>
        <br>

        <div class="form-group">
            <label>Zadajte heslo este raz: </label>
            <input type="password" class="form-control" name="hesloDva" required>
        </div>
        <div class="form-group">
            <label>Email: </label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label>Telefonne cislo: </label>
            <input type="text" class="form-control" name="telefon">
        </div>
        <div class="chyba">
        <?php if (isset($data['err']['telefon'])) {
            foreach ($data['err']['telefon'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Prihlasit</button>
    </form>
</div>



