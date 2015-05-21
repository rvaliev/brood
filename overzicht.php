<?php

ob_start();

use src\ProjectBrood\business\BelegBusiness;
use src\ProjectBrood\business\BroodBusiness;
use Doctrine\Common\ClassLoader;

session_start();
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


if (!empty($_SESSION['bestelling']))
{
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


            }

            /**
             * Getting 'Beleg' list
             */


            if (is_array($bestelRegel))
            {
                foreach ($bestelRegel as $belegKey => $belegRegel)
                {
                    if (is_int($belegKey))
                    {
                        $objBeleg = new BelegBusiness();
                        $belegen = $objBeleg->overzichtBelegById($belegKey);
                        $eenBeleg = $belegen[0];

                        $overzicht[$key]['beleg'][] = $eenBeleg->getNaam();
                    }
                }
            }
        }
    }
}
else
{
    $overzicht = array();
}






/**
 * Connect to Twig.
 * Load beleg.twig file.
 * Send array $belegen and $_GET variable to beleg.twig.
 */
require_once("lib/Twig/Autoloader.php");
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("src/ProjectBrood/presentation");
$twig = new Twig_Environment($loader);
$view = $twig->render("overzicht.twig", array("overzicht" => $overzicht));
print($view);

if (isset($_POST['bestellingPlaatsen']))
{
    $count = count($_SESSION['bestelling']);

    foreach ($_POST as $postKey => $postValue) {
        if (is_int($postKey))
        {
            $_SESSION['bestelling'][$postKey]['aantal'] = $postValue;
        }
    }
    header("Refresh: 0");
}





ob_flush();