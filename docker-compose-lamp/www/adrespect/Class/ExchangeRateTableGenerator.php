<?php
class ExchangeRateTableGenerator {
    private $exchangeRates;

    public function __construct($exchangeRates) {
        $this->exchangeRates = $exchangeRates;
    }

    public function generateTable() {
        echo "<table class='table table-striped table-bordered'>";
        echo '<tr><th>Code</th><th>Name</th><th>Rate</th></tr>';

        foreach ($this->exchangeRates as $rate) {
            echo '<tr>';
            echo '<td>' . $rate['code'] . '</td>';
            echo '<td>' . $rate['name'] . '</td>';
            echo '<td>' . $rate['rate'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
}
?>
