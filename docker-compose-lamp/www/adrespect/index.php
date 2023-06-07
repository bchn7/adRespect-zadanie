<?php
include 'Class/CurrencyConverter.php';
include 'Class/Database.php';
include 'Class/ExchangeManager.php';
include 'Class/ExchangeRateTableGenerator.php';
include 'Class/NBPApi.php';
// Tworzenie obiektów
$db = new Database('172.18.0.3', 'adrespect', 'root', 'tiger');
$db->connect();

$nbpApi = new NBPApi();
$rates = $nbpApi->getExchangeRates();

$exchangeRateManager = new ExchangeManager($db);
$exchangeRateManager->saveExchangeRates($rates);
$exchangeRates = $exchangeRateManager->getExchangeRates();

$tableGenerator = new ExchangeRateTableGenerator($exchangeRates);
$tableGenerator->generateTable();

$currencyConverter = new CurrencyConverter($db);
$convertedAmount = $currencyConverter->convertCurrency(100, 'USD', 'EUR');
$conversionResults = $currencyConverter->getConversionResults();

// Wyświetlanie listy wyników przewalutowań
foreach ($conversionResults as $result) {
    echo 'Amount: ' . $result['amount'] . '<br>';
    echo 'Source Currency: ' . $result['source_currency'] . '<br>';
    echo 'Target Currency: ' . $result['target_currency'] . '<br>';
    echo 'Converted Amount: ' . $result['converted_amount'] . '<br>';
    echo 'Conversion Date: ' . $result['conversion_date'] . '<br><br>';
}
?>
