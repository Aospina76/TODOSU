
function showregistro() {
    document.getElementById("Registro").style.display = "flex"
    document.getElementById("Consulta").style.display = "none"
}

function showconsulta() {
    document.getElementById("Registro").style.display = "none"
    document.getElementById("Consulta").style.display = "flex"
}
    
function validarForm() {
    var fname = document.getElementById('nombreUsuario').value;
    var lname = document.getElementById('apellidoUsuario').value;
    var email = document.getElementById('correoUsuario').value;
    var usertype = document.getElementById('tipoUsuario').value;
    var password = document.getElementById('passwordUsuario').value;
    var confirmpassword = document.getElementById('confirmpassword').value;

    //valida correos
    var atposition = email.indexOf("@");
    var dotposition = email.lastIndexOf(".");
    if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length) {
        alert("Por favor ingresa un correo electrónico válido");
        return false;
    }


     // valida que la contraseña y confirmar contraseña sean iguales
    if (password != confirmpassword) {
        alert("Las contraseñas no coinciden");
        return false;
    }

    //valida minimo 8 caracteres en la contraseña recomendable mas de 14 
    var input = document.getElementById("passwordUsuario");
    if (input.value.length < 8) {
        alert("La contraseña debe tener al menos 8 caracteres");
        return false;
    }

    return true;
}

function validarFormC() {
  var fnamec = document.getElementById('nombreUsuarioc').value;
  var lnamec = document.getElementById('apellidoUsuarioc').value;
  var emailc = document.getElementById('correoUsuarioc').value;
  var usertypec = document.getElementById('tipoUsuarioc').value;
  var passwordc = document.getElementById('passwordUsuarioc').value;

  //valida correos
  var atposition = emailc.indexOf("@");
  var dotposition = emailc.lastIndexOf(".");
  if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= emailc.length) {
      alert("Por favor ingresa un correo electrónico válido");
      return false;
  }

  //valida minimo 8 caracteres en la contraseña recomendable mas de 14 
  var input = document.getElementById("passwordUsuarioc");
  if (input.value.length < 8) {
      alert("La contraseña debe tener al menos 8 caracteres");
      return false;
  }

  return true;
}

/** verifica si cambia el valor de algun control del formulario y muestra el botón actualizar
  no funciona bien dado que el Select Listausuarios debe estar fuera del form para que no lo tome como control del form
  de esta manera no muestra el boton de actualizar al cambiar el valor del <select id="Listausuarios">
*/

var campos = document.getElementById("Consulta").elements;

// Guardar los valores iniciales de los campos del form Consultas en un objeto
var valoresIniciales = {};
for (var i = 0; i < campos.length; i++) {
  valoresIniciales[campos[i].name] = campos[i].value;
}

// Variable booleana para indicar si se ha producido un cambio en alguno se los campos del form Consutas
var haCambiado = false;

// Escuchar el evento de cambio de cada campo
for (var i = 0; i < campos.length; i++) {
  campos[i].addEventListener("change", function() {
    // Comparar el valor actual del campo con el valor inicial
    if (this.value !== valoresIniciales[this.name]) {
      haCambiado = true;
      document.getElementById("actualiza_btn").style.display = "block";
    } else {
      document.getElementById("actualiza_btn").style.display = "none";
    }
  });
}

// Rellena el formulario al acambias el valor de SELECT
// 1ero seleciona los campos del form y los asigna a variables
var select = document.getElementById('Listausuariosc');
var nombreUsuario = document.getElementById('nombreUsuarioc');
var apellidoUsuario = document.getElementById('apellidoUsuarioc');
var correoUsuario = document.getElementById('correoUsuarioc');
var tipoUsuario = document.getElementById('tipoUsuarioc');
var passwordUsuario = document.getElementById('passwordUsuarioc');

// Añade un listener para el evento change en el <select>
select.addEventListener('change', function() {
    // Busca los detalles del usuario seleccionado en el array de usuariosJS
    var usuario = usuariosJS.find(function(usuario) {
        return usuario.id_user === select.value;
      });

    // Llena los campos del formulario con los detalles del usuario
    if (usuario) {
        nombreUsuario.value = usuario.nombre_user;
        apellidoUsuario.value = usuario.apellido_user;
        correoUsuario.value = usuario.mail_user;
        tipoUsuario.value = usuario.tipo_user;
        passwordUsuario.value = usuario.password_user;
    }

});
