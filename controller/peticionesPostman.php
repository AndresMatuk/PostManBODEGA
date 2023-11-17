<?php
    require_once("../conexion.php");
    require_once("../models/funciones.php");

    $funciones =new Funciones();
    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GetAll":
            $datos=$funciones->get_All();
            echo json_encode($datos);
        break;
        case "GetId":
            $datos=$funciones->get_All_innerJoins($body["codigoProducto"]);
            echo json_encode($datos);
        break;
        case "insert":
            $datos=$funciones->insert_funcion($body["nombreProducto"],$body["precio"],$body["cantidad"],$body["fechaExp"]);
            echo ("subido correctamente");
        break;

        case "Update":
            $datos=$funciones->update_funcion($body["codigoCliente"],$body["cantidadPago"],$body["cantidadCompra"]);
            echo ("Upgradeado correctamente");
        break;

        case "Delete":
            $datos=$funciones->delete_funcion($body["codigoCliente"]);
            echo "eliminado correctamente";
        break;
    }
?>