<?php
//  __ATRIBUTOS ESTATICOS__
// Los atributos estáticos son variables que peretenecen a la clase en lugar de a una instatncia
// especifica de la calse. Esto significa que su valo es compartido entre todas las intancias de la clase.
// Ejemplo:

/* class MiClase{
    public static $atributoEStatico = 10;
}  */

//  __MÉTODOS ESTÁTICOS__
//Los métodos estáticos son funciones que pertenecen a la clase en lugar de a una instancia específica 
//de la clase. Esto significa que se pueden llamar sin necesidad de crear una instancia de la clase. 

class MiClase
{
    public static $atributoEstatico = 10;
    public static function metodoEstatico()
    {
        echo "Este es un método estático";
    }
}


//Acceder a los atributos y métodos estáticos:
echo MiClase::$atributoEstatico . "<br>";
MiClase::metodoEstatico();
echo "<br>";


class ContadorInstancias
{
    // Se define un atributo estático llamado $contador. Este atributo almacenará el número total de instancias creadas de la clase ContadorInstancias. Se inicializa en 0.
    public static int $contador = 0;

    // Se define un constructor que se ejecuta cada vez que se crea una nueva instancia de la clase. Dentro del constructor, se incrementa el contador de instancias estáticas $contador usando self::$contador++.
    public function __construct()
    {
        self::$contador++;
    }

    // Se define un método estático llamado obtenerTotal(). Este método devuelve el número total de instancias creadas de la clase ContadorInstancias accediendo al atributo estático $contador y retornándolo.
    public static function obtenerTotal(): int
    {
        return self::$contador;
    }
}

// Se crean tres instancias de la clase ContadorInstancias utilizando el constructor. Cada vez que se crea una instancia, se incrementa el contador de instancias. Luego, se utiliza el método estático obtenerTotal() para obtener el número total de instancias creadas e imprimirlo en la salida.
$instancia1 = new ContadorInstancias();

// Obtener el número total de instancias creadas
echo "Total de instancias creadas: " . ContadorInstancias::obtenerTotal(); // Imprimirá "Total de instancias creadas"

