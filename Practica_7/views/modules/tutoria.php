<!--  /////////////// MODULO DE TUTORIAS ///////////////// -->
<!-- Recuadro -->
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title" style="margin-left: auto; margin-right: auto; font-size:25px; text-align: center;">Tutorias</h4>
        <hr>
        <!--/// Todo el contenido del recuadro ////-->

        <!-- Boton para agregar registro -->
        <div class="pull-right">
            <a href="index.php?action=tutoria_create" class="btn btn-success waves-effect waves-lights"><i class="fa fa-plus"></i> Agregar tutoria</a>
        </div>
        <br>
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <!-- Se ponen las cabezeras de la tabla -->
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Tipo</th>
                    <th>Tema</th>
                    <th>Maestro asignado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <!-- Se ponen el pie de la tabla, las mismcasque lascabezereas -->
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Tipo</th>
                    <th>Tema</th>
                    <th>Maestro asignado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>

            <?php
            // Se incluye la clase de base de datos, en donde se realia la conexion.
            // Se instancia la clase de la Base de datos
            $con = new Database();
            // Se llama a la funcion que regresa los registros de la tabla 
            $listado = $con->readTable('tutorias');
            ?>
            <tbody>
                <?php
                // Se recorre cada uno de los registros que halla regresado la consulta para poder consultar los datos de cada uno y guardarlos en variables individuales.
                while ($row = $listado->fetch(PDO::FETCH_OBJ)) {
                    $id = $row->id;
                    ?>
                    <tr>
                        <!-- Se agrega una fila -->
                        <td><?php echo $id; ?></td>
                        <td><?php echo $row->fecha; ?></td>
                        <td><?php echo $row->hora; ?></td>
                        <td><?php echo $row->tipo; ?></td>
                        <td><?php echo $row->tema; ?></td>
                        <td><?php echo $con->singleData($row->id_maestro,'maestros','apellido'); ?></td>
                        <td
                            <!--Botón para ira la carga de alumnos-->
                            <a class="btn btn-info waves-effect waves-light" title="Carga" data-toggle="tooltip" onclick="
                                            document.location.href = 'index.php?action=alumnos-tutoria&id=<?php echo $id; ?>'
                                            "><i class="fa fa-users"></i></a>
                            <!--Botón para modificar el registro-->
                            <a class="btn btn-warning waves-effect waves-light" title="Editar" data-toggle="tooltip" onclick="
                                            if(confirm('¿Seguro que desea modificar este registro?')){
                                                document.location.href = 'index.php?action=tutoria_update&id=<?php echo $id; ?>'
                                            }"><i class="fa fa-edit"></i></a>
                            <!--Botón para eliminar el registro-->
                            <a class="btn btn-danger waves-effect waves-light" title="Eliminar" data-toggle="tooltip" onclick="
                                            if(confirm('¿Seguro que desea eliminar este registro?')){
                                                document.location.href = 'index.php?action=delete&id=<?php echo $id; ?>&table=tutorias'
                                            }"><i class="fa fa-trash"></i></a>
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
<!-- /.col-xs-12 -->