<?php

$sale = new Sale(200.4, date('d-m-Y'));
$sale = new Sale(200.4, date('d-m-Y'));
$sale = new Sale(200.4, date('d-m-Y'));
echo Sale::$count;

echo " / ";

Sale::reset();
$sale = new Sale(200.4, date('d-m-Y'));
echo Sale::$count;

// $sale->total = 200.4;
// $sale->date = date('d-m-Y');
// print_r($sale);
$sale->createInvioce();


class Sale
{
    public $total, $date;
    public static $count;

    public function __construct($total, $date)
    {
        $this->total = $total;
        $this->date = $date;
        self::$count++;
    }

    public static function reset()
    {
        self::$count = 0;
    }

    public function __destruct()
    {
        // echo "<h2>Se ha eliminado el objeto</h2>";
    }

    public function createInvioce()
    {
        echo "<h4>Se crea la factura</h4>";
    }
}
