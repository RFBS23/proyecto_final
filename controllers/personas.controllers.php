<?php
require_once '../models/personas.models.php';

if (isset($_GET['operacion'])){
    $personas = new Persona();
    if ($_GET['operacion'] == 'listarPersonas'){
        $data = $personas->listarPersonas();
        if ($data) {
            foreach ($data as $registro){
                echo "
                    <tr>
                            <td>{$registro['nombres']}</td>
                            <td>{$registro['apellidos']}</td>
                            <td>{$registro['celular']}</td>
                            <td>{$registro['direccion']}</td>
                            <td>{$registro['fechanacimiento']}</td>
                            <td>{$registro['tipodocumento']}</td>
                            <td>{$registro['numerodocumento']}</td>
                            <td>
                                <div class='dropdown'>
                                    <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                        <i class='bx bx-dots-vertical-rounded'></i>
                                    </button>
                                    <div class='dropdown-menu'>
                                        <a href='#' data-ideditar='{$registro['idpersona']}' class='dropdown-item editar'>
                                            <i class='bx bx-edit-alt me-1 text-primary'></i>
                                            Editar
                                        </a>
                                        <a href='#' data-ideliminar='{$registro['idpersona']}' class='dropdown-item eliminar'>
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

    if ($_GET['operacion'] == 'listarGenero'){
        $data = $personas->listarGenero();
        if ($data){
            echo "<option value='' selected disabled>Elija un Genero</option>";
            foreach ($data as $registro) {
                echo "<option value='{$registro['genero']}'>{$registro['genero']}</option>";
            }
        }
    }

    if ($_GET['operacion'] == 'listarTipoDoc'){
        $data = $personas->listarTipoDoc();
        if ($data){
            echo "<option value='' selected disabled>Elija el Tipo de Documento</option>";
            foreach ($data as $registro) {
                echo "<option value='{$registro['tipodocumento']}'>{$registro['tipodocumento']}</option>";
            }
        }
    }

    //registrar personas
    if ($_GET['operacion'] == 'registrarPersonas'){
        $datos = [
            "nombres" => $_GET['nombres'],
            "apellidos" => $_GET['apellidos'],
            "genero" => $_GET['genero'],
            "celular" => $_GET['celular'],
            "direccion" => $_GET['direccion'],
            "fechanacimiento" => $_GET['fechanacimiento'],
            "tipodocumento" => $_GET['tipodocumento'],
            "numerodocumento" => $_GET['numerodocumento']
        ];
        $personas->registrarPersonas($datos);
    }

    if ($_GET['operacion'] == 'actualizarPersonas'){
        $datos = [
            "nombres" => ['nombres'],
            "apellidos" => ['apellidos'],
            "genero" => ['genero'],
            "celular" => ['celular'],
            "direccion" => ['direccion'],
            "fechanacimiento" => ['fechanacimiento'],
            "tipodocumento" => ['tipodocumento'],
            "numerodocumento" => ['numerodocumento']
        ];
        $personas->actualizarPersonas($datos);
    }

    if ($_GET['operacion'] == 'buscarPersonas'){
        $data =  $personas->buscarPersonas($_GET['numerodocumento']);
        echo json_encode($data);
    }

    if ($_GET['operacion'] == 'eliminarPersonas'){
        $personas->eliminarPersonas($_GET['idpersona']);
    }

    if ($_GET['operacion'] == 'obtenerDatosPersonas'){
        $data = $personas->obtenerDatosPersonas($_GET['idpersona']);
        echo json_encode($data);
    }
}
?>
