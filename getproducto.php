<?php
include('cors.php');
include('conexion.php');
$array=array();
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];

$modelo = new Conexion();
 $db = $modelo->getConexion();

 $sql = 'SELECT porducto.id, porducto.nombre, porducto.referencia, porducto.precio,porducto.peso, categorias.nombre AS Categoría , porducto.stock, porducto.create_at, porducto.frcha_ultima_venta FROM porducto INNER JOIN categorias ON porducto.categoria = categorias.id WHERE porducto.id = "$id"';

 $query = $db->prepare($sql);
 $query->execute();
   
while ($fila = $query->fetch()) {
    $array[] = array(
        'id' => $fila['id'],
        'nombre' => $fila['nombre'],
        'referencia' => $fila['referencia'],
        'precio' => $fila['precio'],
        'peso' => $fila['peso'],
        'Categoría' => $fila['Categoría'],
        'stock' => $fila['stock'],
        'Fecha Creción' => $fila['create_at'],
        'Fecha última venta' => $fila['frcha_ultima_venta']
    );
}

$json = json_encode($array);

echo $json;

  ?>