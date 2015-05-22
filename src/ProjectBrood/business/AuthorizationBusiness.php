<?php


namespace src\ProjectBrood\business;
use src\ProjectBrood\data\UsersDAO;
use src\ProjectBrood\exceptions\LoginVerkeerdException;

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

        if (!isset($this->lijst)) throw new LoginVerkeerdException();
        $this->passwordHash = $this->lijst[0]->getPassword();

        $this->checkPassword($this->passwordHash, $this->password);

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



















