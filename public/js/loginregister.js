$(document).ready(function() {
  $("#btn-login").click(function() {
    //console.log('ok');
    $("#loading2").show();

    //document.querySelector('#formupdateiax')
    //selector =
    let isValid = document.querySelector("#login").reportValidity();

    if (isValid == false) {
      $("#login").addClass("was-validated");
      $("#loading2").hide();
      //return false;
    } else {

var datosFormulario = new FormData($("#login")[0]);

   fetch("/auth/logear", {
                            method: 'POST',
                            body: datosFormulario
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response
                        .json();
                        })
                        .then(data => {
        //console.log(data);
        //console.log(data)
                     if(data['ok']==false){
                              toastr.error(data['user'])
                             } else{
                              //var token = data.token;
                  window.location.href = '/home';

                             }

                        $("#loading2").hide();
                        })
                        .catch(error => {
                            // Manejar errores
                            console.error('There was a problem with the fetch operation:', error);
                            console.log("error");
                              $("#loading2").hide();
                        })




    }
  });

  $("#btn-register").click(function() {
    $("#loading2").show();

    //document.querySelector('#formupdateiax')
    //selector =
    let isValid = document.querySelector("#register").reportValidity();

    if (isValid == false) {
      $("#register").addClass("was-validated");
      $("#loading2").hide();
      //return false;
    } else {
      let password = document.getElementById("password").value;
      let confirmPassword = document.getElementById("password-confirm").value;
      let passwordError = document.getElementById("password-error");

      // Validar que las contraseñas sean iguales
      if (password !== confirmPassword) {
        passwordError.textContent = "Las contraseñas no coinciden.";
        passwordError.style.display = "block";
        $("#password-conf").text("Las contraseñas no coinciden")
  $("#password").addClass("is-invalid");
   $("#password-confirm").addClass("is-invalid");
        return false;
      }

      // Validar que la contraseña tenga al menos 8 caracteres
      if (password.length < 8) {
        passwordError.textContent =
          "La contraseña debe tener al menos 8 caracteres.";
     $("#password-conf").text( "La contraseña debe tener al menos 8 caracteres.")
       $("#password-confirm").addClass("is-invalid");
        passwordError.style.display = "block";
        return false;
      }
    }

  var datosFormulario = new FormData($("#register")[0]);

   fetch("/register", {
                            method: 'POST',
                            body: datosFormulario
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response
                        .json();
                        })
                        .then(data => {
        //console.log(data);
     if (data['message']){
     window.location.href = '/home';

    }else{
toastr.error(data['error'])
      }


                        $("#loading2").hide();
                        })
                        .catch(error => {
                            // Manejar errores
                            console.error('There was a problem with the fetch operation:', error);
                            console.log("error");
                              $("#loading2").hide();
                        })


  });
});
