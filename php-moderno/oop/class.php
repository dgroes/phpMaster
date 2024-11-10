<?php

//Para que tenga tipado estricto
declare(strict_types=1);

$sale = new Sale(200.4, date('d-m-Y'));
$sale = new Sale(200.4, date('d-m-Y'));
$sale = new Sale(200.4, date('d-m-Y'));
echo Sale::$count;


echo " / ";

Sale::reset();
$sale = new Sale(123.3, date('d-m-Y'));
echo Sale::$count;

echo "<br>";
// echo gettype($sale->total);

echo "<br>";
echo $sale->createInvioce();

// $sale->total = 200.4;
// $sale->date = date('d-m-Y');
// print_r($sale);
// $sale->createInvioce();

echo "<br>";

$concept = new Concept("Cerveza", 10.2);
$sale->addConcept($concept);
print_r($sale->concepts);


echo "<br>";
echo "Herencia";
$onlineSale = new OnlineSale(14, date('d-m-Y'), "Tarjeta");
echo $onlineSale->createInvioce();
echo $onlineSale->showInfo();

class Sale
{
    protected float $total;
    public string $date;
    public array $concepts;
    public static $count;

    public function __construct(float $total, string $date)
    {
        $this->total = $total;
        $this->date = $date;
        $this->concepts = [];
        self::$count++;
    }


    public function addConcept(Concept $concepts)
    {
        $this->concepts[] = $concepts;
        // $this->createInvioce();
    }


    public static function reset()
    {
        self::$count = 0;
    }

    public function __destruct()
    {
        // echo "<h2>Se ha eliminado el objeto</h2>";
    }

    public function createInvioce(): string
    {
        return "<h4>Se crea la factura</h4>";
    }
}


class OnlineSale extends Sale
{

    public $paymentMethod;

    public function __construct(float $total, string $date, string $paymentMethod)
    {
        parent::__construct($total, $date);
        $this->paymentMethod = $paymentMethod;
    }

    public function showInfo(): string
    {
        return "La venta tiene un monto de: $this->total";
    }
}



class Concept
{
    public string $description;
    public int | float $amount;

    public function __construct(string $description, int | float $amount)
    {
        $this->description = $description;
        $this->amount = $amount;
    }
}
