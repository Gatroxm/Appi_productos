<?php
include('cors.php');
include('conexion.php');
$data = json_decode(file_get_contents("php://input"), true);

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
 
 $sql = "INSERT INTO porducto(nombre, referencia, precio, peso, categoria, stock, create_at, frcha_ultima_venta) 
         VALUES(:nombre, :referencia, :precio, :peso, :categoria, :stock, :create_at, :frcha_ultima_venta)";

      $query = $db->prepare($sql);
      $query->bindParam(':nombre', $nombre);
      $query->bindParam(':referencia', $referencia);
      $query->bindParam(':precio', $precio);
      $query->bindParam(':peso', $peso);
      $query->bindParam(':categoria', $categoria);
      $query->bindParam(':stock', $stock);
      $query->bindParam(':create_at', $create_at);
      $query->bindParam(':frcha_ultima_venta', $frcha_ultima_venta);
      
      $query->execute();

echo "registrado";

 
?>