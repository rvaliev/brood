<?php

namespace Brood\Data;
require_once('src/resource/data/DBConnect.class.php');
require_once('src/resource/entities/Brood.class.php');
use Brood\Entities\Brood;
use Brood\Data\DBConnect;
use PDO;
use Exception;


class BroodDAO
{
    private $result;
    private $handler;
    private $sql;
    private $query;

    private $lijst;

    public function __construct()
    {

    }


    private function connectToDB()
    {
        $this->handler = new DBConnect();
        $this->handler = $this->handler->startConnection();
    }


    public function getAll()
    {
        self::connectToDB();
        $this->sql = "SELECT * FROM brood";

        try{
            $this->query = $this->handler->query($this->sql);
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->query->closeCursor();
            $this->handler = null;

            foreach ($this->result as $row)
            {
                $this->lijst[] = new Brood($row['brood_id'], $row['brood_naam'], $row['brood_samenstelling'], $row['brood_prijs'], $row['brood_image']);
            }


            return $this->lijst;
        }
        catch(Exception $e){
            echo "Error: query failure";
            return false;
        }
    }
}
