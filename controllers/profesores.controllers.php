<?php
    require_once  '../models/profesores.models.php';
    if (isset($_GET['operacion'])){
        $profesor = new Profesor();
        if ($_GET['operacion'] == 'listarProfesores'){
            $data = $profesor->listarProfesores();

            if ($data){
                foreach ($data as $registro) {
                    echo "
                        <tr>
                            <td>&nbsp;&nbsp;{$registro['nombres']}</td>
                            <td>{$registro['apellidos']}</td>
                            <td>{$registro['tipodocumento']}</td>
                            <td>{$registro['numerodocumento']}</td>
                            <td>{$registro['especialidad']}</td>
                            <td>{$registro['numEmergencia']}</td>
                            <td>
                                <div class='dropdown'>
                                    <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                        <i class='bx bx-dots-vertical-rounded'></i>
                                    </button>
                                    <div class='dropdown-menu'>
                                        <a href='javascript:void(0);' data-ideditar='{$registro['idpersona']}' class='dropdown-item editar'>
                                            <i class='bx bx-edit-alt me-1 text-primary'></i>
                                            Editar
                                        </a>
                                        <a href='javascript:void(0);' data-ideliminar='{$registro['idpersona']}' class='dropdown-item eliminar'>
                                            <i class='bx bx-trash me-1 text-danger'></i>
                                            Eliminar
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    ";
                }
            }
        }


    }

?>