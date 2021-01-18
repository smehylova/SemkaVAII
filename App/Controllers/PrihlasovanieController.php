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
                if (password_verify($_POST['heslo'], $pouzivatel->getHeslo())) {
                    $this->app->getAuth()->login($_POST['login'], $_POST['heslo']);
                    $this->redirectToIndex("Home");
                    return $this->html();
                } else {
                    $errors = "Nespravne zadane heslo!";
                    $validacia = $errors != [] ? [ 'heslo' => $errors ]: null;
                    return $this->html(['err' => $validacia], 'index');
                }
            }
        }

        $errors = "Nespravne pouzivatelske meno!";


        $validacia = $errors != [] ? [ 'login' => $errors ]: null;

        return $this->html(['err' => $validacia], 'index');
    }

    public function registracia()
    {
        $val = null;

        if (!isset($_POST['login']) || !isset($_POST['heslo']) || !isset($_POST['hesloDva'])) return $this->html([], 'registracia');
        $heslo = password_hash($_POST['heslo'], PASSWORD_DEFAULT);
        $novy = new Pouzivatel($_POST['meno'], $_POST['priezvisko'], $_POST['login'], $heslo, $_POST['email'], $_POST['telefon']);
        $val = $this->validate($_POST['meno'], $_POST['priezvisko'], $_POST['login'], $_POST['heslo'], $_POST['hesloDva'], $_POST['telefon']);

        if (sizeof($val) == null) {
            $novy->save();

            $this->redirectToIndex("Prihlasovanie");
        }

        return $this->html(['model' => $novy, 'err' => $val], 'Registracia');
    }

    public function odhlasit()
    {
        $this->app->getAuth()->odhlasit();
        $this->redirectToIndex("Home");
    }

    public function validate($meno, $priezvisko, $login, $heslo1, $heslo2, $telefon)
    {
        $menoErrors = [];
        for ($i = 0; $i < strlen($meno); $i++) {
            if ($meno[$i] >= 0 && $meno[$i] <= 9) {
                $menoErrors = "Meno nesmie obsahovat cislice.";
            }
        }

        $priezviskoErrors = [];
        for ($i = 0; $i < strlen($priezvisko); $i++) {
            if ($priezvisko[$i] >= 0 && $priezvisko[$i] <= 9) {
                $priezviskoErrors = "Meno nesmie obsahovat cislice.";
            }
        }

        $loginErrors = [];
        $loginy = Pouzivatel::getAll("login = ?", [$login]);
        if (count($loginy) > 0) {
            $loginErrors = "Pouzivatelske meno uz existuje.";
        }

        $hesloErrors = [];
        if ($heslo1 != $heslo2) {
            $hesloErrors = "Nezadali ste rovnake heslo";
        }

        $telefonErrors = [];
        if (strlen($telefon) != 10) {
            $telefonErrors = "Cislo musi obsahovat 10 cislic";
        }

        return ($menoErrors != [] && $priezviskoErrors != [] && $loginErrors != [] && $hesloErrors != [] && $telefonErrors != []) ? [ 'meno' => $menoErrors, 'priezvisko' => $priezviskoErrors, 'login' => $loginErrors, 'heslo' => $hesloErrors, 'telefon' => $telefonErrors ] : null;
    }

    public function redirectToIndex($ciel)
    {
        header("Location: http://localhost/SemkaVAII?c=$ciel");
        die();
    }
}