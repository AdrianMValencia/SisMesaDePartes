var id = $("#useridx").val();
function init() {}
$(document).ready(function () {
  $.post(
    "../../controllers/PartesController.php?op=insert",
    { id: id },
    function (data) {
      data = JSON.parse(data);
      $("#id").val(data.id);
    }
  );
});
$(document).on("click", "#btnguardar", function () {
  var id = $("#id").val();
  var asunto = $("#asunto").val();
  var descripcion = $("#descripcion").val();
  if (asunto == "" || descripcion == "") {
    Swal.fire(
      "Mesa de Partes",
      "Los campos estan vacíos, por favor verificar!",
      "error"
    );
  } else {
    $.post(
      "../../controllers/PartesController.php?op=update",
      { id: id, asunto: asunto, descripcion: descripcion },
      function (data) {
        Swal.fire("Mesa de Partes", "Se registró correctamente!", "success");
      }
    );
  }
});
init();
