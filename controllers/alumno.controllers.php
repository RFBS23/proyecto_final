<?php
require_once '../models/alumnos.models.php';
if (isset($_GET['operacion'])){
  $alumno = new Alumno();
  
  if ($_GET['operacion'] == 'listarEstudiante'){
      $data = $alumno->listarEstudiantes();
      if ($data){
          foreach ($data as $registro) {
              echo "<option value='{$registro['nivelacceso']}'>{$registro['nivelacceso']}</option>";
          }
      }
  }

}
?>