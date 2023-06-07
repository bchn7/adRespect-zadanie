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

        $stmt = $pdo->prepare("INSERT INTO currency_conversions (amount, source_currency, target_currency, converted_amount) VALUES (?, ?, ?, ?)");
        $stmt->execute([$amount, $sourceCurrency, $targetCurrency, $convertedAmount]);

        return $convertedAmount;
    }

    public function getConversionResults() {
        $pdo = $this->db->getPdo();
        $stmt = $pdo->query("SELECT * FROM currency_conversions ORDER BY conversion_date DESC LIMIT 10");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
