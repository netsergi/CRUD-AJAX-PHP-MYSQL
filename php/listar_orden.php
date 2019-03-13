<?php
	 require_once('gestion_db.php');
	 $db = new db_pruebas();
	 $campo = $_POST['campo'];
	 if(isset($campo))
	 {
	 	$resultado = $db->listar(null,$campo); 
	 }
	 else
	 {
	 	$resultado = $db->listar(); 
	 }
	 //$resultado = $db->listar(null,$campo); 
	 while ($fila = $resultado->fetch())  : ?>
	        <tr><td><img src="<?php echo $fila['img']; ?>" /></td>
      		<td><?php echo $fila['nombre'] ?></td>
      		<td><?php echo $fila['apellidos']; ?></td>
      		<td><?php echo $fila['puesto']; ?></td>
      		<td><?php $fecha = new dateTime($fila['fecha_inicio']);
								   echo date_format($fecha, 'd-m-Y'); ?>	</td>
      		<td>
<<<<<<< HEAD
				<button type="button" id="btneliminar" data-id="<?php echo $fila['id']; ?>" class="w3-button w3-red w3-round-xlarge "><b>Eliminar trabajador</b></button>
				<button type="button" id="btneditar"  data-id="<?php echo $fila['id']; ?>" class="w3-button w3-green w3-round-xlarge "><b>Editar trabajador</b></button>
=======
				<button type="button" id="btneditar"  data-id="<?php echo $fila['id']; ?>" class="btn  btn-success"><b><i class="fas fa-user-edit"></i></b></button>
				<button type="button" id="btneliminar" data-nombre="<?php echo $fila['nombre'] . "  " . $fila['apellidos']?>" data-id="<?php echo $fila['id']; ?>" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><b><i class="fas fa-user-minus"></i></b></button>
>>>>>>> Mejor eliminar, y diseño
			</td>
			</tr>"; 
	 <?php endwhile ?> 