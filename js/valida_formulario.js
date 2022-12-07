var validaFormulario = function() {


}
var validaEmail = function(evento) {
    var valor = evento.target.value
    if (!(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(valor))) {
        swal({
            title: "Has puesto un correo no valido",
            text: "Vuelve a introducir los datos",
            icon: "error",
        });
        return false;
    } else {
        document.getElementById(evento.target.id + "_msg").innerHTML = "";
        evento.target.style.borderColor = "black";
        evento.target.style.borderWidth = "1px";
        return true;
    }

}
var validaContra = function(evento) {

    //     console.log("hola")
    var valor = evento.target.value;
    if (valor == null || valor.length == 0) {
        //         console.log("hola2")
        //document.getElementById(evento.target.id + "_msg").innerHTML = evento.target.name + " no puede estar vacio";
        //         evento.target.style.borderColor = "red";
        //         evento.target.style.borderWidth = "5px";
        //         evento.target.focus();
        swal({
            title: "La contraseña no puede estar vacia",
            text: "Vuelve a introducir los datos",
            icon: "error",
        });
        //         document.getElementById('saveForm').addAttribute("disabled");
        //         return false;
    } else {
        //         document.getElementById(evento.target.id + "_msg").innerHTML = "";
        //         evento.target.style.borderColor = "black";
        //         evento.target.style.borderWidth = "1px";
        //         document.getElementById('saveForm').removeAttribute("disabled");
        //         return true;
    }
}

var validaVacio = function(evento) {
    //     console.log("hola")
    var valor = evento.target.value;
    if (valor == null || valor.length == 0) {
        //         console.log("hola2")
        //document.getElementById(evento.target.id + "_msg").innerHTML = evento.target.name + " no puede estar vacio";
        //         evento.target.style.borderColor = "red";
        //         evento.target.style.borderWidth = "5px";
        //         evento.target.focus();
        swal({
            title: "No puedes dejar un campo vacio.",
            text: "Rellena los campos vacios",
            icon: "error",
        });
        //         document.getElementById('saveForm').addAttribute("disabled");
        //         return false;
    } else {
        //         document.getElementById(evento.target.id + "_msg").innerHTML = "";
        //         evento.target.style.borderColor = "black";
        //         evento.target.style.borderWidth = "1px";
        //         document.getElementById('saveForm').removeAttribute("disabled");
        //         return true;
    }
}

var validaTelf = function(evento) {
    var valor = evento.target.value;
    if (!(/^([0-9]+){9}$/.test(valor))) {
        swal({
            title: "Procura que el telefono esta bien escrito",
            text: "9 numeros y sin espacios",
            icon: "error",
        });
    }
}

var validaDNI = function(evento) {
    var valor = evento.target.value;
    // var numero,
    //     let, letra;
    if (!/^[XYZ]?\d{5,8}[A-Z]$/.test(valor)) {
        swal({
            title: "DNI introducido no val  ido",
            text: "Vuelve a introducir uno correcto",
            icon: "error",
        });
    }
}


window.onload = function() {
    document.getElementById("email").onblur = validaEmail;
    document.getElementById("password").onblur = validaContra;
    document.getElementById("nombre").onblur = validaVacio;
    document.getElementById("apellido").onblur = validaVacio;
    document.getElementById("telefono").onblur = validaTelf;
    document.getElementById("dni").onblur = validaDNI;
}