<?php
  //DATOS A LA CONEXION CON LA BASE DE DATOS
  include ("conexion_bbdd.php");

  function Obtener_datos(){

        //GENERO UNA NUEVA CONEXION A LA BASE DE DATOS
        $conn = Connect_BBDD();


        //CONSULTA QUE ME DA TODOS LOS REGISTROS DE LA TABLA ITEMS_COMPRA        
        $sql = "SELECT * FROM items_compra";

        //EJECUTO LA CONSULTA
        $resultado = $conn->query($sql);

        //VARIABLE DONDE GUARDARE LOS VALORES DE LA TABLA 
        //TAMBIEN GUARDARE EL TEXTO HTML PARA GENERAR LA TABLA EN INDEX.PHP
        $datos_lista=[];

        if ($resultado->num_rows > 0) {

                $titulos_tabla = "<table border ='1px'>
                                <tr>
                                    <th>id</th>
                                    <th>Item</th>
                                    <th>Stock</th>
                                    <th>Eliminar</th>
                                </tr>";


                  $str_TABLA_HTML="";

                  while($fila = $resultado->fetch_assoc()) {

                      array_push($datos_lista, $fila);  //VOY RELLENANDO EL ARRAY CON LOS VALORES DE LA TABLA
                     
                      //VOY GENERANDO LA TABLA HTML PARA IMPRIMIR EN EL INDEX.PHP
                      $str_TABLA_HTML =  $str_TABLA_HTML."<tr>    
                            <td>".$fila['id']."</td>
                            <td>".$fila['item']."</td>
                            <td>".$fila['stock']."</td>                         
                            <td><a class='link_elimina' href = 'db/eliminar_item.php?id=".$fila['id']."'>Eliminar item</a></td>
                            </tr>";
                }

            }else{

              echo "No hay nada en la lista de la compra...";
            }

            $conn->close();
            //RETORNO ARRAY CON LOS DATOS DE LOS REGISTROS Y CON LA TABLA HTML PARA IMPRESION
            return [$datos_lista , $titulos_tabla.$str_TABLA_HTML."</table>" ];
  }


 ?>
