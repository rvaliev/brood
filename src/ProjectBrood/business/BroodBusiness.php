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

    public function overzichtBroodById($brood_id)
    {
        $this->broodDAO = new BroodDAO();
        $this->lijst = $this->broodDAO->getAllById($brood_id);
        return $this->lijst;
    }
}