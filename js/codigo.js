$(document).ready(function(){
			var divadd = $(".add");
			var divblur = $(".blur");
			var w = ($(window).width() / 2) - (divadd.width() /2 );
   			var h = ($(window).height() / 2) - (divadd.height() /2 );
   			var listado = document.getElementById("listado");   		
   			divadd.css({"left": w +"px" , "top": h + "px"});
   			$("#modificar").hide();

   		//--------------------------------------
   			var txtbuscar = $("input[name=buscar]");
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
			var nombre = $("input[name=nombre]");
   			var apellidos = $("input[name=apellidos]");
   			var puesto = $("input[name=puesto]");
   			var fechainicio = $("input[name=fechainicio]");
   			var id = $("input[name=id]");
   			var frmInputs = $("#frmañadir input[type=text], #frmañadir input[type=date]");

			function limpiar_form()
			{			
				frmInputs.each(function(){ 
					$(this).val(""); 
				});
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
		    		frmInputs.removeClass('error');
		    		cerrar_ventana();
		    });
		//--------------------------------------
			var valido = true;
			$('#añadir').click(function(){
				
				frmInputs.each(function(){
					if ($(this).val() == "")
					{
						$(this).addClass("error")
						valido = false;
					}
					else
					{
						$(this).removeClass("error")
						valido = true;
					}
				});

				if (valido)
				{
					$.ajax({
						url: "php/insert.php",
						type: "POST",
						processData: false,
	      				contentType: false,
	      				cache: false, 
						data: new FormData($("#frmañadir")[0]),
						success: function(data){	
							$('table > tbody:last-child').append(data);
							cerrar_ventana();
						},
						error: function(){} ,
					});
				} 
				else
				{
					alert("No pueden quedar campos vacios.");
				}			
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
						error: function(){} ,
					}); 						
			}); 
		//----------------------------------------	
<<<<<<< HEAD
			$(document).on("click", "td>#btneliminar", function(){
					var este = $(this);
					var img = $(this).parents("tr").find("td").eq(0).children("img").attr("src");
					var borrar = confirm("¿Deseas eliminar este trabajador de la Base de datos?");
					if (borrar)
					{
						$.ajax({
						url: "php/delete.php",
						type: "POST",
						dataType: "HTML",
						data: "id="+$(this).data("id")+"&img=" + img,
						success: function (data){
							este.parent().parent().remove();
							cerrar_ventana();
							thCountTrabaj.text(txtTotTrab+data);
						},
					});
					}								
				});	
=======
			
			var btneliminar	= $("button#btneliminar");
			var modalbtnborrar = $("div.modal-footer>button#btnborrar");
		

			$(document).on("click","button#btneliminar", function(){
				var id = $(this).data("id");
				var img = $(this).parents("tr").find("td").eq(0).children("img").attr("src");
				modalbtnborrar.removeData("id");
				modalbtnborrar.attr("data-id",id);
				modalbtnborrar.attr("data-img",img);
				$("div.modal-body").html("<img src=" + img + ">");
				$("div.modal-body").append($(this).data("nombre"));
			});

			btneliminar.click(function(){
				
			});

			modalbtnborrar.click(function(){
				var id = $(this).data("id");
				var img = $(this).data("img");
				$(this).attr('data-id','');
				$.ajax({
						url: "php/delete.php",
						type: "POST",
						dataType: "HTML",
						data: "id="+ id +"&img=" + img,
						success: function (data){
							$("button[data-id="+id+"]").parent().parent().remove();
						}
					});
				});

>>>>>>> Mejor eliminar, y diseño
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
				fechainicio.val(fecha);

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