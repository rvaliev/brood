<?php


include_once('src/resource/business/BroodBusiness.class.php');
use Brood\Business\BroodBusiness;

$obj = new BroodBusiness();

echo "<pre>";
print_r($x = $obj->overzichtBrood());
foreach ($x as $y) {
    print_r($y->getId());
}

echo "</pre>";