<?php

require_once("lib/Twig/Autoloader.php");

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem("src/resource/presentation");
$twig = new Twig_Environment($loader);
$view = $twig->render("brood.twig");
print($view);