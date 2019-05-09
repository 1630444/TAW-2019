
<?php
    //Clase pra conectarnos a la base de datos
    class Database {
        private $con;
        private $dbhost="localhost";
        private $dbuser="alan";
        private $dbpass="estanque98";
        private $dbname="tuto_poo";

        function _construct(){
            $this->connect_db();
        }

        //Metodo de conexión a la bd
        public function connect_db(){
            $this->con = mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
            if(mysqli_connect_error){};
        }
    }
?>