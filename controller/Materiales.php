<?php

    if($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();  
    }

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/materiales.php");
    $materiales = new Materiales();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["opc"]){

        case "GetMateriales":
            $datos=$materiales->get_materiales();
            echo json_encode($datos);
        break;

        case "GetMateriale":
            $datos=$materiales->get_materiale($body["ID"]);
            echo json_encode($datos);
        break;
        
        case "InsertMateriales":
            $datos=$materiales->insert_materiales($body["DESCRIPCION"],$body["UNIDAD"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"]);
            echo json_encode("Material Insertado");
        break;

        case "UpdateMaterial":
            $datos=$materiales->update_materiales($body["ID"],$body["DESCRIPCION"],$body["UNIDAD"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"]);
            echo json_encode("Material Actualizado");
        break;

        case "DeleteMaterial":
            $datos=$materiales->delete_Material($body["ID"]);
            echo json_encode("Material del Cliente Eliminado");
        break;



    }

?>