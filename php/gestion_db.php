<?php
		class db_pruebas
		{
			var $conexion;

			function __construct()
			{
				try {
              			$this->conexion = new PDO('mysql:host=mysql-netsergi.alwaysdata.net;dbname=netsergi_pruebas', 'netsergi_user01','12345');
              			$this->conexion->exec("set names utf8");
            		} 
        		catch (PDOException $e) {
              			echo $e->getMessage();
            		}
			}

			function listar($cadena=null,$campo=null)
			{
				if (isset($cadena))
				{
					$sql = 'select * from trabajadores where nombre like "'.$cadena.'%"';
				}
				else
				{
					$sql = 'select * from trabajadores';
				}

				if (isset($campo)) 
				{
					$sql = 'select * from trabajadores order by '.$campo.' ASC';
				}

				$listado = $this->conexion->prepare($sql);
				$listado->setFetchMode(PDO::FETCH_ASSOC);
				$listado->execute();
				return $listado;
			}

			function insertar($nombre,$apellidos,$puesto,$fechainicio,$img)
			{
				$sql = "insert into trabajadores (nombre,apellidos,puesto,fecha_inicio,img)
      	 		 values ('".$nombre."','".$apellidos."','".$puesto."','".$fechainicio."','img/".$img."');";
      	 		$insertar = $this->conexion->prepare($sql);
	  	 		$insertar->execute();
			}

			function modificar($nombre,$apellidos,$puesto,$fechainicio,$img,$id)
			{
				$sql = "update trabajadores set nombre ='".$nombre."', apellidos='".$apellidos."', puesto='".$puesto."', fecha_inicio='".$fechainicio."', img='img/".$img."' where id= :id;";
      	 		$insertar = $this->conexion->prepare($sql);
      	 		$insertar->bindParam(':id', $id, PDO::PARAM_INT);
	  	 		$insertar->execute();
			}

			function borrar($id)
			{
				$sql = "delete from trabajadores where id = :id";
				$borrar = $this->conexion->prepare($sql);
				$borrar->bindParam(':id', $id, PDO::PARAM_INT);
				$borrar->execute();
			}

			function obtener_lastID()
			{
				$trabajadores = $this->listar();
				return $trabajadores->rowCount();
			}
	
		}
?>