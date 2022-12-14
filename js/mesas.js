window.addEventListener('load', function(e) {

    var sala = document.getElementById("id_sala");
    var fecha = document.getElementById("fecha");
    var hora = document.getElementById("hora");




    fecha.addEventListener("change", function(e) {
        listar_mesa(sala, fecha, hora)

    })

    hora.addEventListener("change", function(e) {
        listar_mesa(sala, fecha, hora)
    })






})

function listar_mesa(sala, fecha, hora) {


    var mesas = document.getElementById("limites");
    const sala1 = sala.value
    const fecha1 = fecha.value
    const hora1 = hora.value
    let formdata = new FormData();
    formdata.append('id_sala', sala1);
    formdata.append('fecha', fecha1);
    formdata.append('hora', hora1);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/listar_mesa.php');
    ajax.onload = function() {
        if (ajax.status == 200) {

            mesas.innerHTML = ajax.responseText;
        } else {
            mesas.innerText = 'Error';
        }
    }
    ajax.send(formdata);

}