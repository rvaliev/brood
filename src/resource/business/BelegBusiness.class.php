<?php

namespace Brood\Business;
use Brood\Data\BelegDAO;
require_once('src/resource/data/BelegDAO.class.php');

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
}