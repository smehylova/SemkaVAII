<?php

namespace App\Models;


use App\Core\Model;

class Ziadost extends Model
{
    protected $id;
    protected $meno;
    protected $priezvisko;
    protected $telefon;
    protected $email;
    protected $poziadavka;

    /**
     * Article constructor.
     * @param $meno
     * @param $priezvisko
     */
    public function __construct($meno = "", $priezvisko = "", $telefon = "", $email = "", $poziadavka = "")
    {
        $this->meno = $meno;
        $this->priezvisko = $priezvisko;
        $this->telefon = $telefon;
        $this->email = $email;
        $this->poziadavka = $poziadavka;
    }

    static public function setDbColumns()
    {
        return ['id', 'meno', 'priezvisko', 'telefon', 'email', 'poziadavka'];
    }

    static public function setTableName()
    {
        return "ziadosti";
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
    public function getMeno()
    {
        return $this->meno;
    }

    /**
     * @param mixed|string $meno
     */
    public function setMeno($meno): void
    {
        $this->meno = $meno;
    }

    /**
     * @return mixed|string
     */
    public function getPriezvisko()
    {
        return $this->priezvisko;
    }

    /**
     * @param mixed|string $priezvisko
     */
    public function setPriezvisko($priezvisko): void
    {
        $this->priezvisko = $priezvisko;
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
    public function getPoziadavka()
    {
        return $this->poziadavka;
    }

    /**
     * @param mixed|string $poziadavka
     */
    public function setPoziadavka($poziadavka): void
    {
        $this->poziadavka = $poziadavka;
    }
}