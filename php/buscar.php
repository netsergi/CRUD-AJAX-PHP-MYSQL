<?php
	 require_once('gestion_db.php');
	 $db = new db_pruebas();
	 $cadena = $_POST['cadena'];
	 $resultado = $db->listar($cadena); 
	 while ($fila = $resultado->fetch())  : ?>
	        <tr><td><img src="<?php echo $fila['img']; ?>" /></td>
      		<td><?php echo $fila['nombre']; ?></td>
      		<td><?php echo $fila['apellidos']; ?></td>
      		<td><?php echo $fila['puesto']; ?></td>
      		<td><?php $fecha = new dateTime($fila['fecha_inicio']);
								   echo date_format($fecha, 'd-m-Y'); ?>	</td>
      		<td>
				<button type="button" id="btneliminar" data-id="<?php echo $fila['id']; ?>" class="w3-button w3-red w3-round-xlarge "><b>Eliminar trabajador</b></button>
				<button type="button" id="btneditar"  data-id="<?php echo $fila['id']; ?>" class="w3-button w3-green w3-round-xlarge "><b>Editar trabajador</b></button>
			</td>
			</tr>"; 
	 <?php endwhile ?> 