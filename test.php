<?php

/*
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

echo "</pre>";*/

session_start();
if (empty($_SESSION['ctr']))
{
    $_SESSION['ctr'] = 0;
}


$_SESSION['bestell'] = array($_SESSION['ctr'] => array(
    'productCounter' => 0,
    array('broodNummer' => 1)

));


$_SESSION['ctr']++;




echo "<pre>";
print_r($_SESSION['bestell']);
echo "</pre>";
