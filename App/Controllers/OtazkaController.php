<?php


namespace App\Controllers;


use App\Core\AControllerBase;
use App\Models\Otazka;

class OtazkaController extends AControllerBase
{

    public function index()
    {
        return Otazka::getAll();
    }

    public function add()
    {
        $val = null;

        if (!isset($_POST['otazka']) || !isset($_POST['odpoved']) || !isset($_POST['pytajuci_id'])) return null;

        $novy = new Otazka($_POST['otazka'], $_POST['odpoved'], $_POST['pytajuci_id']);
        $val = $this->validate($_POST['otazka'], $_POST['odpoved']);

        if ($val == null) {
            $novy->save();

            $this->redirectToIndex();
        }

        return [
            'model' => $novy,
            'err' => $val,
        ];
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

            if ($val == null) {
                $novy->save();

                $this->redirectToIndex();
            }
        } else {
            $novy = Otazka::getOne($_GET['id']);
        }



        return [
            'model' => $novy,
            'err' => $val,
        ];


    }

    public function validate($otazka, $odpoved)
    {
        $otazkaErrors = [];
        $pom = false;
        if ($otazka[strlen($otazka) - 1] != '?') {
            $otazkaErrors[] = "Otazka musi obsahovat otazku s otaznikom. (?)";
        }
        if (strlen($otazka) < 10) {
            $otazkaErrors[] = "Otazka musi obsahovat minimalne 10 znakov.";
        }

        $odpovedErrors = [];


        return count($otazkaErrors) > 0 || count($odpovedErrors) > 0 ? [ 'otazka' => $otazkaErrors, 'odpoved' => $odpovedErrors ]: null;

    }

    public function redirectToIndex()
    {
        header("Location: http://localhost/VAIISem2Checkpoint?c=Otazka");
        die();
    }
}