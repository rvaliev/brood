<?php

ob_start();
session_start();
require('head.php');
use src\ProjectBrood\business\BelegBusiness;
use Doctrine\Common\ClassLoader;

/**
 * Check if 'id' is not emoty.
 * If not, load Twig etc..
 * Else redirect to index.php
 */

/**
 * todo: controle van broodje ID toevoegen, zodat bij een verkeerde ID naar index.php verwezen wordt.
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
    $view = $twig->render("beleg.twig", array("self" => $_SERVER['REQUEST_URI'], "belegen" => $belegen, "brood_id" => $_GET['id'], "authorized" => $_SESSION['user']['authorized']));
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

    if (empty($_SESSION['bestelling']))
    {
        $_SESSION['productCounter'] = 0;
        $_SESSION['bestelling'][0]['aantal'] = 1;
    }


    $_SESSION['keyExists'] = false;


    foreach ($_SESSION['bestelling'] as $bestKey => $bestRow)
    {
        if (array_key_exists($_POST['broodSoort'], $_SESSION['bestelling'][$bestKey]))
        {

            if ($_SESSION['bestelling'][$bestKey][$_POST['broodSoort']] == $_POST)
            {
                $_SESSION['keyExists'] = true;
                $_SESSION['broodNr'] = $bestKey;
            }
        }
    }


    if ($_SESSION['keyExists'] == true)
    {
        $_SESSION['bestelling'][$_SESSION['broodNr']]['aantal']++;
    }
    else
    {
        $_SESSION['bestelling'][$_SESSION['productCounter']][$_POST['broodSoort']] = $_POST;
        $_SESSION['bestelling'][$_SESSION['productCounter']]['aantal'] = 1;
        $_SESSION['productCounter']++;

    }


    header("Location: overzicht.php");
}



ob_flush();


