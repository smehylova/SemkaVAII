<div class="container">
    <h1>Editacia otazky</h1>
</div>



<?php /** @var \App\Models\Otazka $data */ ?>
<div class="container">
    <form method="post">
        <?php if (!empty($data['model'])) { ?>
            <input type="hidden" value="<?= $data['model']->getId() ?>" name="id">
        <?php } ?>

        <h4>Otazka: </h4>
        <input class="form-control" placeholder="Otazka" type="text" name="otazka" value="<?= ( !empty($data['model']) ? $data['model']->getOtazka() : "") ?>" required>
        <br>
        <?php if (isset($data['err']['otazka'])) {
            foreach ($data['err']['otazka'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>

        <h4>Odpoved: </h4>
        <input class="form-control" placeholder="Odpoved" type="text" name="odpoved" value="<?= ( !empty($data['model']) ? $data['model']->getOdpoved() : "") ?>" required>
        <br>
        <?php if (isset($data['err']['odpoved'])) {
            foreach ($data['err']['odpoved'] as $err) { ?>
                <div><?= $err ?></div>
            <?php } ?>
        <?php } ?>
        <br>
        <input type="submit" value="Odoslat">
        <a href="?c=Otazka" role="button">Zrusit editovanie</a>


    </form>
</div>