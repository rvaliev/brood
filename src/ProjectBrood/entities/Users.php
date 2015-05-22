<?php

namespace src\ProjectBrood\entities;




class Users
{
    private $userId;
    private $userVoornaam;
    private $userFamilienaam;
    private $userEmail;
    private $userPassword;
    private $userDatum;
    private $userBestelStatus;
    private $userVerification;
    private $userEmailHash;


    public function __construct($userId, $userVoornaam, $userFamilienaam, $userEmail, $userPassword, $userDatum, $userBestelStatus, $userVerification, $userEmailHash)
    {
        $this->userId = $userId;
        $this->userVoornaam = $userVoornaam;
        $this->userFamilienaam = $userFamilienaam;
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
        $this->userDatum = $userDatum;
        $this->userBestelStatus = $userBestelStatus;
        $this->userVerification = $userVerification;
        $this->userEmailHash = $userEmailHash;
    }

    public function getAll()
    {

    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getUserVoornaam()
    {
        return $this->userVoornaam;
    }

    public function getUserFamilienaam()
    {
        return $this->userFamilienaam;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }

    public function getPassword()
    {
        return $this->userPassword;
    }

    public function getUserDatum()
    {
        return $this->userDatum;
    }

    public function getUserBestelStatus()
    {
        return $this->userBestelStatus;
    }

    public function getVerification()
    {
        return $this->userVerification;
    }

    public function getEmailHash()
    {
        return $this->userEmailHash;
    }

}





















