$(document).ready(function(){
  
  $("#clave").keypress(function(e){
      if(e.which == 13){
        entrar();
  }
  });
  });



  function entrar(){ 
  
    
    var usuario = $("#usuario").val();
    var clave = $("#clave").val();


    //console.log(clave);
   // console.log(pass);

   $.ajax({
       type:"POST",
       url: "login.php",
       data: {clave:clave,usuario:usuario},
       
       beforeSend:function(){
          
      // $("#carga").hide("fast");
       $("#carga").show("fast");
       $("#alertlogin2").hide("fast");
       
   },
       success:function(resp){
         //  alert(resp);
           if(resp==1){
           const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: 'Bienvenido'
            })
            location.href='app/index';
           }
           
           if(resp==0){
               
                $("#carga").hide("fast");
               $("#alertlogin2").show("fast");
           
             
           }
       }
       
   })
   
}