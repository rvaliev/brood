<?php


namespace src\ProjectBrood\data;
use src\ProjectBrood\entities\Users;
use src\ProjectBrood\data\DBConnect;
use PDO;
use Exception;



class BestellingDAO
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


    /**
     * Insert data from session to DB
     */
    public function insertNewOrder($totaalPrijs, $userId, $bestellingArray)
    {
        self::connectToDB();
        $this->sql = "INSERT INTO bestelling (totaal_prijs, user_id, bestelling_datum) VALUES (?, ?, now())";

        try
        {
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($totaalPrijs, $userId));

            $lastInsertedOrderId = $this->handler->lastInsertId('bestelling_id'); // Getting the id from last entry
            /**
             * calling private function insertNewBestelRegel to add rows to 'bestel_regel' and 'broodje_samenstelling' tables
             */
            self::insertNewBestelRegel($lastInsertedOrderId, $bestellingArray);

            $this->query->closeCursor();
            $this->handler = null;
            return true;
        }
        catch(Exception $e)
        {
            echo "Error: query failed";
            die();
        }
    }

    /**
     * private function used only by insertNewOrder function
     */
    private function insertNewBestelRegel($lastInsertedOrderId, $bestellingArray)
    {
        foreach ($bestellingArray as $bestellingKey => $bestelling) {
            $this->sql = "INSERT INTO bestel_regel (bestelling_id, aantal, sandwich_prijs) VALUES (?, ? ,?)";

            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($lastInsertedOrderId, $bestelling['aantal'], $bestelling['sandwichPrijs']));

            $lastInsertedRegelId = $this->handler->lastInsertId('bestel_regel_id'); // getting the bestel_regel_id
            /**
             * calling insertNewOrderRows to add the sandwich composition
             */
            self::insertNewOrderRows($lastInsertedRegelId, $bestelling);
        }
    }

    /**
     * private function used only by insertNewBestelRegel function
     */
    private function insertNewOrderRows($lastInsertedRegelId, $bestelling)
    {
        foreach ($bestelling as $regelKey => $regel)
        {
            if (is_array($regel))
            {
                foreach ($regel as $belegKey => $belegSoort)
                {
                    if (is_int($belegKey))
                    {
                        $this->sql = "INSERT INTO broodje_samenstelling (bestel_regel_id, beleg_id, brood_id) VALUES (?, ? ,?)";

                        $this->query = $this->handler->prepare($this->sql);
                        $this->query->execute(array($lastInsertedRegelId, $belegKey, $regel['broodSoort']));
                    }
                }
            }

        }
    }
}
