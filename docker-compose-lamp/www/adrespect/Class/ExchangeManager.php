<?php

class ExchangeManager  
{
    private $db;
    private $date;
    
    public function __construct($db){
        $this->db = $db;
    }

    public function saveExchangeRates($rates){
        $pdo = $this->db->getPDO();
        $updatedate = date('Y-m-d');
        if($this->getLastUpdateDate() !== date('Y-m-d')){
        foreach($rates as $rate){
            $code = $rate['code'];
            $name = $rate['currency'];
            $exchangeRate = $rate['mid'];
            
            
            $insert = $pdo->prepare("INSERT INTO exchange_rates (code, name, rate, updatedate) VALUES (?, ?, ?, ?)");
            $insert->execute([$code, $name, $exchangeRate, $updatedate]);

            
        }
    } else {
        
    }
}

    public function getExchangeRates() {
        $pdo = $this->db->getPDO();
        $select = $pdo->query("SELECT * FROM exchange_rates WHERE updatedate = '".date('Y-m-d')."'");
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLastUpdateDate() {
        $pdo = $this->db->getPDO();
        $select = $pdo->query("SELECT MAX(updatedate) from exchange_rates");
        return $select->fetchColumn();
    }
 
}
