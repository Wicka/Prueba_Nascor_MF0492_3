<?php

function Connect_BBDD(){


    //DATOS DE CONEXION A LA BASE DE DATOS
      $servidor     = "localhost";
      $basededades  = "pruebapractica";
      $usuari       = "pruebapractica";
      $contrasenya  = "pruebapractica";

      //CONEXION BBDD CON LOS PARAMETROS
      $conn = new mysqli($servidor, $usuari, $contrasenya, $basededades);

      // COMPROBACION DE LA  CONEXION
      if ($conn->connect_error) {
          echo "Fallo en la connexión : ".$conn->connect_error;
          header("Location:..");
          die();
      }else{
      //    echo "Conexion a BBDD ok <br><hr><br>";
      }
      return $conn;
}

 ?>
