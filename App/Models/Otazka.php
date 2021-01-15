<?php


namespace App\Models;


use App\Core\Model;

class Otazka extends Model
{
    protected $id;
    protected $otazka;
    protected $odpoved;
    protected $pytajuci_id;

    public function __construct($otazka = "", $odpoved = "", $pytajuci_id = "")
    {
        $this->otazka = $otazka;
        $this->odpoved = $odpoved;
        $this->pytajuci_id = $pytajuci_id;
    }

    static public function setDbColumns()
    {
        return ['id', 'otazka', 'odpoved', 'pytajuci_id'];
    }

    static public function setTableName()
    {
        return "otazky";
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
    public function getOtazka()
    {
        return $this->otazka;
    }

    /**
     * @param mixed|string $otazka
     */
    public function setOtazka($otazka): void
    {
        $this->otazka = $otazka;
    }

    /**
     * @return mixed|string
     */
    public function getOdpoved()
    {
        return $this->odpoved;
    }

    /**
     * @param mixed|string $odpoved
     */
    public function setOdpoved($odpoved): void
    {
        $this->odpoved = $odpoved;
    }

    /**
     * @return mixed|string
     */
    public function getPytajuciId()
    {
        return $this->pytajuci_id;
    }

    /**
     * @param mixed|string $pytajuci_id
     */
    public function setPytajuciId($pytajuci_id): void
    {
        $this->pytajuci_id = $pytajuci_id;
    }
}