<?php


namespace App\Controllers;


use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Pouzivatel;

class PrihlasovanieController extends AControllerBase
{

    public function index()
    {
        if (!isset($_POST['login']) && !isset($_POST['heslo'])) return $this->html();

        $errors = [];
        $data = Pouzivatel::getAll();
        foreach ($data as $pouzivatel) {
            if ($pouzivatel->getLogin() == $_POST['login']) {
                $heslo = password_hash($_POST['heslo'], PASSWORD_DEFAULT);
                if (password_verify($pouzivatel->getHeslo(), $heslo)) {
                    $this->app->getKontrola()->prihlasit($pouzivatel);
                    $this->redirectToIndex("Home");
                    return $this->html();
                } else {
                    $errors = "Nespravne zadane heslo!";
                    $validacia = $errors != [] ? [ 'heslo' => $errors ]: null;
                    return $this->html(['err' => $validacia,], 'index');
                }
            }
        }

        $errors = "Nespravne pouzivatelske meno!";


        $validacia = $errors != [] ? [ 'login' => $errors ]: null;

        return $this->html(['err' => $validacia,], 'index');
    }

    public function registracia()
    {
        $val = null;

        if (!isset($_POST['login']) || !isset($_POST['heslo']) || !isset($_POST['hesloDva'])) return $this->html([], 'registracia');

        $novy = new Pouzivatel($_POST['meno'], $_POST['priezvisko'], $_POST['login'], $_POST['heslo'], $_POST['email'], $_POST['telefon']);
        //$val = $this->validate($_POST['otazka'], $_POST['odpoved']);

        if (sizeof($val['otazka']) == 0) {
            $novy->save();

            $this->redirectToIndex("Prihlasovanie");
        }

        return $this->html(['model' => $novy, 'err' => $val], 'registracia');
    }

    public function redirectToIndex($ciel)
    {
        header("Location: http://localhost/VAIISemka?c=$ciel");
        die();
    }
}