<?php
//Funciones sin porpiedades
function saludo() {
    echo "hola soy alumno de ITI <br>";
}
saludo();

//Funcion con parametros
function despedida ($adios){
    echo $adios."<br>";
}
despedida("Adios, me voy! <br>");

//Funcion con retorno
function retorno ($retornar){
    return $retornar;
}
echo retorno("Retorno en una función.");

?>