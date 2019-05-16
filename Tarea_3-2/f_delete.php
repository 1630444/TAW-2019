<?php 
if (isset($_GET['id'])){
	// Se incluye el archivo de base de dtos
	include('f_database.php');
	// Se instancia la clase
	$futbolista = new Database();
	// Se toma el id mandado en la url
	$id=intval($_GET['id']);
	$res = $futbolista->delete($id);
	//Si es correcto se dirige al index
	if($res){
		header('location: f_index.php');
	}else{
		echo "Error al eliminar el registro";
	}

}
?>