
<?php
    //El index muestra la salida de las vistas al usuario, tambien a travez de él enviaremos las distintas acciones que un usuario envíe al controlador

    //require_once establece el codigo del archivo a utilizar

    require_once "controllers/controller.php";
    require_once "models/model.php";

    $mvc = new MvcController();
    $mvc -> plantilla();

?>