<?php
include_once '../../modelos/Producto.php';
header("Content-type:application/json; charset=utf-8");

$metodo = $_SERVER['REQUEST_METHOD'];
$tipo = $_REQUEST['tipo'];
try {
    switch ($metodo) {
        case 'POST':
            $producto = new Producto($_POST);
            if($tipo == 1){
                $resultado = $producto->guardar();
                $mensaje = "Guardado correctamente";
            }
            if($resultado){
                echo json_encode([
                    "mensaje" => $mensaje,
                    "codigo" => 1,
                ]);
            }else{
                echo json_encode([
                    "mensaje" => "ocurrio un error",
                    "codigo" => 0,
                ]);
            }
            break;
        case 'GET':
            break;
    }
}catch (Exception $e){
    echo json_encode([
        "detalle" => $e->getMessage(),
        "mensaje" => "error de ejecucion",
        "codigo" => 0,
    ]);
}

exit;