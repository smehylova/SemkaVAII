<?php  ?>
<?php /** @var \App\Models\Pouzivatel $data */ ?>
<div class="container informacie col-12">
    <h1>Vyplnte formular pre uspesnu registraciu</h1>
    <form method="post">
        <div class="form-group">
            <label>Meno: </label>
            <input  class="form-control" type="text" name="meno" required>
        </div>
        <?php if (isset($data['err']['meno'])) {?>
            <div><?= $data['err']['meno'] ?></div>
        <?php } ?>
        <br>

        <div class="form-group">
            <label>Priezvisko: </label>
            <input type="text" class="form-control" name="priezvisko">
        </div>
        <?php if (isset($data['err']['priezvisko'])) {?>
            <div><?= $data['err']['priezvisko'] ?></div>
        <?php } ?>
        <br>

        <div class="form-group">
            <label>Pouzivatelke meno: </label>
            <input type="text" class="form-control" name="login">
        </div>
        <?php if (isset($data['err']['login'])) {?>
            <div><?= $data['err']['login'] ?></div>
        <?php } ?>
        <br>

        <div class="form-group">
            <label>Heslo: </label>
            <input type="password" class="form-control" name="heslo">
        </div>
        <?php if (isset($data['err']['heslo'])) {?>
            <div><?= $data['err']['heslo'] ?></div>
        <?php } ?>
        <br>

        <div class="form-group">
            <label>Zadajte heslo este raz: </label>
            <input type="password" class="form-control" name="hesloDva">
        </div>
        <div class="form-group">
            <label>Email: </label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Telefonne cislo: </label>
            <input type="text" class="form-control" name="telefon">
        </div>
        <?php if (isset($data['err']['telefon'])) {?>
            <div><?= $data['err']['telefon'] ?></div>
        <?php } ?>
        <br>

        <button type="submit" class="btn btn-primary">Prihlasit</button>
    </form>
</div>



