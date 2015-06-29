<?php


session_start();
use src\ProjectBrood\business\BestellingBusiness;
use Doctrine\Common\ClassLoader;
require('head.php'); // sets user authorization status


require_once'Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader("src");
$classLoader->register();



if ((empty($_SESSION['bestelling'])) || (!isset($_SESSION['bestelling'])))
{
    header('Location: index.php');
}

if (!empty($_SESSION['successMessage']))
{
    unset($_SESSION['bestelling']);
}



$_SESSION['successMessage'] = (!isset($_SESSION['successMessage']) ? '' : $_SESSION['successMessage']);

if (isset($_SESSION['user']))
{
    if ($_SESSION['user']['authorized'] == 1)
    {
        $bestellingStatus = true;
        if (isset($_SESSION['bestelling']))
        {
            /**
             * Als klant betaalt zijn bestelling
             */
            if (isset($_POST['betalenKnoop']))
            {
                $obj = new BestellingBusiness();
                $obj->voegNieuwBestelling($_SESSION['totaalBestellingPrijs'], $_SESSION['user']['userId'], $_SESSION['bestelling']);

                $_SESSION['successMessage'] = "Bedankt voor uw bestelling";

                $_SESSION['totaalBestellingPrijs'] = 0;

                header("Refresh: 0");
            }
        }

    }
    else
    {
        $bestellingStatus = false;
    }
}


require_once("lib/Twig/Autoloader.php");
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("src/ProjectBrood/presentation");
$twig = new Twig_Environment($loader);

$view = $twig->render("bestelling.twig", array("bestellingStatus" => $bestellingStatus, "authorized" => $_SESSION['user']['authorized'], "totaalBestellingPrijs" => $_SESSION['totaalBestellingPrijs'], "successMessage" => $_SESSION['successMessage']));
print($view);


if (!isset($_SESSION['bestelling']) && !empty($_SESSION['successMessage']))
{
    $_SESSION['successMessage'] = '';
}
