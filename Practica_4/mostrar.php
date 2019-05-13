<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Clientes</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

    <div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
    <div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Listado de  <b>Clientes</b></h4>
					<!-- /.box-title -->
		
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
						<!-- eNCABEZADOS DE LA PAGINA -->
							<tr>
                            <th>Nombres</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
						    <th>E-mail</th>
                            <th>Acciones</th>
							</tr>
						</thead>
						<tfoot>
						<!-- PIE DE LA PAGINA -->
							<tr>
                            <th>Nombres</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
						    <th>E-mail</th>
                            <th>Acciones</th>
							</tr>
						</tfoot>
                      
                        <?php 
				include ('database.php');
				$clientes = new Database();
				$listado=$clientes->read();
				?>
						<tbody>
						<?php 
						// sE LLAMA A LA FUNACION Y REGRESA EL CONTENIDO DE LA TABLA DE CLIENTES
					while ($row=mysqli_fetch_object($listado)){
						$id=$row->id;
						$nombres=$row->nombres." ".$row->apellidos;
						$telefono=$row->telefono;
						$direccion=$row->direccion;
						$email=$row->correo_electronico;
				?>
				<!-- FILA DE LA TABLA -->
					<tr>
                        <td><?php echo $nombres;?></td>
                        <td><?php echo $telefono;?></td>
                        <td><?php echo $direccion;?></td>
						<td><?php echo $email;?></td>
                        <td>
						    <a href="update.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="delete.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>	
				<?php
                    }
				?>  
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
</div>
</div>
</div>
</div>

	

</body>
</html>                            