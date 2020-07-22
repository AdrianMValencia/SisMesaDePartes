function init() {
  $("#usuario_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}

function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#usuario_form")[0]);

  $.ajax({
    url: "../controllers/UsuarioController.php?op=guardar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      if (datos == "pass") {
        Swal.fire(
          "Mesa de Partes",
          "Error !!! las contraseñas no coinciden",
          "error"
        );
      } else if (datos == "correo") {
        Swal.fire(
          "Mesa de Partes",
          "El correo ya se encuentra registrado",
          "error"
        );
      } else {
        Swal.fire("Mesa de Partes", "Se registró correctamente", "success");
      }
      $("#usuario_form")[0].reset();
    },
  });
}

init();
