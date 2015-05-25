<?php


namespace src\ProjectBrood\business;
use src\ProjectBrood\data\UsersDAO;
use src\ProjectBrood\exceptions\RegistratieMisluktException;
use src\ProjectBrood\exceptions\GebruikerBestaatException;

//include('../../../src/ProjectBrood/data/UsersDAO.php');


class UsersBusiness
{
    private $usersDAO;
    private $lijst;

    public function overzichtUser()
    {
        $this->usersDAO = new UsersDAO();
        $this->lijst = $this->usersDAO->getAll();
        return $this->lijst;
    }


    /**
     * Create new user
     */
    public function creerGebruiker($userVoornaam, $userFamilienaam, $userEmail, $userPassword, $userEmailHash)
    {
        $this->usersDAO = new UsersDAO();
        $this->lijst = $this->usersDAO->createUser($userVoornaam, $userFamilienaam, $userEmail, $userPassword, $userEmailHash);

        if (!isset($this->lijst)) throw new RegistratieMisluktException();

        return $this->lijst;
    }


    /**
     * Find user by email
     */
    public function zoekGebruikerMetEmail($email)
    {
        $this->usersDAO = new UsersDAO();
        $this->lijst = $this->usersDAO->findUserByEmail($email);

        if(!isset($this->lijst)) throw new GebruikerBestaatException();

        return $this->lijst;
    }

    public function hashPassword($passwordToHash, $rounds = 10)
    {

        $crypt_options = array('cost' => $rounds);
        $hash = password_hash($passwordToHash, PASSWORD_BCRYPT, $crypt_options);
        return $hash;
    }


    /**
     * Send verification email to new user
     */
    public function sendVerificationEmail($userName, $emailTo, $emailHash)
    {
//        $emailTo = "rvaliev22@gmail.com";
        $emailFrom = "rvaliev22@gmail.com";
        $emailSubject = "Broodjeszaak - profiel-verificatie";

        $emailMessage = "Hallo ". $userName . "! Klik op onderstaande link om uw profiel te verifieeren.\n\n";
        $emailMessage .= "http://" . $_SERVER['HTTP_HOST'] . "/verification.php?hash=" . $emailHash;

        $headers = 'From: '.$emailFrom."\r\n".
            'Reply-To: '.$emailFrom."\r\n" .
            'X-Mailer: PHP/' . phpversion();
        @mail($emailTo, $emailSubject, $emailMessage, $headers);
    }

}





