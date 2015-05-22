<?php

ob_start();
session_start();
use src\ProjectBrood\business\AuthorizationBusiness;
use Doctrine\Common\ClassLoader;

use src\ProjectBrood\exceptions\LoginVerkeerdException;
use src\ProjectBrood\exceptions\LoginMisluktException;

if (isset($_POST['login_btn']))
{
    require_once'Doctrine/Common/ClassLoader.php';
    $classLoader = new ClassLoader("src");
    $classLoader->register();


    $login = $_POST['login_login'];
    $password = $_POST['login_pass'];



    try{
        $obj = new AuthorizationBusiness();

        $authorizedUser = $obj->authorize($login, $password);

        if(!isset($authorizedUser)) throw new LoginMisluktException();


        echo "<pre>";
        print_r($authorizedUser->getUserVoornaam());
        echo "</pre>";

        $_SESSION['user']['authorized'] = true;
        $_SESSION['user']['userId'] = $authorizedUser->getUserId();



    }
    catch(LoginVerkeerdException $e)
    {
        /**
         * todo Foutmelding in een variabele steken
         */
        echo "verkeerd email of wachtwoord";
    }
    catch(LoginMisluktException $e)
    {
        /**
         * todo Foutmelding in een variabele steken
         */
        echo "Login mislukt";
    }

}
else
{
    header('Location: index.php');
}



ob_flush();