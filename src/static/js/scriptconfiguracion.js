//----------------------------------NIVEL SOLO PARA ROL ESTUDIANTES----------------------

function toggleNivel() {
    var rolusuario = document.getElementById('rolusuario').value;
    var nivelContainer = document.getElementById('nivel-container');
    var nivelSelect = document.getElementById('nivel');

    if (rolusuario === 'rol_estudiante') {
        nivelContainer.style.display = 'block';
        nivelSelect.required = true; // Hacer el campo obligatorio
    } else {
        nivelContainer.style.display = 'none';
        nivelSelect.required = false; // Quitar la obligación del campo
        nivelSelect.value = ""; // Reiniciar el valor del campo nivel
    }
}

//----------------------------------------FORMATO APEELIDOS-------------------------------

document.getElementById('apellidos').addEventListener('input', function (event) {
    var input = event.target;
    if (!input.checkValidity()) {
        document.getElementById('error-apellidos').style.display = 'block';
    } else {
        document.getElementById('error-apellidos').style.display = 'none';
    }
});

//---------------------------------FORMATO NOMBRES---------------------------------

document.getElementById('nombres').addEventListener('input', function (event) {
    var input = event.target;
    if (!input.checkValidity()) {
        document.getElementById('error-nombres').style.display = 'block';
    } else {
        document.getElementById('error-nombres').style.display = 'none';
    }
});

//---------------------------FORMATO CELULAR------------------------------------------

document.getElementById('celular').addEventListener('input', function (event) {
    var input = event.target;
    if (!input.checkValidity()) {
        document.getElementById('error-celular').style.display = 'block';
    } else {
        document.getElementById('error-celular').style.display = 'none';
    }
});

//-----------------------------------PASAPORTE------------------------------------
// Función para validar que el pasaporte tenga una longitud específica y permita letras y números
function validarPasaporte() {
var input = document.getElementById('pasaporte');
var valor = input.value;

// Eliminar caracteres no alfanuméricos (letras y números)
var soloAlfanumericos = valor.replace(/[^a-zA-Z0-9]/g, '');

// Limitar longitud a un rango típico, por ejemplo, entre 6 y 9 caracteres
var longitudMinima = 6;
var longitudMaxima = 9;
if (soloAlfanumericos.length > longitudMaxima) {
soloAlfanumericos = soloAlfanumericos.substring(0, longitudMaxima);
}

// Establecer el valor del campo solo a caracteres válidos
input.value = soloAlfanumericos;

// Validar longitud del pasaporte
esPasaporteValido(soloAlfanumericos);
}

// Función para validar que el pasaporte sea válido
function esPasaporteValido(pasaporte) {
var mensaje = '';
var longitudMinima = 6;
var longitudMaxima = 9;

if (pasaporte.length < longitudMinima || pasaporte.length > longitudMaxima) {
mensaje = 'El pasaporte debe tener entre 6 y 9 caracteres.';
} else if (!/^[a-zA-Z0-9]+$/.test(pasaporte)) {
mensaje = 'El pasaporte solo puede contener letras y números.';
}

$('#mensaje_pasaporte_valido').text(mensaje).css('color', mensaje ? 'red' : '').show();
}

//----------------------------CEDULA ECUATORIANA--------------------------------
function esCedulaEcuatorianaValida(cedula) {
// Cédula debe tener 10 dígitos
if (!/^\d{10}$/.test(cedula)) {
    return false;
}

// Obtener los primeros dos dígitos del código para verificar la provincia
const provincia = parseInt(cedula.substring(0, 2), 10);
if (provincia < 1 || provincia > 24) {
    return false;
}

// Validar el último dígito de la cédula usando el algoritmo estándar
const digitos = cedula.split('').map(Number);
const suma = digitos.slice(0, 9).reduce((acc, num, idx) => {
    if (idx % 2 === 0) {
        num *= 2;
        if (num > 9) num -= 9;
    }
    return acc + num;
}, 0);

const modulo = suma % 10;
const digitoVerificador = (modulo === 0 ? 0 : 10 - modulo);

return digitoVerificador === digitos[9];
}
// Función para validar que solo se ingresen números y limitar a 10 dígitos
function validarNumerosEcuatoriana() {
var input = document.getElementById('cedula-ecuatoriana');
var valor = input.value;

// Eliminar cualquier carácter no numérico
var soloNumeros = valor.replace(/\D/g, '');

// Limitar la longitud a 10 dígitos
if (soloNumeros.length > 10) {
soloNumeros = soloNumeros.substring(0, 10);
}

// Establecer el valor del campo solo a números
input.value = soloNumeros;
}



function esCedulaColombianaValida(cedula) {
if (!/^\d{10}$/.test(cedula)) {
return false;
}

const digitos = cedula.split('').map(Number);
let suma = 0;
for (let i = 0; i < 9; i++) {
let digito = digitos[i];
if (i % 2 === 0) {
    digito *= 2;
    if (digito > 9) {
        digito -= 9;
    }
}
suma += digito;
}

const digitoVerificador = (10 - (suma % 10)) % 10;
return digitoVerificador === digitos[9];
}

function validarCedulaColombiana() {
const cedulaInput = document.getElementById('cedula-colombiana');
const mensaje = document.getElementById('mensaje-cedula-colombia');
const cedula = cedulaInput.value;

if (esCedulaColombianaValida(cedula)) {
mensaje.textContent = 'La cédula colombiana es válida.';
mensaje.style.color = 'green';
} else {
mensaje.textContent = 'La cédula colombiana no es válida.';
mensaje.style.color = 'red';
}
}
function validarNumerosColombiana() {
var input = document.getElementById('cedula-colombiana');
var valor = input.value;

// Eliminar cualquier carácter no numérico
var soloNumeros = valor.replace(/\D/g, '');

// Limitar la longitud a 10 dígitos
if (soloNumeros.length > 10) {
soloNumeros = soloNumeros.substring(0, 10);
}

// Establecer el valor del campo solo a números
input.value = soloNumeros;
}


//--------------------------------CEDUAL NENEZOLANA -----------------------------------------------

// Función para validar que la cédula venezolana sea válida
function esCedulaVenezolanaValida() {
var cedula = $('#cedula-venezolana').val();
var mensaje_cedula_valida_nenezolana = '';

if (cedula.length < 7 || cedula.length > 8) {
mensaje_cedula_valida_nenezolana = 'La cédula venezolana debe tener entre 7 y 8 dígitos.';
} else {
// Validación adicional si es necesaria
}

$('#mensaje_cedula_valida_nenezolana').text(mensaje_cedula_valida_nenezolana).css('color', mensaje_cedula_valida_nenezolana ? 'red' : '').show();
}
// Función para validar que solo se ingresen números y limitar a 8 dígitos para cédula venezolana
function validarNumerosVenezolana() {
var input = document.getElementById('cedula-venezolana');
var valor = input.value;

// Eliminar cualquier carácter no numérico
var soloNumeros = valor.replace(/\D/g, '');

// Limitar la longitud a 8 dígitos
if (soloNumeros.length > 8) {
soloNumeros = soloNumeros.substring(0, 8);
}

// Establecer el valor del campo solo a números
input.value = soloNumeros;
}
//---------------------------------------------------------------------------

let nacionalidadSeleccionada = ''; // Variable global para almacenar la nacionalidad seleccionada

function guardarNacionalidad() {
nacionalidadSeleccionada = document.getElementById('nacionalidad').value; // Guarda la selección
mostrarCamposCedula(); // Muestra u oculta los campos de cédula
}
function mostrarCamposCedula() {
var nacionalidad = document.getElementById('nacionalidad').value;
var inputsCedula = document.querySelectorAll('.input-cedula');

// Ocultar todos los campos de cédula
inputsCedula.forEach(function(input) {
input.style.display = 'none';
});

// Limpiar todos los campos de entrada
inputsCedula.forEach(function(input) {
var campos = input.querySelectorAll('input');
campos.forEach(function(campo) {
campo.value = ''; // Limpiar el valor del campo
});
var mensajes = input.querySelectorAll('p');
mensajes.forEach(function(mensaje) {
mensaje.textContent = ''; // Limpiar los mensajes
});
});

// Mostrar el campo correspondiente según la nacionalidad seleccionada
if (nacionalidad === 'ecuatoriana') {
document.getElementById('input-cedula-ecuatoriana').style.display = 'block';
} else if (nacionalidad === 'colombiana') {
document.getElementById('input-cedula-colombiana').style.display = 'block';
} else if (nacionalidad === 'venezolana') {
document.getElementById('input-cedula-venezolana').style.display = 'block';
} else if (nacionalidad === 'pasaporte') {
document.getElementById('input-pasaporte').style.display = 'block';
}
}


function copiarCedula() {
var nacionalidad = document.getElementById('nacionalidad').value;
var cedula;
var mensaje_cedula_valida_ecuatoriana = document.getElementById('mensaje_cedula_valida_ecuatoriana');

if (nacionalidad === 'ecuatoriana') {
cedula = document.getElementById('cedula-ecuatoriana').value;
if (!esCedulaEcuatorianaValida(cedula)) {
mensaje_cedula_valida_ecuatoriana.textContent = 'Cédula ecuatoriana inválida.';
return;
} else {
mensaje_cedula_valida_ecuatoriana.textContent = '';
}
} else if (nacionalidad === 'colombiana') {
cedula = document.getElementById('cedula-colombiana').value;
} else if (nacionalidad === 'venezolana') {
cedula = document.getElementById('cedula-venezolana').value;
} else if (nacionalidad === 'pasaporte') {
cedula = document.getElementById('pasaporte').value;
}

document.getElementById('cedula').value = cedula;
}




//--------------------------------------------------------------------------------------------------
//<!-- Script de JavaScript para confirmar la eliminación de usuario-->

    function confirmarEliminacion(nombreCompleto) {
        return confirm("¿Estás seguro de eliminar al usuario '" + nombreCompleto + "'?");
    }





//_________________MOSTARR SECCIONES________________________________________________________

function mostrarSeccion(seccion) {
        // Oculta todas las secciones
        var secciones = document.querySelectorAll('.contenido-seccion');
        secciones.forEach(function (seccion) {
            seccion.classList.remove('active');
        });

        // Muestra la sección correspondiente
        document.getElementById(seccion).classList.add('active');
    }


//<!-------------------------------------------------------------------REGISTRO DE USUARIOS NUEVOS ---------------->
// visualizar la contraseña 

    function togglePasswordVisibility() {
    var passwordInput = document.getElementById("contraseña");
    var eyeIcon = document.getElementById("eye-icon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
}
//buscar cedula si ya existe o no 

// Variable para manejar el debounce
let debounceTimeout;

// Función para buscar la cédula
function buscarCedula() {
    // Limpiar el tiempo de espera anterior si hay uno
    clearTimeout(debounceTimeout);

    // Obtener el valor del campo de entrada
    var cedula = $('#cedula').val();

    // Si el campo está vacío, no hacer ninguna solicitud
    if (cedula.trim() === '') {
        $('#mensaje_cedula_existente').text('').hide();
        return;
    }

    // Configurar el debounce para hacer la solicitud después de un retraso
    debounceTimeout = setTimeout(function() {
        $.ajax({
            url: '/verificar_cedula',
            type: 'POST',
            data: { cedula: cedula },
            success: function(response) {
                if (response.existe) {
                    // Mostrar mensaje cuando la cédula ya está registrada
                    $('#mensaje_cedula_existente').text('¡La cédula ya está registrada!').css('color', 'red').show();
                } else {
                    // Ocultar mensaje cuando la cédula no está registrada
                    $('#mensaje_cedula_existente').text('').hide();
                }
            },
            error: function(xhr, status, error) {
                console.error('Error al verificar la cédula:', error);
            }
        });
    }, 500); // Esperar 500 ms antes de hacer la solicitud
}


// verificacion de la estrutura de una contraseña

document.getElementById("contraseña").addEventListener("input", function() {
    var contraseña = this.value;
    var errorMessage = document.getElementById("error-message-caracteres-contraseña");
    if (contraseña.length < 8) {
        errorMessage.textContent = "La contraseña debe tener al menos 8 caracteres.";
    } else {
        errorMessage.textContent = "";
    }
});


//no permitir el registro si hay errores 

function comprobarerrores() {
    // Verificar si hay algún mensaje de error presente en el campo de cédula
    var errorMessageCedula = document.getElementById("mensaje-cedula").textContent;
    
    // Verificar si hay algún mensaje de error presente en el campo de contraseña
    var errorMessageContraseña = document.getElementById("error-message-caracteres-contraseña").textContent;

    // Si hay algún mensaje de error en alguno de los campos, no permitir el envío del formulario
    if (errorMessageCedula !== "" || errorMessageContraseña !== "") {
        return false;
    }
    
    // Mostrar mensaje de registro exitoso
    alert("¡Registro exitoso!");

}

