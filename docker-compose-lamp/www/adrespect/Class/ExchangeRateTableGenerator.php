<?php
class ExchangeRateTableGenerator {
    private $exchangeRates;

    public function __construct($exchangeRates) {
        $this->exchangeRates = $exchangeRates;
    }

    // generator tablicy z kursami
    public function generateTable() {
        echo "<table class='table table-striped table-bordered' id='exchangeRate' name='exchangeRate'>";
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
        echo "</table>";
    }
}
?>
