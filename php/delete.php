<?php
      $id = $_POST['id'];
      $img = $_POST['img'];
      require_once('gestion_db.php');
      $db = new db_pruebas();
      $db->borrar($id);
<<<<<<< HEAD
      unlink(__DIR__.'\..\\'.$img);
      $numTrabaj = $db->obtener_lastID();
      echo $numTrabaj;
=======
      unlink(__DIR__.'/../'.$img);
      //$numTrabaj = $db->obtener_lastID();
      //echo $numTrabaj;
>>>>>>> Mejor eliminar, y diseño
      ?>
