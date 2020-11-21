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
        if (!isset($_POST['telefon']) || !isset($_POST['email'])) return null;

        $novy = new Ziadost($_POST['meno'], $_POST['priezvisko'], $_POST['telefon'], $_POST['email'], $_POST['poziadavka']);
        $novy->save();

        $this->redirectToIndex();
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
        $titleErrors = [];
        if (strlen($title) < 3)
        {
            $titleErrors[] = "Nazov je moc kratky (min. 3 chars)";
        }
        if (is_numeric($title[0]))
        {
            $titleErrors[] = "Nazov nesmie zacinat cislom";
        }

        $textErrors = [];
        if (strlen($text) < 20)
        {
            $textErrors[] = "Text je moc kratky (min. 20 chars)";
        }

        return count($titleErrors) > 0 || count($textErrors) > 0 ? [ 'title' => $titleErrors, 'text' => $textErrors] : null;



    }

    public function redirectToIndex()
    {
        header("Location: http://localhost/VAIISem2Checkpoint?c=Ziadost");
        die();
    }
}