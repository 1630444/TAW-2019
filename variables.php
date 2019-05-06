<?php
//variable de texto
$palabra="Alumno de ITI TAW";
echo "Esto es una variable de texto: $palabra<br>";
var_dump($palabra);
echo"<br><br>";

//variable de arreglo
$colores = array ("rojo","amarillo");
echo "Esto es una variable de texto: $palabra<br>";
var_dump($colores);
echo"<br><br>";

//variable de arreglo con propiedades
$verduras = array("verdura1"=>"lechuga","verdura2"=>"cebolla","verdura3"=>"tomate");
echo "Esto es una variable arreglo con porpiedades: $verduras[verdura1]<br>";
var_dump($verduras);
echo"<br><br>";

//Variable de tipo objeto
$frutas = (object) ["fruta1"=>"pera","fruta2"=>"sandia"];
echo "Esto es una variable de tipo objeto: $frutas -> fruta1 <br>";
var_dump($frutas);

?>