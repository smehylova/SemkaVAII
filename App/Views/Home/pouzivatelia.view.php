<?php
?>

<div class="nadpis">Zoznam registrovanych pouzivatelov</div>

<pre>
    <div class="tabulka">
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Meno</th>
            <th scope="col">Priezvisko</th>
            <th scope="col">Login</th>
            <th scope="col">Email</th>
            <th scope="col">telefon</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        $pouzivatelia = App\Models\Pouzivatel::getAll();
        foreach ($pouzivatelia as $pouzivatel) {
            $i++; ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $pouzivatel->getMeno(); ?></td>
                <td><?= $pouzivatel->getPriezvisko(); ?></td>
                <td><?= $pouzivatel->getLogin(); ?></td>
                <td><?= $pouzivatel->getEmail(); ?></td>
                <td><?= $pouzivatel->getTelefon(); ?></td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
</pre>
