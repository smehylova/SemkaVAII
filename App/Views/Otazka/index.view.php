<div class="container">
    <h1>Otazky a odpovede</h1>
    <a href="?c=Ziadost&a=Add" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Pridat ziadost</a>
    <br>
    <br>
    <form class="row">
    <?php /** @var App\Models\Otazka[] $data */
    foreach ($data as $otazka) { ?>
        <div style="background: powderblue" class="card col-sm-4">
            <br>
            <h3><?= $otazka->getOtazka() ?></h3>
            <div><?= $otazka->getOdpoved() ?></div>
            <td><a class="btn btn-outline-primary" href="?c=Ziadost&a=edit&id=<?= $otazka->getId() ?>">Edit</a></td>
            <td><a class="btn btn-outline-danger" href="?c=Ziadost&a=delete&id=<?= $otazka->getId() ?>">Zmazat</a></td>

            <br>
        </div>
    <?php } ?>
    </form>




</div>

