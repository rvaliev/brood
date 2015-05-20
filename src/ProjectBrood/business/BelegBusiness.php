<?php

namespace src\ProjectBrood\business;
use src\ProjectBrood\data\BelegDAO;

class BelegBusiness
{
    private $belegDAO;
    private $lijst;

    public function overzichtBeleg()
    {
        $this->belegDAO = new BelegDAO();
        $this->lijst = $this->belegDAO->getAll();
        return $this->lijst;
    }


    public function overzichtBelegById($beleg_id)
    {
        $this->belegDAO = new BelegDAO();
        $this->lijst = $this->belegDAO->getAllById($beleg_id);
        return $this->lijst;
    }
}