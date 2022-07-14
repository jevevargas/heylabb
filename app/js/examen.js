
 $(document).ready(function () {
   tablaventa();
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




 $(document).on("click", ".get_value", function () {
   var id = $(this).val();
   var mesp = $("#mesp" + id).text();
   var idcliente = $("#idcliente").val();
//console.log(idcliente);
   //console.log(mesp);
   
 $.ajax({
   url: "insertarventa.php", // Es importante que la ruta sea correcta si no, no se va a ejecutar
   method: "POST",
   data: {
     mesp: mesp,
     idcliente: idcliente,
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




