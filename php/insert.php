<?php
      $nombre = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $puesto = $_POST['puesto'];
      $fechainicio = $_POST['fechainicio'];
<<<<<<< HEAD
      
      require_once('gestion_db.php');
      $db = new db_pruebas();
      	  
 	  function subirImagen()
 	  {
 	  	$nombre_img = $_FILES['imagen']['name'];
	  	$tipo = $_FILES['imagen']['type'];
	  	$tamano = $_FILES['imagen']['size'];
=======
      $nombre_img = $_FILES['imagen']['name'];
	       
      require_once('gestion_db.php');
      $db = new db_pruebas();
      	  
 	  
>>>>>>> Mejor eliminar, y diseño
 	  	if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000)) 
		{
		   //indicamos los formatos que permitimos subir a nuestro servidor
		   if (($_FILES["imagen"]["type"] == "image/gif")
		   || ($_FILES["imagen"]["type"] == "image/jpeg")
		   || ($_FILES["imagen"]["type"] == "image/jpg")
		   || ($_FILES["imagen"]["type"] == "image/png"))
		   {
		      // Ruta donde se guardarán las imágenes que subamos
<<<<<<< HEAD
		      $directorio = $_SERVER['DOCUMENT_ROOT'].'/AJAX ejemplo 2/img/';
		      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
		      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
=======
		      $directorio = __DIR__.'/..//img/';
		      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
		      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
		   
>>>>>>> Mejor eliminar, y diseño
		    } 
		    else 
		    {
		       //si no cumple con el formato
		       echo "No se puede subir una imagen con ese formato ";
		    }
		} 
		else 
		{
		   //si existe la variable pero se pasa del tamaño permitido
		   if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
		}
<<<<<<< HEAD
 	  }
=======
 	
>>>>>>> Mejor eliminar, y diseño
	  	
	  $db->insertar($nombre,$apellidos,$puesto,$fechainicio,$nombre_img);
	  $lastId = $db->obtener_lastID();
	  $fecha = new dateTime($fechainicio);
<<<<<<< HEAD
	  subirImagen();
=======
>>>>>>> Mejor eliminar, y diseño
      echo "<tr><td><img src='img/".$nombre_img."'/></td>
      		<td>". $nombre . "</td>
      		<td>". $apellidos . "</td>
      		<td>". $puesto . "</td>
      		<td>". date_format($fecha, 'd-m-Y') ."</td>
      		<td>
<<<<<<< HEAD
				<button type='button' id='btneliminar' name='". $lastId ."' class='w3-button w3-red w3-round-xlarge'><b>Eliminar trabajador</b></button>
				<button type='button' id='btneditar' name='". $lastId ."' class='w3-button w3-green w3-round-xlarge'><b>Editar trabajador</b></button>
			</td>
			</tr>";
=======
      			<button type='button' id='btneditar' data-id='".$lastId ."' data-nombre='".$nombre." ". $apellidos."' class='btn  btn-success'><b><i class='fas fa-user-edit'></i></b></button>
				<button type='button' id='btneliminar' data-toggle='modal' data-id='".$lastId ."' data-nombre='".$nombre." ". $apellidos."'  class='btn btn-danger' data-target='#exampleModal'><b><i class='fas fa-user-minus'></i></b></button>				
			</td>
			</tr>"; 
>>>>>>> Mejor eliminar, y diseño
?>