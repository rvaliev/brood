<?php

namespace src\ProjectBrood\business;
use src\ProjectBrood\data\BroodDAO;

class BroodBusiness
{
    private $broodDAO;
    private $lijst;

    public function overzichtBrood()
    {
        $this->broodDAO = new BroodDAO();
        $this->lijst = $this->broodDAO->getAll();
        return $this->lijst;
    }
}