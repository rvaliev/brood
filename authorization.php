<?php

ob_start();
session_start();
require('head.php');
use src\ProjectBrood\business\AuthorizationBusiness;
use Doctrine\Common\ClassLoader;

use src\ProjectBrood\exceptions\LoginVerkeerdException;
use src\ProjectBrood\exceptions\LoginMisluktException;
use src\ProjectBrood\exceptions\EmailNotVerifiedException;

if (isset($_POST['login_login']))
{
    require_once'Doctrine/Common/ClassLoader.php';
    $classLoader = new ClassLoader("src");
    $classLoader->register();


    $login = filter_var(trim($_POST['login_login']), FILTER_VALIDATE_EMAIL);
    $password = trim(htmlspecialchars($_POST['login_pass']));



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
        exit();
    }
    catch(LoginMisluktException $e)
    {
        /**
         * todo Foutmelding in een variabele steken
         */
        echo "Login mislukt";
    }
    catch(EmailNotVerifiedException $e)
    {
        echo "Uw account is nog niet geverifieerd via email";
    }

}
else
{
    header('Location: index.php');
}



ob_flush();