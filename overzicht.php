<?php


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







/*foreach ($_SESSION['bestelling'] as $key => $bestelling) {
    foreach ($bestelling as $bestelRegel) {
        foreach ($bestelRegel as $belegKey => $belegRegel) {
            if (is_int($belegKey))
            {
                $objBeleg = new BelegBusiness();
                $belegen = $objBeleg->overzichtBelegById($belegKey);
                echo "<pre>";
                $eenBeleg = $belegen[0];
                print_r($eenBeleg->getNaam());
                echo "</pre>";
            }
        }


        $objBrood = new BroodBusiness();
        $broden = $objBrood->overzichtBroodById($bestelRegel['broodSoort']);
        $eenBrood = $broden[0];
        echo $eenBrood->getNaam() . "<br>";

//        echo "Brood nummer: " . $bestelRegel['broodSoort'] . "<br>";
    }


    echo "Bestel nummer: $key";
}*/





foreach ($_SESSION['bestelling'] as $key => $bestelling)
{
    foreach ($bestelling as $bestelKey => $bestelRegel)
    {

        /**
         * Getting 'Brood' list
         */

        if (is_int($bestelKey))
        {
            $objBrood = new BroodBusiness();
            //        $bestelKey++;
            $broden = $objBrood->overzichtBroodById($bestelKey);
            echo "Soort broodje: <b>" . $broden->getNaam() . "</b><br>";
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
                    echo "Samenstelling: " . $eenBeleg->getNaam() . "<br>";


                }
            }
        }
    }
    echo "<br>";
}









/**
 * Connect to Twig.
 * Load beleg.twig file.
 * Send array $belegen and $_GET variable to beleg.twig.
 */
/*require_once("lib/Twig/Autoloader.php");
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("src/ProjectBrood/presentation");
$twig = new Twig_Environment($loader);
$view = $twig->render("beleg.twig", array("belegen" => $belegen, "brood_id" => $_GET['id']));
print($view);*/

