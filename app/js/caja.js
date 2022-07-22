
    function printContent(el) {
      var restorepage = document.body.innerHTML;
      var printcontent = document.getElementById(el).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }

    $(".amt").keyup(function() {
      var total = 0;
      $(".amt").each(function(index, value) {
        var ctv = $('#ctv').val();
        var cincoctv = $('#cincoctv').val();
        var diesctv = $('#diesctv').val();
        var coractv = $('#coractv').val();
        var dolarctv = $('#dolarctv').val();
        var dolarbillete = $('#dolarbillete').val();
        var cincobillete = $('#cincobillete').val();
        var diesbillete = $('#diesbillete').val();
        var veitebillete = $('#veitebillete').val();
        var cincuentabillete = $('#cincuentabillete').val();
        var cienbillete = $('#cienbillete').val();
        var cheque = $('#cheque').val();
        var cuenta = $('#cuenta').val();
        var boucher = $('#boucher').val();
        var gastos = $('#gastos').val();

        var ctvt = ctv * 0.01;
        var cincoctvt = cincoctv * 0.05;
        var diesctvt = diesctv * 0.10;
        var coractvt = coractv * 0.25;
        var dolarctvt = dolarctv * 1.00;
        var dolarbilletet = dolarbillete * 1.00;
        var cincobilletet = cincobillete * 5.00;
        var diesbilletet = diesbillete * 10.00;
        var veitebilletet = veitebillete * 20.00;
        var cincuentabilletet = cincuentabillete * 50.00;
        var cienbilletet = cienbillete * 100.00;
        var chequet = cheque*1;
        var cuentat = cuenta*1;
        var bouchert = boucher*1;
        var gastost=gastos*1;

        total = (ctvt + cincoctvt + diesctvt + coractvt + dolarctvt + dolarbilletet + cincobilletet + diesbilletet +veitebilletet+ cincuentabilletet + cienbilletet + chequet + cuentat + bouchert)-gastost;

        console.log(total);
        total = total.toFixed(2);

      });
      $("#resultadoarqueo").val(total);
    });


    function guardararqueo(){
        var ctv = $("#ctv").val(),
          cincoctv = $("#cincoctv").val(),
          diesctv = $("#diesctv").val(),
          coractv = $("#coractv").val(),
          dolarctv = $("#dolarctv").val(),
          dolarbillete = $("#dolarbillete").val(),
          cincobillete = $("#cincobillete").val(),
          diesbillete = $("#diesbillete").val(),
          veitebillete = $("#veitebillete").val(),
          cincuentabillete = $("#cincuentabillete").val(),
          cienbillete = $("#cienbillete").val(),
          cheque = $("#cheque").val(),
          cuenta = $("#cuenta").val(),
          boucher = $("#boucher").val(),
          idusuario = $("#idusuario").val(),
          ventadia = $("#ventadia").val(),
          gastos = $("#gastos").val(),
          resultadoarqueo = $("#resultadoarqueo").val();

        $.ajax({
          url: "iarqueo.php",
          type: "POST",
          data: {
            ctv: ctv,
            cincoctv: cincoctv,
            diesctv: diesctv,
            coractv: coractv,
            dolarctv: dolarctv,
            dolarctv: dolarctv,
            dolarbillete,
            dolarbillete,
            cincobillete: cincobillete,
            diesbillete: diesbillete,
            veitebillete: veitebillete,
            cincuentabillete: cincuentabillete,
            cienbillete: cienbillete,
            cheque: cheque,
            cuenta: cuenta,
            boucher: boucher,
            gastos: gastos,
            idusuario: idusuario,
            ventadia: ventadia,
            resultadoarqueo: resultadoarqueo,
          },
          beforeSend: function () {},

          success: function (respuesta) {
            //alert(respuesta);
            // $("#clave").val("");

            if (respuesta == 1) {
              Swal.fire(
                "CUADRO REALIZADO",

                "",
                "success"
              );
            } else {
              Swal.fire(
                "NO CUADRA",

                "",
                "error"
              );
            }
            //arqueo();
            //seccionpago();
            //tablaestado();
          },
        });
    }