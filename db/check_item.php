<?php
     //DATOS A LA CONEXION CON LA BASE DE DATOS
     include ("conexion_bbdd.php");

      //CREO UNA NUEVA CONEXION A LA BBDD
      $conn = Connect_BBDD();

      //COMPRUEBO QUE LA CONEXION A LA BASE DE DATOS NO TENGA NINGUN ERROR
      //Y SE HAYA REALIZADO CORRECTAMENTE
      if ($conn->connect_error) {
        return "DATABASE ERROR: ".$conn->connect_error;
        die();
      }

      if(!empty($_POST['item'])) { 
        //RECIBO ALGO POR EL METODO POST DESDE LA FUNCION DONDE TRABAJO CON AJAX 
        //ENVIO EL CAMPO ITEM DEL FORMULARIO DE INDEX.PHP
        //echo "item por post";
        
        $_item = $_POST['item'];

        //GENERO LA CONSULTA SELECT PARA TRAER TODOS LOS REGISTROS IGUALES AL ITEM QUE
        //RECIBO POR POST DESDE EL FORMULARIO Y ENVIO MEDIANTE AJAX DESDE FUNCIONES.JS
        $sql = "SELECT * FROM items_compra WHERE item='$_item'"; 

        //EJECUTO LA CONSULTA DE SELECCION PARA VER SI EL ITEM ESTA EN LA TABLA
        $result = $conn->query($sql);

        if ($result->num_rows == 0) { //NO EXISTE EN LA TABLA
          echo "0";

        }else{  //EXISTE EN TABLA 
          echo "1";
        }
      }else{
        //NO RECIBO NADA POR POST 
        //  echo "NO POST<hr>";
      }

      //CIERRO CONEXION
      $conn->close();
?>
