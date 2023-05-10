import Swal from 'sweetalert2'

let buttonLogin = document.getElementById("login-button")

data(buttonLogin.value);



function data (accion) {
    switch(accion) {
        case 'login':
            return {
                "correo": document.getElementById('correo').value,
                "password": document.getElementById('password').value,
                "accion": accion
            }
            break;
    }
}

function login() {
    let form = document.getElementById("form");
    form.addEventListener("submit", e => { e.preventDefault() })
   
    $.ajax({
        url: '../../controller/UsuarioController.php',
        data: data("login"),
        type: 'POST',
        dataType: 'json',
    }).done(function (response){
        Swal.fire({
            title: 'Error!',
            text: 'Do you want to continue',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
    })


    
    


}