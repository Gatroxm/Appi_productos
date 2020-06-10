<?php 

class Conexion {
    public function getConection() {
        $usuario = "root";
        $password = "";
        try {
            $mbd = new PDO('mysql:host=localhost;dbname=inventario_productos', $usuario, $password);

        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return $mbd;
    }
}

?>