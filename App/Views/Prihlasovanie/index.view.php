<?php  ?>
<div class="container informacie col-12">
    <h1>Zadajte pouzivatelske meno a heslo pre prihlasenie</h1>
    <form method="post">
        <div class="form-group">
            <label>Pouzivatelske meno(login): </label>
            <input  class="form-control" type="text" name="login">
            <div class="chyba">
            <?php if (isset($data['err']['login'])) {?>
                <div><?= $data['err']['login'] ?></div>
            <?php } ?>
            </div>
        </div>
        <div class="form-group">
            <label>Heslo: </label>
            <input type="password" class="form-control" name="heslo">
            <div class="chyba">
            <?php if (isset($data['err']['heslo'])) {?>
                <div><?= $data['err']['heslo'] ?></div>
            <?php } ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Prihlasit</button>
        <br><br>
        <label>Nemate este vytvoreny ucet? <br> V pripade zaujmu sa mozte registrovat <a href="?c=Prihlasovanie&a=registracia">tu</a>.</label>
    </form>
</div>



