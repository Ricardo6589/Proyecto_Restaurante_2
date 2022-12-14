function listar(filtro) {

    let resultado = document.getElementById("resultado");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../view/listar_mesas.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            resultado.innerHTML = ajax.responseText;
        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);
}
listar('');

buscar.addEventListener("keyup", () => {
    const filtro = buscar.value;
    if (filtro == "") {
        listar('');
    } else {
        listar(filtro);
    }
});



registrar.addEventListener("click", () => {

    var respuesta_ajax = document.getElementById('resultado')

    var form = document.getElementById('frm');

    var formdata = new FormData(form);

    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/crear_actualizar_mesa.php');

    ajax.onload = function() {
        if (ajax.status === 200) {

            if (ajax.responseText == "Creado") {
                Swal.fire({
                    icon: 'success',
                    title: 'Registrado',
                    showConfirmButton: false,
                    timer: 1500
                });
                form.reset();
                listar('');

            } else if (ajax.responseText == "Campo_vacio") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Faltan datos por completar',
                })
                listar('');
                form.reset();

            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Modificado',
                    showConfirmButton: false,
                    timer: 1500
                });
                registrar.value = "Registrar";
                id.value = "";
                listar('');
                form.reset();
            }
        } else {
            respuesta_ajax.innerText = 'Error';
        }
    }
    ajax.send(formdata);


});

function Eliminar(id) {

    Swal.fire({
        title: 'Estas Seguro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Eliminado!',
                'Mesa eliminada con exito.',
                'success'
            )

            //generar ajax
            const formdata = new FormData();
            formdata.append('id', id);
            const ajax = new XMLHttpRequest();
            ajax.open('POST', '../controller/eliminar_mesa.php');
            ajax.onload = function() {
                if (ajax.status == 200) {
                    if (ajax.responseText == "OK") {
                        // alert('Elemento elmiminado con id: ' + id)
                        listar('');
                    }
                } else {
                    resultado.innerText = 'Error';
                }
            };
            ajax.send(formdata);
        }

    })

}

function Editar(id) {
    var formdata = new FormData();
    formdata.append('id', id);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../view/actualizar_vista_mesas.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            document.getElementById('id').value = json.id;
            document.getElementById('numero').value = json.numero_mesa;
            document.getElementById('capacidad').value = json.capacidad_mesa;
            document.getElementById('img').value = json.img_mesa;
            document.getElementById('sala').value = json.id_salas;
            document.getElementById('registrar').value = "Actualizar"
        }
    }
    ajax.send(formdata);

}