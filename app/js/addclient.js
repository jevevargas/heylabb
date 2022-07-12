function addclient(){
    var nombre = document.getElementById("nombre").value;
   // var fnacimiento = document.getElementById("fnacimiento").value;
    var edad = document.getElementById("edad").value;
    var tel = document.getElementById("tel").value;
    var correo = document.getElementById("correo").value;
    var obs = document.getElementById("obs").value;

    if (nombre == "") {
        $("#nombre").addClass("is-invalid");
    }
    if (edad == "") {
        $("#edad").addClass("is-invalid");
    }
    if (tel == "" || tel > 8) {
        $("#tel").addClass("is-invalid");
    }
    if (correo == "" || tel > 8) {
        $("#correo").addClass("is-invalid");
    }
    if (obs == "" || tel > 8) {
        $("#obs").addClass("is-invalid");
    }

    if (nombre != "" && edad != "" && tel == "8" && correo != "" && obs != "" ) {

    }
}