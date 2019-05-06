
<?php
    //Trabajar con POO:
    //CLASE:
    //Una clase es un modelo que se utiliza para crear objetos que comparten un mismo comportamiento, estado o identidad.
    class Automovil{
        //PROPIEDADES:
        //Son las caracteristicas que puede tener un objeto.
        public $marca;
        public $modelo;

        //MÉTODOS
        //Es el algoritmo asisciado a un objeto que indica la capacidad de lo que este puede hacer. La única diferencia entre metodo y función, es que llamamos MÉTODO A LAS FUNCIONES DE UNA CLASE (EN POO), mientras que llamamos funciones a los algoritmos de la programación estructurada.
        public function mostrar (){
            echo "<p> Hola soy un $this->marca, modelo $this->modelo </p>";
        }

    }

    //OBJETOS:
    //Una entidad provista de metodos o mensajes a los cuales responde con valores concretos.
    $a = new Automovil();
    $a -> marca = "Toyota";
    $a -> modelo = "Corolla";
    $a -> mostrar();

    $b = new Automovil();
    $b -> marca = "Nissan";
    $b -> modelo = "Tsuru";
    $b -> mostrar();

    //Principios de la POO que se cumplen en este ejemplo:
    //1. ABSTRACCIÓN: Nuevos tipos de datos, el que se quiere se crea.
    //2. ENCAPSULAMIENTO: Organiza el código en grupos lógicos.
    //3. OCULTAMIENTO: Oculta detalles de implementación y poner solo lo que sea necesario en el sistema.

?>