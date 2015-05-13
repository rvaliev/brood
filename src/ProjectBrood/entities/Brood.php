<?php

namespace src\ProjectBrood\entities;


class Brood
{
    private $brood_id;
    private $brood_naam;
    private $brood_samenstelling;
    private $brood_prijs;
    private $brood_image;


    public function __construct($brood_id, $brood_naam, $brood_omschrijving, $brood_prijs, $brood_image)
    {
        $this->brood_id = $brood_id;
        $this->brood_naam = $brood_naam;
        $this->brood_samenstelling = $brood_omschrijving;
        $this->brood_prijs = $brood_prijs;
        $this->brood_image = $brood_image;
    }

    public function getId()
    {
        return $this->brood_id;
    }

    public function getNaam()
    {
        return $this->brood_naam;
    }

    public function getOmschrijving()
    {
        return $this->brood_samenstelling;
    }

    public function getPrijs()
    {
        return $this->brood_prijs;
    }

    public function getImage()
    {
        return $this->brood_image;
    }


}