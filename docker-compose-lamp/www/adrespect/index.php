<?php
include 'Class/CurrencyConverter.php';
include 'Class/Database.php';
include 'Class/ExchangeManager.php';
include 'Class/ExchangeRateTableGenerator.php';
include 'Class/NBPApi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adRespect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="js/js.js"></script>
</head>
<body>
    <?php
    // Tworzenie obiektów
    $db = new Database();
    $db->connect();

    $nbpApi = new NBPApi();
    $rates = $nbpApi->getExchangeRates();

    $exchangeRateManager = new ExchangeManager($db);
    $exchangeRateManager->saveExchangeRates($rates);
    $exchangeRates = $exchangeRateManager->getExchangeRates();

    print_r($exchangeRates);
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
</body>
</html>

