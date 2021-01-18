<?php

namespace App\Core;

use App\Models\Pouzivatel;

abstract class AKontrola
{
    protected static $instance;

    static public function getInstance(): AKontrola
    {

        if (AKontrola::$instance == null) {
            AKontrola::$instance = new static();
        }
        return AKontrola::$instance;
    }

    abstract function prihlasit($Pouzivatel);

    abstract function odhlasit();

    abstract function getPouzivatel(): Pouzivatel;

    abstract function jePrihlaseny();

    abstract function jeSpravca();

}