$(document).ready(function(){
			var divadd = $(".add");
			var divblur = $(".blur");
			var w = ($(window).width() / 2) - (divadd.width() /2 );
   			var h = ($(window).height() / 2) - (divadd.height() /2 );
   			var listado = document.getElementById("listado");   		
   			var txtbuscar = $("input[name=buscar]");

   			var url = "";
   			var resultado ="";
   			var data = "";

   			var nombre = $("input[name=id]");
   			var apellidos = $("input[name=apellidos]");
   			var puesto = $("input[name=puesto]");
   			var fechainicio = $("input[name=fechainicio]");
   			var id = $("input[name=id]");

   			divadd.css({"left": w +"px" , "top": h + "px"});
   			$("#modificar").hide();

   		//--------------------------------------
   			txtbuscar.keyup(function(){
   				$.ajax({
					url: "php/buscar.php",
					type: "POST",
					dataType: "HTML",
					data: "cadena="+$(this).val(),
					success: function(data){
						$('table>tbody').html(data);
					},
					error: function(){} ,
				}); 		
   			});

   		//---------------------------------------
			$("#btnañadir").click(function(){
				$("#añadir").show();
				$("#modificar").hide();
				limpiar_form();
				$("spam.titadd").html ("Añadir trabajador");
				abrir_ventana();
			});

			var btneditar = $("table td>#btneditar");

			function limpiar_form()
			{
				id.val("");
				nombre.val("");
				apellidos.val("");
				puesto.val("");
				fechainicio.val("");
			}

			function comprobar_form()
			{
				if (nombre.val()==null)
				{
					return false;
				}
			}

			function abrir_ventana()
			{
				divblur.show();
				$(".contenedor").css("filter","blur(5px)");
				divadd.fadeIn('slow');
				$("td>button").prop("disabled",true);
			}

			function cerrar_ventana()
			{
				divadd.fadeOut('fast');
		    	$(".contenedor").css("filter","");
		    	divblur.hide();
		    	$("td>button").prop("disabled",false);
			}

		    $(".btncerrar").click(function(){
		    		cerrar_ventana();
		    });

		    function llamar_ajax(url, data, resultado)
			{
				$.ajax({
					url: url,
					type: "POST",
					data: data, 
					success: function(data){	
						resultado;
						cerrar_ventana();
					},
					error: function(){} ,
				}); 
			}
		//--------------------------------------
			$('#añadir').click(function(event){
				
				url = "php/insert.php";
				data = "new FormData($('#frmañadir')[0]);";
				resultado = "$('table > tbody:last-child').append(data);";
				llamar_ajax(url,data,resultado) 			
			}); 

			$("#frmañadir").submit(function(e){
					e.preventDefault();
			});

		//----------------------------------------
			$('#modificar').click(function(event){
					$.ajax({
						url: "php/modificar.php",
						type: "POST",
						processData: false,
	      				contentType: false,
	      				cache: false, 
						data: new FormData($("#frmañadir")[0]), 
						success: function(data){
							$('table>tbody').html(data);	
							cerrar_ventana();
						},
					}); 						
			}); 
		//----------------------------------------	
			$(document).on("click", "td>#btneliminar", function(){
					var este = $(this);
					var img = $(this).parents("tr").find("td").eq(0).children("img").attr("src");
					var borrar = confirm("¿Deseas eliminar este trabajador de la Base de datos?");
					if (borrar)
					{
						$url = "php/delete.php";
						$data = "id="+$(this).data("id")+"&img=" + img;
						$.ajax({
						url: "php/delete.php",
						type: "POST",
						dataType: "HTML",
						data: "id="+$(this).data("id")+"&img=" + img,
						success: function (data){
							este.parent().parent().remove();
							cerrar_ventana();
						},
					});
					}								
				});	
		//----------------------------------------
			function invertir_fecha(strfecha){
					return strfecha.slice(6,10) + "-" + strfecha.slice(3,5) + "-" + strfecha.slice(0,2);
				}
				
			$(document).on("click", "table td>#btneditar", function(){ 
				$("#añadir").hide();
				$("#modificar").show();
				id.val($(this).data("id"));
				nombre.val($(this).parents("tr").find("td").eq(1).text());
				apellidos.val($(this).parents("tr").find("td").eq(2).text());
				puesto.val($(this).parents("tr").find("td").eq(3).text());

				fecha = invertir_fecha($(this).parents("tr").find("td").eq(4).text().slice(0,10));
				$fechainicio.val(fecha);

				$("spam.titadd").html ("Editar trabajador");
				abrir_ventana();
			});
		//-----------------------------------------
			$("th>a").click(function(){
				var campo = $(this).attr("id");
				$.ajax({
					url: "php/listar_orden.php",
					type: "POST",
					dataType: "HTML",
					data: "campo="+campo,
					success: function(data){
						$('table>tbody').html(data);
					},
					error: function(){} ,
				}); 
			});
});