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

/*TUTORIAL DE COMO USAR LOS COMPONENTES DE ESTE ARCHIVO BY MARTIN A LAS 2am
  1- Estas funciones se llaman desde un form en su atributo onsubmit
      ej:
        <form id="miputavida" method="post" onsubmit="return nombreDeFuncion()">
          ...cosas de forms...
        </form>

  2- Cualquier cosa que se recoja con document.getElementById(String id) tiene que
    tener como id dicha id
      ej:
        <form id="miputavida" method="post" onsubmit="return nombreDeFuncion()">
          <input id='idEjemplo' type="text" name="miPutaMadre" />
        </form>
        -----------later in the javascripting side of this shit-----------------
        var holaSoyUnaVariable = document.getElementById('miPutaMadre').value

  3- Las funciones tienen que retornar true si dejan avanzar el formulario hacia
    POST, si retornan false no se redirecciona. Por ello, cuando vayamos a devolver
    false lo explicamos en un aler como aprendimos en SSI practica de XSS

  4- Preguntas? releer, no es puto difícil. 
*/


//  TODO Funcion para validar nuevas tablas y modificarlas

//  TODO Funcion para validar nuevas actividades y modificarlas

//  TODO Funcion para validar nuevos usuarios

//  TODO Funcion para validar modificacion de usuarios

//  TODO Funcion para validar modificación de perfil

//  TODO Funcion para validar nueva session

//  TODO Funcion para validar la adición de ejercicios a una tabla
