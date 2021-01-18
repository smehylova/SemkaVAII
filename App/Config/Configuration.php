<?php

namespace App\Config;

use App\Auth\PrihlasovanieKontrola;

/**
 * Class Configuration
 * Main configuration for the application
 * @package App\Config
 */
class Configuration
{
    public const APP_NAME = 'COPY SERVIS';

    public const DB_HOST = 'localhost';
    public const DB_NAME = 'semestralka';
    public const DB_USER = 'root';
    public const DB_PASS = 'dtb456';

    public const LOGIN_URL = '?c=Prihlasovanie';

    public const ROOT_LAYOUT = 'root.layout.view.php';

    public const DEBUG_QUERY = false;

    public const AUTH_CLASS = PrihlasovanieKontrola::class;
}