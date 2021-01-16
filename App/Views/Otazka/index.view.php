<div class="container">
    <h1>Otazky a odpovede</h1>
    <a href="?c=Otazka&a=Add" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Pridat otazku</a>
    <br>
    <br>
    <form class="row">
    <?php /** @var App\Models\Otazka[] $data */
    foreach ($data as $otazka) { ?>
        <div class="card col-sm-4">
            <br>
            <h3><?= $otazka->getOtazka() ?></h3>
            <div><?= $otazka->getOdpoved() ?></div>
            <td><a class="col-10 btnEdit btn btn-outline-primary" href="?c=Otazka&a=edit&id=<?= $otazka->getId() ?>">Edit</a></td>
            <td><a class="col-10 btnZmaz btn btn-outline-danger" href="?c=Otazka&a=delete&id=<?= $otazka->getId() ?>">Zmazat</a></td>
        </div>
    <?php } ?>
    </form>




</div>

