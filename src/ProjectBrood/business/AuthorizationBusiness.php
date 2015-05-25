<?php


namespace src\ProjectBrood\business;
use src\ProjectBrood\data\UsersDAO;
use src\ProjectBrood\exceptions\LoginVerkeerdException;
use src\ProjectBrood\exceptions\EmailNotVerifiedException;

//include('../../../src/ProjectBrood/data/UsersDAO.php');


/**
 * Class AuthorizationBusiness
 * @package src\ProjectBrood\business
 * Authorisatie-class: login en wachtwoord
 */
class AuthorizationBusiness
{
    private $usersDAO;
    private $lijst;
    private $login;
    private $password;
    private $passwordHash;

    public function authorize($login, $password)
    {
        $this->login = $login;
        $this->password = $password;

        $this->usersDAO = new UsersDAO();
        $this->lijst = $this->usersDAO->authorizeUser($login);

        /**
         * Chech if user exists in DB
         */
        if (!isset($this->lijst)) throw new LoginVerkeerdException();

        /**
         * Get hashed password from DB and check if by user inserted password matches with hashed one.
         */
        $this->passwordHash = $this->lijst[0]->getPassword();
        $this->checkPassword($this->passwordHash, $this->password);

        /**
         * Check if account is verified
         */
        if($this->lijst[0]->getVerification() != 1) throw new EmailNotVerifiedException();

        return $this->lijst[0];

    }

    /**
     * @param $passwordHash
     * @param $passwordEntered
     * @throws LoginVerkeerdException
     * Functie die controleert of ingevulde wachtwoord overeenkomt met de hashwachtwoord in DB.
     */
    private function checkPassword($passwordHash, $passwordEntered)
    {
        if(!password_verify($passwordEntered, $passwordHash)) throw new LoginVerkeerdException();


    }

}



















