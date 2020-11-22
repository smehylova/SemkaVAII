<?php


namespace App\Controllers;


use App\Core\AControllerBase;
use App\Models\Ziadost;

class ZiadostController extends AControllerBase
{



    public function index()
    {
        return Ziadost::getAll();
    }

    public function add()
    {
        $val = null;

        if (!isset($_POST['telefon']) || !isset($_POST['email'])) return null;

        $novy = new Ziadost($_POST['meno'], $_POST['priezvisko'], $_POST['telefon'], $_POST['email'], $_POST['poziadavka']);
        $val = $this->validate($_POST['meno'], $_POST['priezvisko'], $_POST['telefon'], $_POST['email'], $_POST['poziadavka']);

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
            $novy = Ziadost::getOne($_GET['id']);
            $novy->delete();
        }

        $this->redirectToIndex();
    }

    public function edit()
    {
        $val = null;
        if (isset($_POST['id'])) {
            $val = $this->validate($_POST['meno'], $_POST['priezvisko'], $_POST['telefon'], $_POST['email'], $_POST['poziadavka']);
            $novy = Ziadost::getOne($_POST['id']);
            $novy->setMeno($_POST['meno']);
            $novy->setPriezvisko($_POST['priezvisko']);
            $novy->setTelefon($_POST['telefon']);
            $novy->setEmail($_POST['email']);
            $novy->setPoziadavka($_POST['poziadavka']);

            if ($val == null) {
                $novy->save();

                $this->redirectToIndex();
            }
        } else {
            $novy = Ziadost::getOne($_GET['id']);
        }



        return [
            'model' => $novy,
            'err' => $val,
        ];


    }

    public function validate($meno, $priezvisko, $telefon, $email, $poziadavka)
    {
        $menoErrors = [];
        $pom = false;
        for ($i = 0; $i < strlen($meno); $i++)
        {
            if (is_numeric($meno[$i])) {
                $pom = true;
            }
        }
        if ($pom == true) {
            $menoErrors[] = "Meno nemoze obsahovat cisla.";
        }

        $priezviskoErrors = [];
        $pom = false;
        for ($i = 0; $i < strlen($priezvisko); $i++)
        {
            if (is_numeric($priezvisko[$i])) {
                $pom = true;
            }
        }
        if ($pom == true) {
            $priezviskoErrors[] = "Priezvisko nemoze obsahovat cisla.";
        }

        $telefonErrors = [];
        if ($telefon != null)
        {
            if (strlen($telefon) != 10)
            {
                $telefonErrors[] = "Telefonne cislo musi obsahovat presne 10 cislic";
            }
            if (!is_numeric($telefon))
            {
                $telefonErrors[] = "Telefonne cislo musi obsahovat iba cislice";
            }
        }

        $emailErrors = [];


        $poziadavkaErrors = [];


        $errors = [];
        if ($telefon == null && $email == null) {
            $errors[] = "Treba zadat minimalne telefon alebo email.";
        }


        return count($menoErrors) > 0 || count($priezviskoErrors) > 0 || count($telefonErrors) > 0 || count($emailErrors) > 0 || count($poziadavkaErrors) > 0 || count($errors) > 0 ? [ 'meno' => $menoErrors, 'priezvisko' => $priezviskoErrors, 'telefon' => $telefonErrors, 'email' => $emailErrors, 'poziadavka' => $poziadavkaErrors, 'errors' => $errors ]: null;

    }

    public function redirectToIndex()
    {
        header("Location: http://localhost/VAIISem2Checkpoint?c=Ziadost");
        die();
    }
}