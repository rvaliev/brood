<?php

namespace src\ProjectBrood\data;
use src\ProjectBrood\entities\Beleg;
use src\ProjectBrood\data\DBConnect;
use PDO;
use Exception;


class BelegDAO
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
        $this->sql = "SELECT * FROM beleg";

        try{
            $this->query = $this->handler->query($this->sql);
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->query->closeCursor();
            $this->handler = null;

            foreach ($this->result as $row)
            {
                $this->lijst[] = new Beleg($row['beleg_id'], $row['beleg_naam'], $row['beleg_samenstelling'], $row['beleg_prijs'], $row['beleg_image']);
            }


            return $this->lijst;
        }
        catch(Exception $e){
            echo "Error: query failure";
//            return false;
            die();
        }
    }
}
