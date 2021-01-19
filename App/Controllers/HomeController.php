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

    public function udaje()
    {
        if ($this->app->getAuth()->jePrihlaseny()) {
            return $this->html([], 'udaje');
        }
        $this->redirectToIndex("Prihlasovanie");
    }

    public function pouzivatelia()
    {
        if ($this->app->getAuth()->jePrihlaseny() && $this->app->getAuth()->jeSpravca()) {
            return $this->html([], 'pouzivatelia');
        }
        $this->redirectToIndex("Prihlasovanie");
    }

    public function redirectToIndex($ciel)
    {
        header("Location: http://localhost/SemkaVAII?c=$ciel");
        die();
    }

}