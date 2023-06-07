<?php

class NBPApi 
{
    private $apiUrl = "https://api.nbp.pl/api/exchangerates/tables/A?format=json";

    public function getExchangeRates(){
        $response = file_get_contents($this->apiUrl);
        $data = json_decode($response, true);

        return $data[0]['rates'];
    }
}
?>