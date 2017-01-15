//  Funcion para validar nuevos ejercicios y modificaciones de los mismos
function validarNombreCategoria () {
  var toRet = true
  var nombre = document.getElementById('nombre').value
  var alerta = ''
  if (nombre.length < 3 || nombre.length > 20) {
    toRet = false
    alerta += '[ERROR] La longitud del nombre debe ser de entre 3 y 20 caracteres\n'
  }
  var indice = document.getElementById('categoria').selectedIndex
  if (indice == null || indice == 0) {
    alerta += '[ERROR] Se debe seleccionar un tipo de ejercicio\n'
    toRet = false
  }
  if (toRet == false) {
    alert(alerta)
  }
  return toRet
}

//  Funcion para validar Actividades
function validarActividad () {
  var toRet = true
  var nombre = document.getElementById('nombre').value
  var alerta = ''
  if (nombre.length < 3 || nombre.length > 20) {
    toRet = false
    alerta += '[ERROR] La longitud del nombre debe ser de entre 3 y 20 caracteres\n'
  }
  var indice = document.getElementById('categoria').selectedIndex
  if (indice == null || indice == 0) {
    alerta += '[ERROR] Se debe seleccionar un tipo de Actividad\n'
    toRet = false
  }
  var nPlazas = document.getElementById('nPlazas').value
  var indiceValor = document.getElementById('categoria').value
  if (isNaN(nPLazas) || (indiceValor == 'Grupal' && nPlazas < 1))  {
    alerta += '[ERROR] Las actividades grupales deben tener al menos una plaza\n'
    toRet = false
  }
  if (toRet == false) {
    alert(alerta)
  }
  return toRet
}

//  Funcion para validar nueva session
function validarFechaHora () {
  var fechaHora = document.getElementById('fechaHora').value
  if(!(/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}$/.test(fechaHora))) {
    alert('[ERROR] El fomato a seguir es AAAA-MM-DD hh:mm')
    return false
  }
  else {
    //CHECK AÑOS MESES Y ETC //TODO hora y minutos
    var anyo = fechaHora.substring(0, 4) // because months in JS start from 0
    var mes = fechaHora.substring(5, 7)
    var dia = fechaHora.substring(8, 10)
    if (!((anyo > 2016) && (mes > 0) && (mes < 13) && (dia > 0) && (dia < 32))) {
      alert('[ERROR] La fecha introducida no existe o es inválida')
      return false
    }
    return true
  }
}

//  Funcion para validar nuevas tablas y modificarlas
function validarTabla () {
  var toRet = true
  var nombre = document.getElementById('nombre').value
  var alerta = ''
  if (nombre.length < 3 || nombre.length > 10) {
    toRet = false
    alerta += '[ERROR] La longitud del nombre debe ser de entre 3 y 10 caracteres\n'
  }
  if (toRet == false) {
    alert(alerta)
  }
  return toRet
}

//  Funcion para validar nuevos usuarios

function validarNuevoUsuario () {
  var toRet = true
  var alerta = ''

  var indiceTipoU = document.getElementById('tipoU').selectedIndex
  if (indiceTipoU == null || indiceTipoU == 0) {
    alerta += '[ERROR] Se debe seleccionar un tipo de usuario\n'
    toRet = false
  }

  var nombre = document.getElementById('nombre').value
  if (nombre.length < 3 || nombre.length > 20) {
    toRet = false
    alerta += '[ERROR] La longitud del nombre debe ser de entre 3 y 20 caracteres\n'
  }

  var direccion = document.getElementById('direccion').value
  if (direccion.length > 30) {
    toRet = false
    alerta += '[ERROR] La longitud de la dirección no debe sobrepasar los 30 caracteres\n'
  }

  var telefono = document.getElementById('telefono').value
  if (!(/^[+\d{2}]?\d{9}/.test(telefono))) { //Si esto falla poner que sea >9 al menos
    toRet = false
    alerta += '[ERROR] El telefono debe componerse de al menos 9 dígitos (con o sin extensión)\n'
  }

  var indiceTipoT = document.getElementById('tipoT').selectedIndex
  if (indiceTipoT == null || indiceTipoT == 0) {
    alerta += '[ERROR] Se debe seleccionar un tipo de Tarjeta\n'
    toRet = false
  }

  var dni = document.getElementById('dni').value
  if (!(/[A-z]?\d{8}[A-z]/.test(dni))) {
    alerta += '[ERROR] El dni no tiene un formato correcto\n'
    toRet = false
  }

  var fechaNac = document.getElementById('fechaNac').value
  if(!(/^\d{4}-\d{2}-\d{2}$/.test(fechaNac))) {
    alerta += '[ERROR] El fomato a seguir es AAAA-MM-DD\n'
    toRet = false
  } else {
    //CHECK AÑOS MESES Y ETC //TODO hora y minutos
    var anyo = fechaNac.substring(0, 4) // because months in JS start from 0
    var mes = fechaNac.substring(5, 7)
    var dia = fechaNac.substring(8, 10)
    if (!((anyo < 2017) && (mes > 0) && (mes < 13) && (dia > 0) && (dia < 32))) {
      alerta += '[ERROR] La fecha de nacimiento introducida no existe o es inválida\n'
      toRet = false
    }
  }

  var email = document.getElementById('email').value
  if (!(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email))) {
    alerta += '[ERROR] Email inválido\n'
    toRet = false
  }

  var pass1 = document.getElementById('ps1').value
  var pass2 = document.getElementById('ps2').value
  if (!(pass1.length>0 && pass1 == pass2)) {
    alerta += '[ERROR] Contraseñas distintas o inválidas'
  }

  if (toRet == false) {
    alert(alerta)
  }
  return toRet
}




function validarModUsuario () {
  var toRet = true
  var alerta = ''

  var nombre = document.getElementById('nombre').value
  if (nombre.length < 3 || nombre.length > 20) {
    toRet = false
    alerta += '[ERROR] La longitud del nombre debe ser de entre 3 y 20 caracteres\n'
  }

  var direccion = document.getElementById('direccion').value
  if (direccion.length > 30) {
    toRet = false
    alerta += '[ERROR] La longitud de la dirección no debe sobrepasar los 30 caracteres\n'
  }

    var telefono = document.getElementById('telefono').value
    if (!(/^[+\d{2}]?\d{9}/.test(telefono))) { //Si esto falla poner que sea >9 al menos
      toRet = false
      alerta += '[ERROR] El telefono debe componerse de al menos 9 dígitos (con o sin extensión)\n'
    }

 //Finanal modUsuario
    if (toRet == false) {
      alert(alerta)
    }
    return toRet

}


function validarModPerfil () {
  var toRet = true
  var alerta = ''

  var direccion = document.getElementById('direccion').value
  if (direccion.length > 30) {
    toRet = false
    alerta += '[ERROR] La longitud de la dirección no debe sobrepasar los 30 caracteres\n'
  }

    var telefono = document.getElementById('telefono').value
    if (!(/^[+\d{2}]?\d{9}/.test(telefono))) { //Si esto falla poner que sea >9 al menos
      toRet = false
      alerta += '[ERROR] El telefono debe componerse de al menos 9 dígitos (con o sin extensión)\n'
    }

 //Finanal modPerfilUsuario
 if (toRet == false) {
   alert(alerta)
 }
 return toRet

}

function adEjTabla(){
  var toRet = true
  var alerta = ''

  var carga = document.getElementById('carga').value
  if (isNaN(carga) || carga < 1) {
    toRet = false
    alerta += '[ERROR] Introduce un carga válida para el ejercicio\n'
  }

  var rep = document.getElementById('repeticiones').value
  if (isNaN(rep) || rep < 1) {
    toRet = false
    alerta += '[ERROR] Introduce un número de repeticiones válido para el ejercicio\n'
  }

  var indice = document.getElementById('eje').selectedIndex
  if (indice == null || indice == 0) {
    alerta += '[ERROR] Se debe seleccionar un tipo de ejercicio\n'
    toRet = false
  }

  //Finanal addEjeTabla
  if (toRet == false) {
    alert(alerta)
  }
  return toRet
}
