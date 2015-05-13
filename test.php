<?php


use src\ProjectBrood\business\BroodBusiness;
use Doctrine\Common\ClassLoader;


require_once'Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader("src");
$classLoader->register();




$obj = new BroodBusiness();

echo "<pre>";
print_r($x = $obj->overzichtBrood());
foreach ($x as $y) {
    print_r($y->getId());
}

echo "</pre>";