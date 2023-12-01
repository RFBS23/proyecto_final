//validacion para nombres y apellidos
function SoloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú";
    especiales = [8,13];
    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){
        alert("Ingresar solo letras");
        return false;
    }
}

//validacion para ingresar solo numeros
function SoloNumeros(evt){
    if(window.event){
        keynum = evt.keyCode;
    }
    else{
        keynum = evt.which;
    }
    if((keynum > 47 && keynum < 58) || keynum == 8 || keynum== 13){
        return true;
    }
    else{
        Swal.fire({
            backdrop: 'true',
            timerProgressBar: 'true',
            position: 'top-end',
            icon: 'error',
            title: 'Ingresar Solo Numeros',
            showConfirmButton: false,
            timer: 1500,
            toast: true,
        })
        //alert("Ingresar solo numeros");
        return false;
    }
}