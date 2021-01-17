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

}