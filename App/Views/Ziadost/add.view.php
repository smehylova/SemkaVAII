<div class="container">
    <h1>Pridanie novej poziadavky</h1>
</div>


<?php /** @var \App\Models\Ziadost $data */ ?>
<div class="container">
    <form method="post">
        <?php if (!empty($data['model'])) { ?>
            <input type="hidden" value="<?= $data['model']->getId() ?>" name="id">
        <?php } ?>

        <h4>Meno: </h4>
        <input class="form-control" placeholder="Meno" type="text" name="meno" value="<?= ( !empty($data['model']) ? $data['model']->getMeno() : "") ?>" required>
        <br>
        <div class="chyba">
        <?php if (isset($data['err']['meno'])) {
            foreach ($data['err']['meno'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>
        </div>

        <h4>Priezvisko: </h4>
        <input class="form-control" placeholder="Priezvisko" type="text" name="priezvisko" value="<?= ( !empty($data['model']) ? $data['model']->getPriezvisko() : "") ?>" required>
        <br>
        <div class="chyba">
        <?php if (isset($data['err']['priezvisko'])) {
            foreach ($data['err']['priezvisko'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>
        </div>

        <h4>Telefonne cislo: </h4>
        <input class="form-control" placeholder="Telefon" type="text" name="telefon" value="<?= ( !empty($data['model']) ? $data['model']->getTelefon() : "") ?>">
        <br>
        <div class="chyba">
        <?php if (isset($data['err']['telefon'])) {
            foreach ($data['err']['telefon'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>
        </div>

        <h4>Emailova adresa: </h4>
        <input class="form-control" placeholder="Email" type="text" name="email" value="<?= ( !empty($data['model']) ? $data['model']->getEmail() : "") ?>">
        <br>
        <div class="chyba">
        <?php if (isset($data['err']['email'])) {
            foreach ($data['err']['email'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>
        </div>

        <h4>Poziadavka: </h4>
        <textarea class="form-control" placeholder="Miesto pre vasu poziadavku" name="poziadavka" required><?= ( !empty($data['model']) ? $data['model']->getPoziadavka() : "") ?></textarea>
        <div class="chyba">
        <?php if (isset($data['err']['poziadavka'])) {
            foreach ($data['err']['poziadavka'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>
        </div>
        <br>

        <div class="chyba">
        <?php if (isset($data['err']['errors'])) {
            foreach ($data['err']['errors'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>
        </div>
        <br>
        <input type="submit" value="Odoslat">
        <a href="?c=Ziadost" role="button">Zrusit pridavanie</a>


    </form>
</div>