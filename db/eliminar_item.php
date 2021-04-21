<?php
      include ("conexion_bbdd.php");

        //SI RECIGO POR METODO GET EL ID DEL ITEM A ELIMINAR
      if(!isset($_GET['id'])){

        echo "NO HAY ID POR GET .<hr>";
        //TE REENVIO A INDEX.PHP
        header("Location: ..");
        die();

      }else{

        //SANEAR CAMPO  NUMERICO
        $_id =  filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

       //GENERO LA CONSULTA SQL DE ELIMINAR ITEMS DE LA TABLA ITEMS_COMPRA
        $_Sql_Delete ="DELETE FROM `items_compra`
                      WHERE `items_compra`.`id` = $_id;";

        //CREO UNA NUEVA CONEXION A LA BBDD
        $conn=Connect_BBDD();


        //VERIFICO QUE LA CONSULTA SE EJECUTA CORRECTAMENTE
        if ($conn->query($_Sql_Delete) === TRUE) {
          echo "Item Elimiado de la lista.";
          header("Location: ..");
          die();

        } else {
          echo "Error: " . $_Sql_Delete . "<hr>" . $conn->error;
        }

        //CIERRO LA CONEXION A LA BBDD
        $conn->close(); 



    }
 ?>
