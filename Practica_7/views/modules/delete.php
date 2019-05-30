
<?php 
if (isset($_GET['id'])){
	$con = new Database();
    $id=intval($_GET['id']);
    $table=$_GET['table'];
	$res = $con->delete($id,$table);
	if($res){
		header("location: index.php?action=$table");
	}else{
		echo "Error al eliminar el registro";
	}

}
?>