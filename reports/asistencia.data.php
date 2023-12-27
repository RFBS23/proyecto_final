<div style="position: relative;">
    <img src="../assets/img/logo.png" alt="Logo del colegio" style="position: absolute; top: 10px; left: 10px; width: 100px; height: auto;">
    <h1 class="text-center text-md mb-4 mt-3">Reporte de colegio</h1>
    <h3 class="text-center text-md">"Circulo de Estudio Olympus"</h3>
</div>
 
<table class="table table-border text-center">
    <colgroup>
        <col style="width: 50% ;">
        <col style="width: 50% ;">
 
    </colgroup>
    <thead class="tablasAsistenciaE">
        <tr>
        <th>Fecha</th>
        <th>Estado Asistencia</th>
        </tr>            
    </thead>
    <tbody>
       
    <?php foreach($data as $Alumno): ?>
        <tr>
     
            <td><?=$Alumno['Fecha']?></td>
            <td><?=$Alumno['EstadoAsistencia']?></td> 
        </tr>
 
    <?php endforeach;?>
   
    </tbody>
 
</table>