<?php
    include "../sipimini/Clases/Controller.php";
    include "../sipimini/Modelos/Seguimiento.php";
    include "../../api/conexion/conexion.php";
    session_start();
    $usuario=base64_decode($_SESSION['usuario']);
    $user_id = $conn->consulta("SELECT id_usuario FROM usuarios WHERE usuario = '$usuario'");
    class Seguimientos extends Controller
    {
        public function index()
        {
            $tracking = new Seguimiento;
            $paquetes = $tracking->get_All_Trackings($user_id);
            echo $tracks;
        }
    }
