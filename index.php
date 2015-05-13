<?php

use src\ProjectBrood\business\BroodBusiness;
use Doctrine\Common\ClassLoader;


require_once'Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader("src");
$classLoader->register();




$obj = new BroodBusiness();
$broden = $obj->overzichtBrood();


require_once("lib/Twig/Autoloader.php");
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("src/ProjectBrood/presentation");
$twig = new Twig_Environment($loader);
$view = $twig->render("brood.twig", array("broden" => $broden));
print($view);


