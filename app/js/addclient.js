
$(document).ready(function() {
  tablacita();
 tablaexamenes();
});


setInterval(function () {
  tablaexamenes();
}, 1000);


function tablacita() {
  $.ajax({
          url: 'tablacita.php',
          type: 'POST',
          dataType: 'html',
          data: {},
      })
      .done(function(r) {
          $("#tablacita").html(r);
      })

}


function tablaexamenes() {
  //var idcliente = $("#idcliente").val();
  $.ajax({
    url: "tablaexamenes.php",
    type: "POST",
    dataType: "html",
    data: {},
  }).done(function (r) {
    $("#tablaexamenes").html(r);
  });
}



$(function () {
  $("#fnacimiento").on("change", calcularEdad);
});

function calcularEdad() {
  fecha = $(this).val();
  var hoy = new Date();
  var cumpleanos = new Date(fecha);
  var edad = hoy.getFullYear() - cumpleanos.getFullYear();
  var m = hoy.getMonth() - cumpleanos.getMonth();

  if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
    edad--;
  }
  $("#edades").val(edad);
}


function addclient(){
    var nombre = document.getElementById("nombre").value;
   // var fnacimiento = document.getElementById("fnacimiento").value;
    var edades = document.getElementById("edades").value;
    var tel = document.getElementById("tel").value;
    var correo = document.getElementById("correo").value;
    var obs = document.getElementById("obs").value;

    telef=($("#tel").val().length); 

    console.log(edades);

    if (nombre == "") {
        $("#nombre").addClass("is-invalid");
    }
    if (edades == "") {
        $("#edades").addClass("is-invalid");
    }
    if (tel == ""  ) {
        $("#tel").addClass("is-invalid");
    }
    if (telef > "8"  ) {
      $("#tel").addClass("is-invalid");
  }
    if (correo == "" ) {
        $("#correo").addClass("is-invalid");
    }
    if (obs == "" ) {
        $("#obs").addClass("is-invalid");
    }

    if (nombre != "" && edades != "" && telef == "8" && correo != "" && obs != "" ) {
      var nombre = $("#nombre").val(),
      fnacimiento = $("#fnacimiento").val(),
        edades = $("#edades").val(),
        tel = $("#tel").val(),
        correo = $("#correo").val(),
        obs = $("#obs").val();

        console.log(edades);

        $.ajax({
          url: "icliente.php", // Es importante que la ruta sea correcta si no, no se va a ejecutar
          method: "POST",
          data: {
            nombre: nombre,
            edades: edades,
            tel: tel,
            correo: correo,
            obs: obs,
            fnacimiento: fnacimiento
          },
          beforeSend: function () {},
          success: function () {
            
            $("#nombre").removeClass("is-invalid");
            $("#nombre").addClass("is-valid");

            $("#edades").removeClass("is-invalid");
            $("#edades").addClass("is-valid");

            $("#tel").removeClass("is-invalid");
            $("#tel").addClass("is-valid");

            $("#correo").removeClass("is-invalid");
            $("#correo").addClass("is-valid");

            $("#obs").removeClass("is-invalid");
            $("#obs").addClass("is-valid");


            const Toast = Swal.mixin({
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 2000,
              timerProgressBar: true,
              onOpen: toast => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
              },
            });

            Toast.fire({
              icon: "success",
              title: "Agregado...",
            });
            tablacita();
          },
        });
    }
}


