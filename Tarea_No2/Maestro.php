<?php
    //Se define la clase persona
    class Maestro{
        //PROPIEDADES:
        public $no_empleado;
        public $carrera;
        public $nombre;
        public $telefono;

        //MÉTODOS
         // Constructor
        public function __construct($no_empleado, $carrera, $nombre, $telefono){
        $this->no_empleado = $no_empleado;
        $this->nombre = $nombre;
        $this->carrera = $carrera;
        $this->telefono = $telefono;
        }

        public function mostrar (){

            $salida .= '<div class="resultado">'
					.'<strong>No. Empleado: </strong>'. $this->no_empleado . '</br>' 
					.'<strong>Nombre: </strong>'. $this->nombre . '</br>' 
					.'<strong>Carrera: </strong>'.$this->carrera . '</br>' 
					.'<strong>Telefono: </strong>'.$this->telefono . '</br>'
                    .'</div>';
            return $salida;
        }
    }
?>