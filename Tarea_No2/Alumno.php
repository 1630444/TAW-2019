<?php
    //Se define la clase persona
    class Alumno{
        //PROPIEDADES:
        public $matricula;
        public $nombre;
        public $carrera;
        public $email;
        public $telefono;

        //MÉTODOS

         // Constructor
        public function __construct($matricula, $nombre, $carrera, $email, $telefono){
        $this->matricula = $matricula;
        $this->nombre = $nombre;
        $this->carrera = $carrera;
        $this->email = $email;
        $this->telefono = $telefono;
        }

        public function mostrar (){

            $salida .= '<div class="resultado">'
					.'<strong>Matricula: </strong>'. $this->matricula . '</br>' 
					.'<strong>Nombre: </strong>'. $this->nombre . '</br>' 
					.'<strong>Carrera: </strong>'.$this->carrera . '</br>' 
					.'<strong>E-mail: </strong>'.$this->email. '</br>' 
					.'<strong>Telefono: </strong>'.$this->telefono . '</br>'
                    .'</div>';
            return $salida;
        }
    }
?>