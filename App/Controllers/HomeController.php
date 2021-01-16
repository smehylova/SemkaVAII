<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Pouzivatel;

class HomeController extends AControllerBase
{

    public function index()
    {
        return $this->html([], 'index');
    }

    public function kontakt()
    {
        return $this->html([], 'kontakt');
    }

    public function onas()
    {
        return $this->html([], 'onas');
    }

    public function prihlasenie()
    {
        if (!isset($_POST['login']) && !isset($_POST['heslo'])) return $this->html();

        $errors = [];
        $data = Pouzivatel::getAll();
        foreach ($data as $pouzivatel) {
            if ($pouzivatel->getLogin() == $_POST['login']) {
                if ($pouzivatel->getHeslo() == $_POST['heslo']) {
                    $this->redirectToIndex();
                    return $this->html();
                } else {
                    $errors = "Nespravne zadane heslo!";
                    $validacia = $errors != [] ? [ 'heslo' => $errors ]: null;
                    return $this->html(['err' => $validacia,], );
                }
            }
        }

        $errors = "Nespravne pouzivatelske meno!";


        $validacia = $errors != [] ? [ 'login' => $errors ]: null;

        return $this->html(['err' => $validacia,], );
    }

    public function redirectToIndex()
    {
        header("Location: http://localhost/VAIISem2Checkpoint?c=Home");
        die();
    }

}