<?php

ob_start();
session_start();
require('head.php');
use src\ProjectBrood\business\UsersBusiness;
use Doctrine\Common\ClassLoader;
use src\ProjectBrood\exceptions\OngeldigeAanvraagException;

if (isset($_GET['hash']) && !empty($_GET['hash']))
{
    try
    {
        require_once'Doctrine/Common/ClassLoader.php';
        $classLoader = new ClassLoader("src");
        $classLoader->register();


        $userEmailHash = $_GET['hash'];

        /**
         * Create user object
         */
        $obj = new UsersBusiness();

        /**
         * Check by email hash if user exists
         */
        $userVerification = $obj->verifyUser($userEmailHash);

        if(empty($userVerification)) throw new OngeldigeAanvraagException();

    }
    catch(OngeldigeAanvraagException $e)
    {
        $userVerification[0] = "error";
    }


    /**
     * Load twig template for verification page
     */
    require_once("lib/Twig/Autoloader.php");
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem("src/ProjectBrood/presentation");
    $twig = new Twig_Environment($loader);

    $view = $twig->render("verificatie.twig", array("verifiedUser" => $userVerification[0], "authorized" => $_SESSION['user']['authorized']));
    print($view);

}
else
{
    header('Location: index.php');
}






ob_flush();