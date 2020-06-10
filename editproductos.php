<?php

include('cors.php');
include('conexion.php');
$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$nombre = $data['nombre'];
$referencia = $data['referencia'];
$precio = $data['precio'];
$peso = $data['peso'];
$categoria = $data['categoria'];
$stock = $data['stock'];
$create_at = $data['create_at'];
$frcha_ultima_venta = $data['frcha_ultima_venta'];
$modelo = new Conexion();
$db = $modelo->getConexion();
 
 $sql = "UPDATE porducto set(nombre = '$nombre', referencia = '$referencia', precio = '$precio', peso = '$peso', categoria = '$categoria', stock = '$stock', create_at = '$create_at', frcha_ultima_venta= '$frcha_ultima_venta' WHERE id=$id";

$query = $db->prepare($sql);
$query->execute();
echo "actualizado";

?>