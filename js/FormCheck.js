//  Funcion para validar nuevos ejercicios y modificaciones de los mismos
function validarEjercicio () {
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
