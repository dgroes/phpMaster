<?php

//Para que tenga tipado estricto
declare(strict_types=1);
/* 
$sale = new Sale(200.4, date('d-m-Y'));
$sale = new Sale(200.4, date('d-m-Y'));
$sale = new Sale(200.4, date('d-m-Y')); */
echo Sale::$count;


echo " / ";

Sale::reset();
$sale = new Sale(date('d-m-Y'));
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
$concept2 = new Concept("Cerveza Escudo", 5.2);
$sale->addConcept($concept);
$sale->addConcept($concept2);
print_r($sale->concepts);
$sale->addConcept($concept);
echo "<br>";
echo $sale->getTotal();
echo "<br>";
echo $sale->getDate();

echo "<br>";
echo "Herencia";
$onlineSale = new OnlineSale(date('d-m-Y'), "Tarjeta");
echo $onlineSale->createInvioce();
echo $onlineSale->showInfo();

class Sale
{
    protected float $total;
    private string $date;
    public array $concepts;
    public static $count;



    public function __construct(string $date)
    {
        $this->date = $date;
        $this->total = 0;
        $this->concepts = [];
        self::$count++;
    }


    public function addConcept(Concept $concepts)
    {
        $this->concepts[] = $concepts;
        // $this->createInvioce();
        $this->total += $concepts->amount;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
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

    public function __construct(string $date, string $paymentMethod)
    {
        parent::__construct($date);
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
