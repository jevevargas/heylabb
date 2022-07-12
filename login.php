<?php

session_start();

    require_once('app/config/conexion.php');
     sleep(3);
     //$usuario=mysqli_real_escape_string($enlace,$_POST['usuario']); 
      $clave=($_POST['clave']);
      $usuario=($_POST['usuario']);
       //$usuario=utf8_encode($usuario);
         $usuario=utf8_encode($usuario);
         $clave=utf8_encode($clave);


         $sql = "SELECT * FROM usuario WHERE  nombre='$usuario' AND pass='$clave' "; 
         $query =$pdo -> prepare($sql); 
         $query -> execute(); 
         $results = $query -> fetchAll(PDO::FETCH_OBJ); 
         
         if($query -> rowCount() > 0)   { 
         foreach($results as $result) { 
            $_SESSION['idusuario']=$result -> idusuario;
            $_SESSION['nombre']=$result -> nombre;
            $_SESSION['idtipousuario']=$result -> idtipousuario;
            $_SESSION['idcomercio']=$result -> idcomercio;
            $_SESSION['nombrecompleto']=$result -> nombrecompleto;
               echo 1;
            } 
               
            }elseif($query -> rowCount() == 0){
                echo 0;  
            }
        



?>