<?php

class ExchangeManager  
{
    private $db;
    private $date;
    
    public function __construct($db){
        $this->db = $db;
    }
    // funkcja do zapisywania informacji pobranych z API nbp do bazy danych 
    public function saveExchangeRates($rates){
        $pdo = $this->db->getPDO();
        $updatedate = date('Y-m-d');
        // sprawdzenie czy wyniki z danego dnia sa juz w bazie
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

    // funkcja pobierajaca z bazy wyniki pobrane z nbp
    public function getExchangeRates() {
        $pdo = $this->db->getPDO();
        $select = $pdo->query("SELECT * FROM exchange_rates WHERE updatedate = '".date('Y-m-d')."'");
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }

    // sprawdzenie jaka byla ostatnia najnowsza data dodana do bazy
    public function getLastUpdateDate() {
        $pdo = $this->db->getPDO();
        $select = $pdo->query("SELECT MAX(updatedate) from exchange_rates");
        return $select->fetchColumn();
    }
 
}
