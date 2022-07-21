
 $(document).ready(function () {
   tablaventa();
   botonfact();
   detallecaja();

 });
 
 
function tablaventa() {

  var idcliente = $("#idcliente").val();
  $.ajax({
    url: "tablaventa.php",
    type: "POST",
    dataType: "html",
    data: { idcliente: idcliente },
  }).done(function (r) {
    $("#tablaventa").html(r);
  });
}

function botonfact() {
  var idcliente = $("#idcliente").val();
  $.ajax({
    url: "botonfact.php",
    type: "POST",
    dataType: "html",
    data: { idcliente: idcliente },
  }).done(function (r) {
    $("#botonfact").html(r);
  });
}

function detallecaja() {
  $.ajax({
    url: "detallecaja.php",
    type: "POST",
    dataType: "html",
    data: {},
  }).done(function (r) {
    $("#detallecaja").html(r);
  });
}


 $(document).on("click", ".get_value", function () {
   var id = $(this).val();
   var mesp = $("#mesp" + id).text();
   var idcliente = $("#idcliente").val();
   var ordenes = $("#ordenes").val();
//console.log(idcliente);
   //console.log(mesp);
   
 $.ajax({
   url: "insertarventa.php", // Es importante que la ruta sea correcta si no, no se va a ejecutar
   method: "POST",
   data: {
     mesp: mesp,
     idcliente: idcliente,
     ordenes:ordenes
   },
   beforeSend: function () {},
   success: function () {
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
       icon: "info",
       title: "Agregando...",
     });

     tablaventa();
   },
 });
 });


$(function () {
  $("#terminar").on("shown.bs.modal", function (e) {
    $(".focus").focus();
  });
});

 $(document).on("click", ".fact", function () {
   var id = $(this).val();
   var mesp = $("#mesp" + id).text();

   var clien = $("#clien").val();

   console.log(mesp);
      console.log(clien);
  
       clien: clien,
         $.ajax({
           url: "agregarfact.php", // Es importante que la ruta sea correcta si no, no se va a ejecutar
           method: "POST",
           data: {
             mesp: mesp,
             clien: clien
           },
           beforeSend: function () {},
           success: function () {
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
               icon: "info",
               title: "Agregando tipo de facturacion...",
             });

             botonfact();
           },
         });
 });



       function getval(sel) {
         //alert(sel.value);
         var tipopago = $("#tipopago").val(),
             clien = $("#clien").val();

         console.log(tipopago);
         console.log(clien);

         $.ajax({
           url: "colocarpago.php", // Es importante que la ruta sea correcta si no, no se va a ejecutar
           method: "POST",
           data: { tipopago: tipopago, clien: clien },
           beforeSend: function () {},
           success: function () {
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
               title: "Tipo de pago agregado",
             });
           },
         });
       }


function terminar(){
  var terminarorden = $("#terminarorden").val(),
    clien = $("#clien").val();

    $.ajax({
      url: "finalizarpago.php", // Es importante que la ruta sea correcta si no, no se va a ejecutar
      method: "POST",
      data: { terminarorden: terminarorden, clien: clien },
      beforeSend: function () {},
      success: function () {
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
          title: "Proceso terminado",
        });

        location.href="index.php";
      },
    });
}


//caja/

function aperturar() {
  Swal.fire({
    title: "Caja",
    text: "Desea aperturar la caja",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#698C00",
    cancelButtonColor: "#D90000",
    confirmButtonText: "Aperturar ",
  }).then(result => {
    if (result.value) {
      apertura2();
    }
  });
}

function apertura2() {
  var idusuario = $("#idusuario").val(),
    fechainicial = $("#fechainicial").val(),
    fechafinal = $("#fechafinal").val();

  $.ajax({
    url: "aperturarcaja.php", // Es importante que la ruta sea correcta si no, no se va a ejecutar
    method: "POST",
    data: {
      idusuario: idusuario,
      fechainicial: fechainicial,
      fechafinal: fechafinal,
    },
    beforeSend: function () {},
    success: function () {
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1000,
        timerProgressBar: true,
        onOpen: toast => {
          toast.addEventListener("mouseenter", Swal.stopTimer);
          toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
      });

      Toast.fire({
        icon: "info",
        title: "Aperturando...",
      });

      detallecaja();
    },
  });
}