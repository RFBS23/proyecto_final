<div style="position: relative;">
    <img src="../assets/img/logo.png" alt="Logo del colegio" style="position: absolute; top: 10px; left: 10px; width: 100px; height: auto;">
    <h1 class="text-center text-md mb-4 mt-3">Reporte de colegio</h1>
    <h3 class="text-center text-md">"Circulo de Estudio Olympus"</h3>
</div>
 
<table class="table table-border text-center">
    <colgroup>
        <col style="width: 25% ;">
        <col style="width: 25% ;">
        <col style="width: 25% ;">
        <col style="width: 25% ;">
 
    </colgroup>
    <thead class="tablasAsistenciaE">
        <tr>
        <th>ID</th>
        <th>Apellidos</th>
        <th>Nombres</th>
        <th>Estado</th>
        </tr>            
    </thead>
    <tbody>
       
    <?php foreach($data as $Alumno): ?>
        <tr>
     
            <td><?=$Alumno['idasistencia']?></td>
            <td><?=$Alumno['Apellidos']?></td>
            <td><?=$Alumno['Nombres']?></td>         
            <td><?=$Alumno['Estado']?></td>  
        </tr>
 
    <?php endforeach;?>
   
    </tbody>
 
</table>