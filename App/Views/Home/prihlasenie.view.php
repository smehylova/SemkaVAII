<?php  ?>
<div class="container informacie col-12">
    <h1>Zadajte pouzivatelske meno a heslo pre prihlasenie</h1>
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Pouzivatelske meno(login): </label>
            <input  class="form-control" type="text" name="login">
            <?php if (isset($data['err']['login'])) {?>
                <div><?= $data['err']['login'] ?></div>
            <?php } ?>
        </div>
        <div class="form-group">
            <label>Heslo: </label>
            <input type="password" class="form-control" name="heslo">
            <?php if (isset($data['err']['heslo'])) {?>
                <div><?= $data['err']['heslo'] ?></div>
            <?php } ?>
        </div>
        <button type="submit" class="btn btn-primary">Prihlasit</button>
    </form>
</div>



