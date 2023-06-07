<?php
class CurrencyConverter {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function convertCurrency($amount, $sourceCurrency, $targetCurrency) {
        $pdo = $this->db->getPdo();

        $stmt = $pdo->prepare("SELECT rate FROM exchange_rates WHERE code = ?");
        $stmt->execute([$sourceCurrency]);
        $sourceRate = $stmt->fetchColumn();

        $stmt->execute([$targetCurrency]);
        $targetRate = $stmt->fetchColumn();

        $convertedAmount = $amount * ($targetRate / $sourceRate);
        $conversionDate = date("Y-m-d h:i:s");

        $stmt = $pdo->prepare("INSERT INTO currency_conversions (amount, source_currency, target_currency, converted_amount, conversion_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$amount, $sourceCurrency, $targetCurrency, $convertedAmount, $conversionDate]);

        return $convertedAmount;
    }

    public function getConversionResults() {
        $pdo = $this->db->getPdo();
        $stmt = $pdo->query("SELECT * FROM currency_conversions ORDER BY conversion_date desc");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getConversionCodes() {
        $pdo = $this->db->getPdo();
        $stm = $pdo->query("SELECT code FROM exchange_rates");

        return $stm->fetchAll(PDO::FETCH_COLUMN); 
    }
}
?>
