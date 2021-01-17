<?php


namespace App\Config;


use App\Models\Pouzivatel;

class KontrolaPrihlasenia extends Kontrola
{

    public function __construct()
    {
        session_start();
    }

    public function prihlasit(Pouzivatel $user)
    {
        $_SESSION['pouzivatel'] = $user;
    }

    public function odhlasit()
    {
        unset($_SESSION['pouzivatel']);
        session_destroy();
    }

    public function getPouzivatel() : Pouzivatel
    {
        return $_SESSION['pouzivatel'];
    }

    public function jePrihlaseny() : bool
    {
        return isset($_SESSION['pouzivatel']) && $_SESSION['pouzivatel'] != null;
    }

    public function jeSpravca() : bool
    {
        return $this->jePrihlaseny() && $this->getPouzivatel()->getJeSpravca();
    }

}