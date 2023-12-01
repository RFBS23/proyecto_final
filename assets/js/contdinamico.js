document.addEventListener("DOMContentLoaded", ()=> {
    function getURL() {
        const url = new URL(window.location.href);
        const vista = url.searchParams.get("view");
        const contenedor = document.querySelector("#contenido-dinamico");
        if (vista != null) {
            fetch(vista)
                .then(respuesta => respuesta.text())
                .then(datos => {
                    contenedor.innerHTML = datos;
                    const scriptsTag = contenedor.getElementsByTagName("script");
                    for (i = 0; i < scriptsTag.length; i++){
                        eval(scriptsTag[i].innerHTML);
                    }
                });
        }
    }
    getURL();
});