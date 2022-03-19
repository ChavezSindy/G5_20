<?php

    class Materiales extends Conectar{
        public function get_materiales(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql= "SELECT * FROM ma_materiales ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
           public function get_materiale($id){
               $conectar=parent::conexion();
               parent:: set_names();
               $sql= "SELECT * FROM ma_materiales WHERE ID = ?";
               $sql=$conectar->prepare($sql);
               $sql->bindValue(1 , $id);
               $sql->execute();
               return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
           }
       
           public function insert_materiales($descripcion, $unidad, $precio,$aplica_isv, $porcentaje_isv, $estado){
               $conectar=parent::conexion();
               parent::set_names();
               $sql="INSERT INTO ma_materiales(id,descripcion,unidad,precio,aplica_isv,porcentaje_isv,estado)
               VALUES (NULL,?,?,?,?,?,?);";
               $sql=$conectar->prepare($sql);
               $sql->bindValue(1,$descripcion);
               $sql->bindValue(2,$unidad);
               $sql->bindValue(3,$precio);
               $sql->bindValue(4,$aplica_isv);
               $sql->bindValue(5,$porcentaje_isv);
               $sql->bindValue(6,$estado);
               $sql->execute();
               return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
           }

           public function update_materiales($id, $descripcion, $unidad, $precio, $aplica_isv, $porcentaje_isv, $estado){
                $conectar= parent::conexion();
                parent::set_names();
                $sql="UPDATE ma_materiales SET descripcion=? , unidad=? ,precio=? , aplica_isv=? , porcentaje_isv=? , estado=?  WHERE ID=?";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $descripcion);
                $sql->bindValue(2, $unidad);
                $sql->bindValue(3, $precio);
                $sql->bindValue(4, $aplica_isv);
                $sql->bindValue(5, $porcentaje_isv);
                $sql->bindValue(6, $estado);
                $sql->bindValue(7, $id);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }


            public function delete_Material($id){
                $conectar= parent::conexion();
                parent::set_names();
                $sql="DELETE FROM ma_materiales  WHERE ID=?";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $id);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }
        
       
           
        


    }
    


  
?>

