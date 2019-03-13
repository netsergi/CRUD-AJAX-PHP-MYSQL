<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Listado usuarios</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
<<<<<<< HEAD
=======
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
>>>>>>> Mejor eliminar, y diseño
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<?php include ('php/gestion_db.php'); 
	  header('Content-Type: text/html; charset=utf-8');
	  $db = new db_pruebas(); 
	  $trabajadores = $db->listar();	
	?>
	<div class="panel w3-dark-grey">
		<button id="btnañadir" class="w3-button w3-blue w3-round-xlarge "><b>Añadir trabajador</b></button>
		<div>
			<label>Buscar trabajador</label>
			<input type="text" name="buscar" />
		</div>
		<h1>Listado de trabajadores</h1>
	</div>
	<div id="divadd" class="add w3-card w3-panel">
<<<<<<< HEAD
		<img  src="img/trabajador.png" /><spam class="titadd">Añadir nuevo trabajador</spam>
		<spam class="btncerrar w3-badge w3-red">x</spam>	
		<hr>
		<form class="w3-container" id="frmañadir" enctype=”multipart/form-data” >
=======
		<img  src="img/Userimg.png" /><spam class="titadd">Añadir nuevo trabajador</spam>
		<spam class="btncerrar w3-badge w3-red">x</spam>	
		<hr>
		<form class="w3-container" id="frmañadir" enctype="multipart/form-data" >
>>>>>>> Mejor eliminar, y diseño
			<input name="id" type="text" hidden>
			<label>Nombre</label>
			<input name="nombre" id="nombre" class="w3-input w3-border w3-round" type="text" data-validation="length"  required>
			<label>Apellidos</label>
			<input name="apellidos" class="w3-input w3-border w3-round" type="text" required>
			<label>Puesto</label>
			<input name="puesto" class="w3-input w3-border w3-round" type="text" reuired>
			<label>Fecha contratación</label>
			<input name="fechainicio" class="w3-input w3-border w3-round" type="date" required>
			<label>Añadir fotografia</label>
			<input id="imagen" name="imagen" size="30" type="file" />
			<hr>
			<input id="añadir" type="submit" class="w3-button w3-green" value="Añadir">
			<input id="modificar" type="submit" class="w3-button w3-red" value="Modificar">
		</form>
	</div>
<<<<<<< HEAD
=======

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Eliminar trabajador</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        ...
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <button id ="btnborrar" type="button" data-dismiss="modal" class="btn btn-primary">Eliminar</button>
	      </div>
	    </div>
	  </div>
	</div>

>>>>>>> Mejor eliminar, y diseño
	<div id="listado" class="contenedor">
		<table class="w3-table w3-table-all">
			<thead>
				<tr>
					<th>Foto</th>
					<th><a id="nombre" href=#>Nombre</a></th>
					<th><a id="apellidos" href=#>Apellidos</a></th>
					<th><a id="puesto" href=#>Puesto</a></th>
					<th><a id="fecha_inicio" href=#>Fecha contratación</a></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php while ($trabajador = $trabajadores->fetch())  : ?>
					<tr>
						<td><img src="<?php echo $trabajador['img']; ?>" /></td>
						<td><?php echo $trabajador['nombre']; ?></td>
						<td><?php echo $trabajador['apellidos']; ?></td>
						<td><?php echo $trabajador['puesto']; ?></td>
						<td><?php $fecha = new dateTime($trabajador['fecha_inicio']);
								   echo date_format($fecha, 'd-m-Y'); ?>								
						</td>
						<td>
<<<<<<< HEAD
							<button type="button" id="btneliminar" data-id="<?php echo $trabajador['id']; ?>" class="w3-button w3-red w3-round-xlarge "><b>Eliminar trabajador</b></button>
							<button type="button" id="btneditar"  data-id="<?php echo $trabajador['id']; ?>" class="w3-button w3-green w3-round-xlarge "><b>Editar trabajador</b></button>
=======
							<button type="button" id="btneditar"  data-id="<?php echo $trabajador['id']; ?>" class="btn  btn-success"><b><i class="fas fa-user-edit"></i></b></button>
							<button type="button" id="btneliminar" data-nombre="<?php echo $trabajador['nombre'] . "  " . $trabajador['apellidos']?>" data-id="<?php echo $trabajador['id']; ?>" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><b><i class="fas fa-user-minus"></i></b></button>
>>>>>>> Mejor eliminar, y diseño
						</td>
					</tr>	
				<?php endwhile ?>
			</tbody>
	    </table>
	</div>
	<script src="js/codigo.js"> </script>
<<<<<<< HEAD
=======
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
>>>>>>> Mejor eliminar, y diseño
</body>
</html>