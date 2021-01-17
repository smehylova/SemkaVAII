<?php


namespace App\Models;


use App\Core\Model;

class Pouzivatel extends Model
{
    protected $id;
    protected $meno;
    protected $priezvisko;
    protected $login;
    protected $heslo;
    protected $email;
    protected $telefon;
    protected $jeSpravca;

    public function __construct($meno = "", $priezvisko = "", $login = "", $heslo = "", $email = "", $telefon = "")
    {
        $this->meno = $meno;
        $this->priezvisko = $priezvisko;
        $this->login = $login;
        $this->heslo = $heslo;
        $this->email = $email;
        $this->telefon = $telefon;
        $this->jeSpravca = 0;
    }

    static public function setDbColumns()
    {
        return ['id', 'meno', 'priezvisko', 'login', 'heslo', 'email', 'telefon', 'jeSpravca'];
    }

    static public function setTableName()
    {
        return "pouzivatelia";
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed|string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed|string $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed|string
     */
    public function getHeslo()
    {
        return $this->heslo;
    }

    /**
     * @param mixed|string $heslo
     */
    public function setHeslo($heslo): void
    {
        $this->heslo = $heslo;
    }

    /**
     * @return mixed|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed|string $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed|string
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * @param mixed|string $telefon
     */
    public function setTelefon($telefon): void
    {
        $this->telefon = $telefon;
    }

    /**
     * @return mixed|string
     */
    public function getJeSpravca()
    {
        return $this->jeSpravca;
    }

    /**
     * @param mixed|string $jeSpravca
     */
    public function setJeSpravca($jeSpravca): void
    {
        $this->jeSpravca = $jeSpravca;
    }

    /**
     * @return mixed
     */
    public function getMeno()
    {
        return $this->meno;
    }

    /**
     * @param mixed $meno
     */
    public function setMeno($meno): void
    {
        $this->meno = $meno;
    }

    /**
     * @return mixed
     */
    public function getPriezvisko()
    {
        return $this->priezvisko;
    }

    /**
     * @param mixed $priezvisko
     */
    public function setPriezvisko($priezvisko): void
    {
        $this->priezvisko = $priezvisko;
    }
}