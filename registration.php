<?php

ob_start();
session_start();
use src\ProjectBrood\business\UsersBusiness;
use Doctrine\Common\ClassLoader;
use src\ProjectBrood\exceptions\RegistratieMisluktException;
use src\ProjectBrood\exceptions\GebruikerBestaatException;
use src\ProjectBrood\exceptions\OngelijkeWachtwoordException;
use src\ProjectBrood\exceptions\AllFieldsAreRequiredException;


if (isset($_POST['register_btn']))
{
    require_once'Doctrine/Common/ClassLoader.php';
    $classLoader = new ClassLoader("src");
    $classLoader->register();



    $userVoornaam = trim(strip_tags($_POST['register_name']));
    $userFamilienaam = trim(strip_tags($_POST['register_surname']));
    $userEmail = filter_var($_POST['register_email'], FILTER_VALIDATE_EMAIL);
    $userPassword = trim(htmlspecialchars($_POST['register_password']));
    $userPasswordRt = trim(htmlspecialchars($_POST['register_password_rt']));
    $userEmailHash = md5(date('Y-m-d H:i:s'));


    try{
        /**
         * Check if all fields are filled.
         * todo: Need to add a better validation in the future, like allowing only strings etc
         */
        if(empty($userVoornaam) || empty($userFamilienaam) || empty($userEmail) || empty($userPassword) || empty($userPasswordRt)) throw new AllFieldsAreRequiredException();

        /**
         * Create user object
         */
        $obj = new UsersBusiness();

        /**
         * Check by email if user exists
         */
        $userControle = $obj->zoekGebruikerMetEmail($userEmail);
        if(!empty($userControle)) throw new GebruikerBestaatException();

        /**
         * Check both passwords are identical to each other
         */
        if($userPassword !== $userPasswordRt) throw new OngelijkeWachtwoordException();

        /**
         * Hash password
         */
        $userPassword = $obj->hashPassword($userPassword);

        /**
         * Create new user
         */
        $userRegistration = $obj->creerGebruiker($userVoornaam, $userFamilienaam, $userEmail, $userPassword, $userEmailHash);
        if(!isset($userRegistration)) throw new RegistratieMisluktException();

        /**
         * Send verification email
         */
        $obj->sendVerificationEmail($userVoornaam, $userEmail, $userEmailHash);


        echo md5(date('Y-m-d H:i:s'));




    }
    catch(RegistratieMisluktException $e)
    {
        /**
         * todo Foutmelding in een variabele steken
         */
        echo "Registratie mislukt";
    }
    catch(GebruikerBestaatException $e)
    {
        echo "Gebruiker bestaat al";
    }
    catch(OngelijkeWachtwoordException $e)
    {
        echo "Wachtwoorden moeten identiek zijn";
    }
    catch(AllFieldsAreRequiredException $e)
    {
        echo "Alle velden moeten ingevuld zijn";
    }

}
else
{
    header('Location: index.php');
}



ob_flush();