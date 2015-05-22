<?php

ob_start();
session_start();
use src\ProjectBrood\business\AuthorizationBusiness;
use Doctrine\Common\ClassLoader;

use src\ProjectBrood\exceptions\LoginVerkeerdException;
use src\ProjectBrood\exceptions\LoginMisluktException;

if (isset($_POST['login_login']))
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


        $_SESSION['user']['authorized'] = true;
        $_SESSION['user']['userId'] = $authorizedUser->getUserId();

        echo "<span class='success'>U bent ingelogd</span>";

?>

        <script>
            setTimeout(function(){
                location.reload();
            }, 2000);
        </script>

        <?php




    }
    catch(LoginVerkeerdException $e)
    {
        /**
         * todo Foutmelding in een variabele steken
         */
        echo "<span class='error_message'>Verkeerd email of wachtwoord</span>";
        ?>
        <!--<script>
            jQuery(".error_reporting").css('visibility','visible');
        </script>-->



        <?php
        exit();
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