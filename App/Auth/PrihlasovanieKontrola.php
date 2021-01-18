<?php

namespace App\Auth;

use App\Core\AKontrola;
use App\Models\Pouzivatel;

/**
 * Class PrihlasovanieKontrola
 * @package App\Auth
 */
class PrihlasovanieKontrola extends AKontrola
{
    public function __construct()
    {
        session_start();
    }

    function prihlasit($pouzivatel)
    {
        $_SESSION['user'] = $pouzivatel;
    }

    function odhlasit()
    {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
            session_destroy();
        }
    }

    function getPouzivatel(): Pouzivatel
    {
        return $_SESSION['user'];
    }

    function jePrihlaseny()
    {
        return isset($_SESSION['user']) && $_SESSION['user'] != null;
    }

    function jeSpravca() {
        return $this->jePrihlaseny() && $_SESSION['user']->getJeSpravca();
    }
}