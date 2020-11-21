<div class="container">
    <h1>Pridanie noveho clanku</h1>
</div>


<?php /** @var \App\Models\Ziadost $data */ ?>
<div class="container">
    <form method="post">
        <?php if (!empty($data['model'])) { ?>
            <input type="hidden" value="<?= $data['model']->getId() ?>" name="id">
        <?php } ?>

        <input placeholder="Meno" type="text" name="meno" value="<?= ( !empty($data['model']) ? $data['model']->getMeno() : "") ?>">
        <br>
        <?php if (isset($data['err']['meno'])) {
            foreach ($data['err']['meno'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>

        <input placeholder="Priezvisko" type="text" name="priezvisko" value="<?= ( !empty($data['model']) ? $data['model']->getPriezvisko() : "") ?>">
        <br>
        <?php if (isset($data['err']['priezvisko'])) {
            foreach ($data['err']['priezvisko'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>

        <input placeholder="Telefonne cislo" type="text" name="telefon" value="<?= ( !empty($data['model']) ? $data['model']->getTelefon() : "") ?>">
        <br>
        <?php if (isset($data['err']['telefon'])) {
            foreach ($data['err']['telefon'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>

        <input placeholder="Emailova adresa" type="text" name="email" value="<?= ( !empty($data['model']) ? $data['model']->getEmail() : "") ?>">
        <br>
        <?php if (isset($data['err']['email'])) {
            foreach ($data['err']['email'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>

        <textarea placeholder="Miesto pre vasu poziadavku" name="poziadavka"><?= ( !empty($data['model']) ? $data['model']->getPoziadavka() : "") ?></textarea>

        <?php if (isset($data['err']['poziadavka'])) {
            foreach ($data['err']['poziadavka'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>
        <br>
        <input type="submit" value="Odoslat">


    </form>
</div>