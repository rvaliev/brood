<?php

ob_start();

use src\ProjectBrood\business\BelegBusiness;
use src\ProjectBrood\business\BroodBusiness;
use Doctrine\Common\ClassLoader;

session_start();
require('head.php');
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

$totaalBestellingPrijs = 0;
if (!empty($_SESSION['bestelling']))
{
    $totaalBestellingPrijs = 0;

    foreach ($_SESSION['bestelling'] as $key => $bestelling)
    {
        /**
         * Array where all orders are stored
         */
        $overzicht[$key]['aantal'] = $bestelling['aantal'];

        foreach ($bestelling as $bestelKey => $bestelRegel)
        {

            /**
             * Getting 'Brood' list
             */
            if (is_int($bestelKey))
            {
                $overzicht[$key]['broodsoort'] = $bestelKey;

                $objBrood = new BroodBusiness();
//                $bestelKey++;
                $broden = $objBrood->overzichtBroodById($bestelKey);

                $overzicht[$key]['brood_id'] = $broden->getId();
                $overzicht[$key]['brood_naam'] = $broden->getNaam();
                $overzicht[$key]['brood_prijs'] = $broden->getPrijs();
                $overzicht[$key]['brood_image'] = $broden->getImage();
                $overzicht[$key]['totaalBroodPrijs'] = $_SESSION['bestelling'][$key][$broden->getId()]['broodPrijs'];



//                echo "<pre>";
//                print_r($_SESSION['bestelling'][$key][$bestelKey]);
//                echo "</pre>";
            }


            /**
             * Getting 'Beleg' list
             */
            if (is_array($bestelRegel))
            {
                $totPrijs[$key] = 0;
                foreach ($bestelRegel as $belegKey => $belegRegel)
                {
                    if (is_int($belegKey))
                    {
                        $objBeleg = new BelegBusiness();
                        $belegen = $objBeleg->overzichtBelegById($belegKey);
                        $eenBeleg = $belegen[0];
                        $overzicht[$key]['beleg'][] = $eenBeleg->getNaam();


                        $totPrijs[$key] = $totPrijs[$key] + $_SESSION['bestelling'][$key][$bestelKey][$belegKey];


//                        $_SESSION['bestelling'][$key][$bestelKey]['broodPrijs'] = $_SESSION['bestelling'][$key][$bestelKey]['broodPrijs'] + $_SESSION['bestelling'][$key][$bestelKey][$belegKey];


                    }

                    unset($_SESSION['bestelling'][$key][$bestelKey]['sendButton']); // Removes 'sendButton' from session array

                }

                $_SESSION['bestelling'][$key]['sandwichPrijs'] = $totPrijs[$key] + $overzicht[$key]['brood_prijs'];
                $totaalBestellingPrijs = ($_SESSION['bestelling'][$key]['sandwichPrijs'] * $_SESSION['bestelling'][$key]['aantal']) + $totaalBestellingPrijs;
                $overzicht[$key]['sandwichPrijs'] = $_SESSION['bestelling'][$key]['sandwichPrijs'];


            }
        }
    }
}
else
{
    $overzicht = array();
}


/**
 * Foutmelding als gekozen aantal broodjes is < 1
 * In begin foutmelding op 0 zetten
 */

if (!isset($_SESSION['errorMessage']))
{
    $_SESSION['errorMessage'] = "";
}







/**
 * Vernieuwen van aantal bestelde artikelen in overzicht scherm.
 */

if (isset($_POST['vernieuwen']))
{
    $count = count($_SESSION['bestelling']);


    foreach ($_POST as $postKey => $postValue) {
        if ((is_int($postKey)) && ($postValue > 0))
        {
            $_SESSION['bestelling'][$postKey]['aantal'] = $postValue;
            $_SESSION['errorMessage'] = "";
        }
        elseif((is_int($postKey)) && ($postValue <= 0))
        {
            /**
             * Als gekozen aantal < 1 is
             */
            $_SESSION['errorMessage'] = "Het aantal moet groter dan 0 zijn.";
            header("Refresh: 0");
        }
    }
    header("Refresh: 0");
}




$_SESSION['totaalBestellingPrijs'] = $totaalBestellingPrijs;



/**
 * Connect to Twig.
 * Load beleg.twig file.
 * Send array $belegen and $_GET variable to beleg.twig.
 */
require_once("lib/Twig/Autoloader.php");
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("src/ProjectBrood/presentation");
$twig = new Twig_Environment($loader);
$view = $twig->render("overzicht.twig", array("overzicht" => $overzicht, "errorMessage" => $_SESSION['errorMessage'], "authorized" => $_SESSION['user']['authorized'], "totaalBestellingPrijs" => $_SESSION['totaalBestellingPrijs']));
print($view);





ob_flush();