<?php
	class Database{

		private $con;
		private $dbhost="localhost";
		private $dbuser="alan";
		private $dbpass="estanque98";
		private $dbname="tarea_3-1";

		function __construct(){
			$this->connect_db();
		}
		
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}

		public function read($table){
			$sql = "SELECT * FROM $table";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function read_special($sql){
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($id,$table){
			$sql = "SELECT * FROM $table where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
	}
	
?>	

