function ValidacionUsuarios() {
  var clave_registro = document.getElementById('clave_registro')
    if (
      clave_registro.length <= 8 ||
      clave_registro >= 10 
     
    ) {
      $("#pass1").addClass("is-invalid");
      alert("Su contraseña debe tener entre 8 y 35 caracteres, contener letras, números y alguna letra en mayúscula.",
      );
      return false
}
}



