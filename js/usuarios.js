function listar(filtro) {

    let resultado = document.getElementById("resultado");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../view/listar_usuarios.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            resultado.innerHTML = ajax.responseText;
            debug.log('hola');
        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);
}

buscar.addEventListener('click', e => {
    const filtro = buscar.value;
    if (filtro == "") {
        listar('');
    } else {
        listar(filtro);
    }
})

listar('');

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
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )

            //generar ajax
            const formdata = new FormData();
            formdata.append('id', id);
            const ajax = new XMLHttpRequest();
            ajax.open('POST', '../controller/eliminar.php');
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