<?php
    class Funciones extends Conectar{
        public function get_All(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM `cliente`";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function get_All_innerJoins($codigoProducto){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT cliente.nombreCliente, productos.nombreProducto, cliente.cantidadCompra, cliente.cantidadPago, productos.fechaExp  FROM `productos` inner join `cliente` where productos.codigoProducto = cliente.FK_codigoProducto and codigoProducto = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $codigoProducto);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function insert_funcion($nombreProducto,$precio,$cantidad,$fechaExp){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO productos (nombreProducto, precio, cantidad, fechaExp) VALUES (?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombreProducto);
            $sql->bindValue(2, $precio);
            $sql->bindValue(3, $cantidad);
            $sql->bindValue(4, $fechaExp);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function update_funcion($codigoCliente,$cantidadPago,$cantidadCompra){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE cliente SET cantidadPago = ?, cantidadCompra = ? WHERE codigoCliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cantidadPago);
            $sql->bindValue(2, $cantidadCompra);
            $sql->bindValue(3, $codigoCliente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function delete_funcion($codigoCliente){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM cliente WHERE codigoCliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $codigoCliente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>