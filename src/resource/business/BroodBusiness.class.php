<?php

namespace Brood\Business;
use Brood\Data\BroodDAO;
require_once('src/resource/data/BroodDAO.class.php');

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