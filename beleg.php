<?php

use src\ProjectBrood\business\BelegBusiness;
use Doctrine\Common\ClassLoader;

/**
 * Check if 'id' is not emoty.
 * If not, load Twig etc..
 * Else redirect to index.php
 */
if (!empty($_GET['id']))
{
    /**
     * Connect with Doctrine.
     * Load ClassLoader to autoload classes.
     */
    require_once'Doctrine/Common/ClassLoader.php';
    $classLoader = new ClassLoader("src");
    $classLoader->register();

    /**
     * Create 'Beleg' object from BelegBusiness class.
     * Get all 'Beleg' records from database.
     */
    $obj = new BelegBusiness();
    $belegen = $obj->overzichtBeleg();


    /**
     * Connect to Twig.
     * Load beleg.twig file.
     * Send array $belegen and $_GET variable to beleg.twig.
     */
    require_once("lib/Twig/Autoloader.php");
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem("src/ProjectBrood/presentation");
    $twig = new Twig_Environment($loader);
    $view = $twig->render("beleg.twig", array("belegen" => $belegen, "brood_id" => $_GET['id']));
    print($view);
}
else
{
    header("Location: index.php");
}


/**
 * Check if 'Verder' button has been pressed.
 * If true, go to product overview.
 */
if ((isset($_POST['sendButton'])) && (!empty($_POST['broodSoort'])))
{

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

}


