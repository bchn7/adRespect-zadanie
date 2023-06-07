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
    <link rel="stylesheet" href="css/style.css">
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

    $tableGenerator = new ExchangeRateTableGenerator($exchangeRates);

    $currencyConverter = new CurrencyConverter($db);
    
    $curriencies = $currencyConverter->getConversionCodes();
    if(isset($_POST['exchange'])){
    $currencyConverter->convertCurrency($_POST['amount'], $_POST['sourceCurrency'], $_POST['targetCurrency']);
    }
    $conversionResults = $currencyConverter->getConversionResults();

?>
<div class="containter">
    <h1 style="text-align: center;">Exchange rates and currency conversion</h1>

    <div class="formExchange" style="width:50%">
    <h1>Convert currency</h1>
    <form method="post" action="">
            <div class="mb-3">
                <label for="amount" class="form-label">Amount:</label>
                <input type="text" name="amount" id="amount" class="form-control">
            </div>
            
            <div class="mb-3">
                <label for="sourceCurrency" class="form-label">Source Currency:</label>
                <select name="sourceCurrency" id="sourceCurrency" class="form-select">
                    <?php
                    foreach ($curriencies as $currency){
                        print("<option value='$currency'>$currency</option>");
                    }
                    ?>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="targetCurrency" class="form-label">Target Currency:</label>
                <select name="targetCurrency" id="targetCurrency" class="form-select">
                <?php
                    foreach ($curriencies as $currency){
                        print("<option value='$currency'>$currency</option>");
                    }
                    ?>
                </select>
            </div>
            
            <button type="submit" name="exchange" class="btn btn-primary">Convert</button>
        </form>
    </div>
    <div class="exchangeRates" style="width: 50%;">
    <h1>Exchange Rates</h1>
<?php
        $tableGenerator->generateTable();
?>
    </div>

    <div class="lastExchanges" style="width: 50%;">
    <h1>Last exchanges</h1>
        <table class="table table-striped table-bordered" id="conversion" name="conversion">
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>Source Currency</th>
                    <th>Target Currency</th>
                    <th>Converted</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($conversionResults as $result) {
                    print("<tr>");
                    print("<td>".$result['amount']."</td>");
                    print("<td>".$result['source_currency']."</td>");
                    print("<td>".$result['target_currency']."</td>");
                    print("<td>".$result['converted_amount']."</td>");
                    print("</tr>");
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

