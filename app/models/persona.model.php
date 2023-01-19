<?php
require_once "./app/config/connection.php";

class usuario extends Connection
{
    public static function mostrarDatos()
    {
        try{
            $sql = "SELEC * FROM usuario";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
         } catch (PDOException $th){
                echo $th->getMessage();

            }
        }
    
            public static function obtenerDatos($id){
                try {
                   $sql = "SELECT * FROM usuario WHERE id= :id";
                   $stmt = Connection::getConnection()->prepare($sql);
                   $stmt ->bindParam(':id', $id);
                   $stmt-> execute();
                   $result = $stmt->fetch();
                   return $result;

                } catch (PDOException $th) {
                    echo $th->getMessage();
                }
            }
            
            public static function guardarDato($data){
                try {
                    $sql = "SELECT * FROM usuario (nombre, apellido, email) VALUES (:nombre. :apellido, :email)";
                    $stmt = Connection::getConnection()->prepare($sql);
                    $stmt ->bindParam(':nombre', $data[ 'nombre']);
                    $stmt ->bindParam(':apellido', $data[ 'apellido']);
                    $stmt ->bindParam(':email', $data[ 'email']);
                    $stmt-> execute();
                    return true;
 
                } catch (PDOException $th) {
                    echo $th->getMessage();
                }
            }
            public static function actualizarDato($data){
                try {
                    $sql = "UPDATE usuario SET nombre = :nombre, apellido=:apellido, email=:email WHERE id =:id";
                    $stmt = Connection::getConnection()->prepare($sql);
                    $stmt ->bindParam(':nombre', $data[ 'nombre']);
                    $stmt ->bindParam(':apellido', $data[ 'apellido']);
                    $stmt ->bindParam(':email', $data[ 'email']);
                    $stmt ->bindParam(':id', $data[ 'id']);
                    $stmt-> execute();
                    return true;
 
                } catch (PDOException $th) {
                    echo $th->getMessage();
                }
            }
            public static function eliminarDato($id){
                try {
                    $sql = "DELATE FROM usuario WHERE id =:id";
                    $stmt = Connection::getConnection()->prepare($sql);
                    $stmt ->bindParam(':id', $id);
                    $stmt-> execute();
                    return true;
 
                } catch (PDOException $th) {
                    echo $th->getMessage();
                }
            }


        
    
}