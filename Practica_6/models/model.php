
<?php
class EnlacesPaginas
{
    public function enlacesPaginasModel($enlacesModel)
    {
        if (
            $enlacesModel == "reservaciones" ||
            $enlacesModel == "habitaciones" ||
            $enlacesModel == "habitacion_create" ||
            $enlacesModel == "habitacion_update" ||
            $enlacesModel == "clientes" ||
            $enlacesModel == "cliente_create" ||
            $enlacesModel == "cliente_update" ||
            $enlacesModel == "delete" 
        ) {
            $module = "views/modules/" . $enlacesModel . ".php";
        } else if ($enlacesModel == "index") {
            
				if ($_SESSION['tipo_sesion'] == 'admin')
                $module = "views/modules/inicio.php";
				else if ($_SESSION['tipo_sesion'] == 'receptionist')
                $module = "views/modules/reservaciones.php";
		
        } else {
            $module = "views/modules/inicio.php";
        }
        return $module;
    }
}
?>