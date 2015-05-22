<?php


namespace src\ProjectBrood\business;
use src\ProjectBrood\data\UsersDAO;

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

}





