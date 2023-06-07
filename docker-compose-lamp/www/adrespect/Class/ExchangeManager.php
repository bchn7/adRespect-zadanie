<?php

class ExchangeManager  
{
    private $db;
    
    public function __construct($db){
        $this->db = $db;
    }

    public function saveExchangeRates($rates){
        $pdo = $this->db->getPDO();

        foreach($rates as $rate){
            $code = $rate['code'];
            $name = $rate['currency'];
            $exchangeRate = $rate['mid'];

            $insert = $pdo->prepare("INSERT INTO exchange_rates (code, name, rate) VALUES (?, ?, ?)");
            $insert->execute([$code, $name, $exchangeRate]);
        }
    }

    public function getExchangeRates() {
        $pdo = $this->db->getPDO();
        $select = $pdo->query("SELECT * FROM exchange_rates");
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }
 
}
