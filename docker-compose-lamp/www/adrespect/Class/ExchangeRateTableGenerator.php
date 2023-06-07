<?php
class ExchangeRateTableGenerator {
    private $exchangeRates;

    public function __construct($exchangeRates) {
        $this->exchangeRates = $exchangeRates;
    }

    public function generateTable() {
        echo "<table class='table table-striped' id='exchangeRate' name='exchangeRate'>";
        echo "<thead><tr><th>Code</th><th>Name</th><th>Rate</th></tr></thead>";
        echo "<tbody>";
        foreach ($this->exchangeRates as $rate) {
            echo "<tr>";
            echo "<td>" . $rate['code'] . "</td>";
            echo "<td>" . $rate['name'] . "</td>";
            echo "<td>" . $rate['rate'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "<tfoot><tr><th>Code</th><th>Name</th><th>Rate</th></tr></tfoot>";
        echo "</table>";
    }
}
?>
