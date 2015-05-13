<?php

namespace Brood\Entities;


class Beleg
{
    private $beleg_id;
    private $beleg_naam;
    private $beleg_omschrijving;
    private $beleg_prijs;
    private $beleg_image;


    public function __construct($beleg_id, $beleg_naam, $beleg_omschrijving, $beleg_prijs, $beleg_image)
    {
        $this->beleg_id = $beleg_id;
        $this->beleg_naam = $beleg_naam;
        $this->beleg_omschrijving = $beleg_omschrijving;
        $this->beleg_prijs = $beleg_prijs;
        $this->beleg_image = $beleg_image;
    }

    public function getId()
    {
        return $this->beleg_id;
    }

    public function getNaam()
    {
        return $this->beleg_naam;
    }

    public function getOmschrijving()
    {
        return $this->beleg_omschrijving;
    }

    public function getPrijs()
    {
        return $this->beleg_prijs;
    }

    public function getImage()
    {
        return $this->beleg_image;
    }


}