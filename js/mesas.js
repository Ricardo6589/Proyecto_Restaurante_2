window.addEventListener('load', function(e) {

    var sala = document.getElementById("id_sala");
    var fecha = document.getElementById("fecha");
    var hora = document.getElementById("hora");
    var motivo = document.getElementById("final-reserva");
    var id_mesa = document.getElementById("id_mesa");
    var reserva = document.getElementById("nombre_reserva");




    fecha.addEventListener("change", function(e) {
        listar_mesa(sala, fecha, hora)

    })

    hora.addEventListener("change", function(e) {
        listar_mesa(sala, fecha, hora)
    })

    frm_reservar.addEventListener("submit", function(e) {
        e.preventDefault()
        Crear_mesa(reserva, fecha, hora, motivo, id_mesa)

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

function Crear_mesa(reserva, fecha, hora, motivo, id_mesa) {

    var mesas = document.getElementById("limites");
    const reserva1 = reserva.value
    const fecha1 = fecha.value
    const hora1 = hora.value
    const motivo1 = motivo.value
    const id_mesa1 = id_mesa.value


    let formdata = new FormData();
    formdata.append('nombre_reserva', reserva1);
    formdata.append('fecha', fecha1);
    formdata.append('hora', hora1);
    formdata.append('final-reserva', motivo1);
    formdata.append('id_mesa', id_mesa1);


    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/crearreserva.php');
    ajax.onload = function() {
        if (ajax.status == 200) {

            mesas.innerHTML = ajax.responseText;
        } else {
            mesas.innerText = 'Error';
        }
    }
    ajax.send(formdata);
    alert(fecha1)
    alert(hora1)

}