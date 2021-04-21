<?php

    //RECIBO LOS DATOS DE LA TABLA POR PARAMETRO
    function genera_fichero_txt($_items_compra){

        //GENERO VARIABLE DONDE GUARDO RUTA Y NOMBRE DEL FICHERO DONDE GUARDARE LA LISTA EN TXT
        $_archivo = "files/lista_compra.txt";

        //GENERO PUNTERO AL FICHERO, SI NO EXISTE LO CREARA
        $fp = fopen("files/lista_compra.txt", "w");

        //RECORRO LOS REGISTROS DE LA TABLA
        //POR CADA REGISTRO GENERO UN FILA DANDOLE FORMATO
        //Y LA AÑADO AL FICHERO CON UN SALTO DE LINEA.

        for ($i=0; $i < count($_items_compra); $i++){

            $indice=$i+1;

            $fila = $indice." .- ".$_items_compra[$i]['item']." - ".$_items_compra[$i]['stock']." unidades.";
        //    echo "Fila : ".$fila."<hr>";
            fwrite($fp, $fila.PHP_EOL);

        }

        //CIERRO EL FICHERO
        fclose($fp);

        //DEVUELVO UN ECHO DONDE PINTO EN INDEX.PHP EL ENLACE PARA DESCARGAR EL FICHERO GENERADO TXT
        return "<a href=".$_archivo.">Descargar</a>";
      }
 

 ?>
