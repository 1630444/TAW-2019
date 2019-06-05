
<?php
class EnlacesPaginas
{
    public function enlacesPaginasModel($enlacesModel)
    {
        if (
            $enlacesModel == "grupo" ||
            $enlacesModel == "grupo_create" ||
            $enlacesModel == "grupo_update" ||
            $enlacesModel == "materias-grupo" ||
            $enlacesModel == "materia" ||
            $enlacesModel == "materia_create" ||
            $enlacesModel == "materia_update" ||
            $enlacesModel == "alumnos-materia" ||
            $enlacesModel == "maestro" ||
            $enlacesModel == "maestro_create" ||
            $enlacesModel == "maestro_update" ||
            $enlacesModel == "alumno" ||
            $enlacesModel == "alumno_create" ||
            $enlacesModel == "alumno_update" ||
            $enlacesModel == "tutoria" ||
            $enlacesModel == "tutoria_create" ||
            $enlacesModel == "tutoria_update" ||
            $enlacesModel == "alumnos-tutoria" ||
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