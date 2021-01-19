<?php


namespace App\Controllers;


use App\Core\AControllerBase;
use App\Models\Ziadost;

class ZiadostController extends AControllerBase
{
    public function index()
    {
        if ($this->app->getAuth()->jePrihlaseny() && $this->app->getAuth()->getPouzivatel()->getJeSpravca()) {
            return $this->html([Ziadost::getAll()], 'index');
        }
        $this->redirectToIndex("Prihlasovanie");
    }

    public function add()
    {
        $val = null;

        if (!isset($_POST['meno']) || !isset($_POST['priezvisko']) || !isset($_POST['poziadavka'])) return $this->html([], 'add');;

        $novy = new Ziadost($_POST['meno'], $_POST['priezvisko'], $_POST['telefon'], $_POST['email'], $_POST['poziadavka']);
        $val = $this->validate($_POST['meno'], $_POST['priezvisko'], $_POST['telefon'], $_POST['email'], $_POST['poziadavka']);

        if ($val == null) {
            $novy->save();

            $this->redirectToIndex("Ziadost");
        }

        return $this->html(['model' => $novy, 'err' => $val], 'add');
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $novy = Ziadost::getOne($_GET['id']);
            $novy->delete();
        }

        $this->redirectToIndex("Ziadost");
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

                $this->redirectToIndex("Ziadost");
            }
        } else {
            $novy = Ziadost::getOne($_GET['id']);
        }

        return $this->html(['model' => $novy, 'err' => $val], 'edit');
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
        if ($email != null)
        {
            $pom = false;
            $bodka = false;
            for ($i = 0; $i < strlen($email); $i++)
            {
                if ($email[$i] == "@") {
                    $pom = true;
                }
                if ($pom == true)
                {
                    if ($email[$i] == ".")
                    {
                        $bodka = true;
                    }
                }
            }
            if ($bodka == false) {
                $emailErrors[] = "Email musi mat tvar napriklad aa@gmail.com";
            }
        }

        $poziadavkaErrors = [];


        $errors = [];
        if ($telefon == null && $email == null) {
            $errors[] = "Treba zadat minimalne telefon alebo email.";
        }


        return count($menoErrors) > 0 || count($priezviskoErrors) > 0 || count($telefonErrors) > 0 || count($emailErrors) > 0 || count($poziadavkaErrors) > 0 || count($errors) > 0 ? [ 'meno' => $menoErrors, 'priezvisko' => $priezviskoErrors, 'telefon' => $telefonErrors, 'email' => $emailErrors, 'poziadavka' => $poziadavkaErrors, 'errors' => $errors ]: null;

    }

    public function ziadosti()
    {
        return $this->json(Ziadost::getAll());
    }

    public function redirectToIndex($ciel)
    {
        header("Location: http://localhost/SemkaVAII?c=$ciel");
        die();
    }
}