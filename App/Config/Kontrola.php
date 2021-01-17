<?php


namespace App\Config;


use App\Models\Pouzivatel;

abstract class Kontrola
{
    abstract function prihlasit(Pouzivatel $user);

    abstract function odhlasit();

    abstract function getPouzivatel() : Pouzivatel;

    abstract function jePrihlaseny() : bool;

    abstract function jeSpravca() : bool;
}