<?php
		//MUESTRA_LISTA.PHP HACE CONSULTA A BBBDD PARA OBTENER LA TABLA CON TODOS SUS REGISTROS
		//TIENE UNA UNICA FUNCION LLAMADA OBTENER_DATOS() QUE DEVUELVE		
		//UN ARRAY CON LOS DATOS DE LA TABLA ITEMS_COMPRA Y CON LA TABLA HTML PARA IMPRIMIR EN PANTALLA	
		include ("db/muestra_lista.php");

		//GENERO UN FICHERO TXT DESDE LA TABLA ITEMS_COMPRA DE LA BASE DE DATOS 
		include ("db/generar_fichero_txt.php");
		
		//GUARDO LOS DATOS DE LA FUNCION QUE ESTA INCLUIDA EN MUSTRA_LISTA.PHP 
		//EN POSICION [0] ESTAN LOS REGISTROS DE LA TABLA ITEMS_COMPRA
		//EN POSICION [1] ESTA LA IMPRESION DE LA TABLA HTML CON LOS VALORES DE LA TABLA ITEMS_COMPRA
		$_datos = Obtener_datos();

 ?>
﻿<doctype html>
<html lang="es">

		<head>

				<meta charset="utf-8"/>
				<meta name="description" content="Prueba Modulo MF0492_3">
				<meta name="keywords" content="Prueba, EVAULACION">
				<meta name="author" content="Ester Mesa Pareja">

				<!-- ENLACE A CSS -->
				<link rel="stylesheet" href="css/style.css" type="text/css"/>

				<!-- google font -->
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

				<!-- ENLACE A JAVASCRIPT VALIDACIONES -->
				<script  type="text/javascript" src="js/functions.js"></script>
				<!-- ENLACE A JAVASCRIPT LIBRERIA JQUERY -->
				<script  type="text/javascript" src="js/jquery-3.6.0.min.js"></script>


				<title>Prueba MF0492_3 Ester Mesa Pareja</title>

		</head>

		<body>

				<header>
						<h1>Prueba Ester Mesa Pareja</h1>
						<h2>EVALUACION MMF0492_3</h2>
						<h3>21 Abril 2021</h3>
				</header>

				<section class ="contenedor">
							
                            <div id="div_formulario" class="division_vertical">
							
                            			<form onsubmit="return valida_form();" action="db/anadir_item.php" method="POST">
							
                            					<br>
												<label>Item :	<input  class="form_campos"  type="text" name="item" id="item"
																	placeholder="item" onblur="rellena_item();" oninput="item_repetido()">
												</label>
												<p class="p_form_error" id="msj_item"></p>
												<br><hr><br>

												<label>Stock : 		<input  class="form_campos"  type="number" name="stock" id="stock"
																		placeholder="stock" onblur="rellena_stock();">
												</label>
												<p class="p_form_error" id="msj_stock"></p>
												<br><hr>
												<div class="div_button"><input id="button" type="submit" name="enviar" value="ENVIAR"></div>
										</form>
							</div>
							<div class="fichero">

								<?php
										/*echo "<pre>";
										print_r($_datos[0]);
										echo "</pre>";*/
								
										//LLAMO AL FUNCION GENERA_LISTA QUE ESTA EN EL  FICHERO
										//GENERA_FICHERO_TXT.PHP
										//LE PASO COMO PARAMETRO LA POSICION [0] DEL ARRAY DATOS QUE TENGO DESDE QUE IMPRIMO LA TABLA EN EL INDEX.PHP
										//EL DATOS[0] ESTAN LOS VALORES DE LA TABLA ITEMS_COMPRA								
										echo genera_fichero_txt($_datos[0]);

								 ?>
								 		<br> <small>* Para descargar la lista clic Derecha > Guardar enlace como...</small>

							</div>
				</section>


				<section> 	<p>TABLA</p>
					<article>
						<?php
								echo $_datos[1];
						 ?>
				
					</article>



			<br><hr>

  		<footer>Practica Evaluativa Ester Mesa Pareja 2021</footer>

		</body>

</html>
