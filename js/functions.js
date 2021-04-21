
//VERIFICO SI EL CAMPO ITEM ESTA VACIO Y SI LO ESTA ENVIO MENSAJE ERROR

function rellena_item(){

				var item = document.getElementById("item").value;
				if (item == "") {
						document.getElementById("msj_item").innerHTML = "Debes escribir un nombre";
					}else{
							document.getElementById("msj_item").innerHTML = "";
							return true;
					}
}

//VERIFICO SI EL CAMPO STOCK ESTA VACIO Y SI LO ESTA ENVIO MENSAJE ERROR

function rellena_stock(){
		var stock = document.getElementById("stock").value;
		if (stock == "") {
				document.getElementById("msj_stock").innerHTML = "Debes escribir una cantidad";
				}else{
							document.getElementById("msj_stock").innerHTML = "";
							return true
			}
}

//VERIFICO QUE LAS FUNCIONES QUE CONTROLAN LOS CAMPOS TENGAN ALGUN VALOR
//ME DEN TRUE Y ASI PERMITIR EL ENVIO POR POST DEL FORMULARIO
//CON SUBMIT A db/anadir_lista.php PARA INSERTAR EN TABLA
//Y LUEGO MOSTRAR EN INDEX.PHP

function valida_form(){
	if (rellena_item()&& rellena_stock()){
			//	AMBOS CAMPOS RELLENADOS SIN ERRORES
			return true;
	}else{
		//	CAMPOS SIN RELLENAR
		return false;
	}
}

//VERIFICO MEDIANTE AJAX QUE EL CAMPO QUE INTRODUCEN EN EL CAMPO
//ITEM NO SE ENCUENTRE EN LA TABLA YA GUARDADO
//SI EXISTE MUESTRO UN MENSAJE QUE EL ARTICULO YA ESTA EN LA LISTA
//TANTO SI EXISTE COMO SI NO PERMITO QUE SE AÑADA EN LA TABLA

function item_repetido(){

			var existe =  $.ajax({
					url: "db/check_item.php",				//FICHERO DONDE REALIZO LA CONSULTA A LA TABLA MEDIANTE SQL
					data: {item:$("#item").val()},			//NOMBRE DEL POST Y SU VALOR QUE SERA EL QUE ENVIE A CHECK_ITEM.PHP
					type: "POST",							//METODO POR EL QUE LE ENVIO EL VALOR DE DATA 

					success: function(existe){	
							if (existe == 0){				//SI RECIBO UN 0 ES QUE NO ENCONTRE EL ITEM EN LA TABLA DE LA BBDD
										$("#msj_item").html("");		//NO MUESTRO MSJ Y BORRO SI HUBIERA UNO

							}else if(existe == 1){			//SI RECIBO UN 1 ES QUE EXISTE EL ITEM EN LA TABLA DE LA BBDD
										$("#msj_item").html("Este articulo : " + $("#item").val() + " ya esta introdcucido en la lista");
										//MUESTRO UN MSJ AVISANDO QUE EXISTE YA UN ITEM CON ESE NOMBRE EN LA TABLA DE LA BBDD
							}
					},

					error:function (){			//ALGO OCURRIO MAL EN EL ACCESO A LOS DATOS MEDIANTE AJAX
			      	$("#msj_item").html("Ocurrio algo en la conexion a datos"); //
					}

		});
		
	  console.log(existe);
	  return existe;
}
