<?php

namespace src\ProjectBrood\business;
use src\ProjectBrood\data\BestellingDAO;

class BestellingBusiness
{
    private $bestellingDAO;
    private $lijst;

    public function voegNieuwBestelling($totaalPrijs, $userId, $bestellingArray)
    {
        $this->bestellingDAO = new BestellingDAO();
        $this->lijst = $this->bestellingDAO->insertNewOrder($totaalPrijs, $userId, $bestellingArray);
        return $this->lijst;
    }
}
