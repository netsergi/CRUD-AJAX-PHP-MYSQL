<?php
      $nombre = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $puesto = $_POST['puesto'];
      $fechainicio = $_POST['fechainicio'];
      $id = $_POST['id'];
      $nombre_img = $_FILES['imagen']['name'];
      $tipo = $_FILES['imagen']['type'];
	  $tamano = $_FILES['imagen']['size'];
 
		//Si existe imagen y tiene un tamaño correcto
		if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000)) 
		{
		   //indicamos los formatos que permitimos subir a nuestro servidor
		   if (($_FILES["imagen"]["type"] == "image/gif")
		   || ($_FILES["imagen"]["type"] == "image/jpeg")
		   || ($_FILES["imagen"]["type"] == "image/jpg")
		   || ($_FILES["imagen"]["type"] == "image/png"))
		   {
		      // Ruta donde se guardarán las imágenes que subamos
		      $directorio = __DIR__.'/..//img/';
		      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
		      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
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

      require_once('gestion_db.php');
      $db = new db_pruebas();
      $db->modificar($nombre,$apellidos,$puesto,$fechainicio,$nombre_img,$id);		
      require_once('listar_orden.php');
?>