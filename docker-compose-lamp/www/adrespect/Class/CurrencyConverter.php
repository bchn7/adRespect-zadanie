<?php
class CurrencyConverter {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    // funkcja do porownania walut
    public function convertCurrency($amount, $sourceCurrency, $targetCurrency) {
        $pdo = $this->db->getPdo();

        // pobranie kursu do waluty startowej
        $stmt = $pdo->prepare("SELECT rate FROM exchange_rates WHERE code = ?");
        $stmt->execute([$sourceCurrency]);
        $sourceRate = $stmt->fetchColumn();

        // pobranie kursu do waluty docelowej
        $stmt->execute([$targetCurrency]);
        $targetRate = $stmt->fetchColumn();

        // mnozymy ilosc jaka chcemy wymienic przez dzielenie obu kursow przez siebie
        $convertedAmount = $amount * ($targetRate / $sourceRate);
        // zapisanie daty i godizny w ktorej zostala utworzona zamiana
        $conversionDate = date("Y-m-d h:i:s");

        $stmt = $pdo->prepare("INSERT INTO currency_conversions (amount, source_currency, target_currency, converted_amount, conversion_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$amount, $sourceCurrency, $targetCurrency, $convertedAmount, $conversionDate]);

        return $convertedAmount;
    }

    // funkcja do pobrania wszystkich wymian w bazie
    public function getConversionResults() {
        $pdo = $this->db->getPdo();
        $stmt = $pdo->query("SELECT * FROM currency_conversions ORDER BY conversion_date desc");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // funkcja ktora pobiera nam wszystkie kody walut aby wrzucic je potem do <select> 
    public function getConversionCodes() {
        $pdo = $this->db->getPdo();
        $stm = $pdo->query("SELECT code FROM exchange_rates");

        return $stm->fetchAll(PDO::FETCH_COLUMN); 
    }
}
?>
