<?php
    //definir clase principal
    class Persona{
        //Propiedades de la persona:
        public $edad;
        public $altura;
        public $peso;

        //obtener valores
        //getter
        //Edad;
        public function getEdad(){
            return $this->edad;
        }
        //Peso:
        public function getPeso(){
            return $this->peso;
        }
        //Altura:
        public function getAltura(){
            return $this->altura;
        }

        //Calculos
        //setters:
        public function setEdad($value){
            $this->edad=$value;
        }

        public function setPeso($value){
            $this->peso=$value;
        }

        public function setAltura($value){
            $this->altura=$value;
        }

        //Calcular el IMC indice de masa corporal accediendo a las propiedades
        public function imc(){
            return $this->peso/($this->altura*$this->altura);
        }

        //Calcular el IMC indice de masa corporal mediante los metodos get
        public function imc2(){
            return $this->getPeso()/($this->getAltura()*$this->getAltura());
        }



    }
?>