$(document).ready(function(){
  
  $("#clave").keypress(function(e){
      if(e.which == 13){
        entrar();
  }
  });
  });



  function entrar(){
    alert('hola mundo');
  }