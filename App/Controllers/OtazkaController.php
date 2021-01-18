<?php


namespace App\Controllers;


use App\Core\AControllerBase;
use App\Models\Otazka;

class OtazkaController extends AControllerBase
{
    public function authorize($action)
    {
        return $this->app->getAuth()->jePrihlaseny();
    }

    public function index()
    {
        return $this->html(Otazka::getAll(), 'index');
    }

    public function add()
    {
        $val = null;

        if (!isset($_POST['otazka'])) return $this->html([], 'add');

        $novy = new Otazka($_POST['otazka'], $_POST['odpoved'], $this->app->getAuth()->getLoggedUser()->getId());
        $val = $this->validate($_POST['otazka'], $_POST['odpoved']);

        if (sizeof($val['otazka']) == 0) {
            $novy->save();

            $this->redirectToIndex();
        }

        return $this->html(['model' => $novy, 'err' => $val], 'add');
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $novy = Otazka::getOne($_GET['id']);
            $novy->delete();
        }

        $this->redirectToIndex();
    }

    public function edit()
    {
        $val = null;
        if (isset($_POST['id'])) {
            $val = $this->validate($_POST['otazka'], $_POST['odpoved']);
            $novy = Otazka::getOne($_POST['id']);
            $novy->setOtazka($_POST['otazka']);
            $novy->setOdpoved($_POST['odpoved']);

            if (sizeof($val['otazka']) == 0) {
                $novy->save();

                $this->redirectToIndex();
            }
        } else {
            $novy = Otazka::getOne($_GET['id']);
        }

        return $this->html(['model' => $novy, 'err' => $val], 'edit');
    }

    public function validate($otazka, $odpoved)
    {
        $otazkaErrors = [];
        if ($otazka[strlen($otazka) - 1] != '?') {
            $otazkaErrors[] = "Otazka musi obsahovat otazku s otaznikom. (?)";
        }
        if (strlen($otazka) < 10) {
            $otazkaErrors[] = "Otazka musi obsahovat minimalne 10 znakov.";
        }

        return (count($otazkaErrors) != []) ? [ 'otazka' => $otazkaErrors ] : null;
    }

    public function redirectToIndex()
    {
        header("Location: http://localhost/SemkaVAII?c=Otazka");
        die();
    }
}