<div class="container">
    <h1>Ziadosti o kontakt</h1>
    <a href="?c=Ziadost&a=Add" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Pridat ziadost</a>

    <table>
        <thead>
        <tr>
            <th style="width: 100px">Meno</th>
            <th style="width: 100px">Priezvisko</th>
            <th style="width: 100px">Telefon</th>
            <th style="width: 100px">Email</th>
            <th style="width: 100px">Poziadavka</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php /** @var App\Models\Ziadost[] $data */
        foreach ($data as $ziadost) { ?>
            <tr>
                <td><?= $ziadost->getMeno() ?></td>
                <td><?= $ziadost->getPriezvisko() ?></td>
                <td><?= $ziadost->getTelefon() ?></td>
                <td><?= $ziadost->getEmail() ?></td>
                <td><?= $ziadost->getPoziadavka() ?></td>
                <td><a class="btn btn-outline-primary" href="?c=Ziadost&a=Add&id=<?= $ziadost->getId() ?>">Edit</a></td>
                <td><a class="btn btn-outline-danger" href="?c=blog&a=delete&id=<?= $ziadost->getId() ?>">Zmazat</a></td>
            </tr>

        <?php } ?>

        </tbody>
    </table>




</div>
