<?php 
if (isset($_GET['id'])){
	// Se incluye el archivo de base de dtos
	include('b_database.php');
	// Se instancia la clase
	$basquetbolistas = new Database();
	// Se toma el id mandado en la url
	$id=intval($_GET['id']);
	$res = $basquetbolistas->delete($id);
	//Si es correcto se dirige al index
	if($res){
		header('location: b_index.php');
	}else{
		echo "Error al eliminar el registro";
	}

}
?>