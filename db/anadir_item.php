<?php
    //DATOS A LA CONEXION CON LA BASE DE DATOS
    include ("conexion_bbdd.php");

    if ($_POST!=null){

        if($_POST['item']!=null or $_POST['stock']!=null){
            //HAY POST Y CAMPOS LLENOS
            echo "ok <hr>";

            //SANEO LOS VALORES QUE RECIBO POR POST DESDE EL FORMULARIO 
            //INDEX.PHP

            $_item = filter_var(strtolower(trim($_POST['item'])), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
            $_stock = filter_var($_POST["stock"], FILTER_SANITIZE_NUMBER_INT);

            //CREO UNA CONEXION NUEVA A LA BASE DE DATOS
            //LLAMANDO A LA FUNCION QUE ESTA DENTRO DEL FICHERO CONEXIO_BBDD.PHP 
            $conn= Connect_BBDD();

            //GENERO LA CONSULTA PARA INSERTAR UN NUEVO REGISTRO EN LA TABLA
            //USANDO LOS VALORES RECIBIDOS POR POST Y SANEADOS
            $_sql_Insert = "INSERT INTO `items_compra`
                            (`item`, `stock`)
                            VALUES ('$_item', '$_stock');";



            //COMPRUEBO QUE LA CONSULTA FUE CORRECTA
            //SI TODO FUE BIEN ENVIO A INDEX.PHP Y MATO TODO LOS PROCESOS DE ESTE PHP            
            if ($conn->query($_sql_Insert) === TRUE) {
              echo "Item en la lista.";
              header("Location: ..");
              die();

            } else {  //SI LA CONSULTA NO FUE BIEN MUESTRO UN MSJ DE ERROR
                      //MOSTRANDO LA CONSULTA Y EL ERROR QUE DA
              echo "Error algo fuen mal en la Insercion nuevo Item :<hr> " . $_sql_Insert . "<hr>" . $conn->error. "<hr>";
            }


            //CIERRO LA CONEXION A LA BASE DE DATOS
            $conn->close(); 



        }else{    //ALGUNO DE LOS CAMPOS ITEM O STOCK ESTA VACIO
          echo "CAMPOS VACIOS ";
        }

    }else{      //NO RECIBO NADA POR EL METODO POST
        echo "NO RECIBO NADA POR POST";
    }






 ?>
