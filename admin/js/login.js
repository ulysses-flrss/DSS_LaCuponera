let btnLogin = document.addEventListener("click", e => {
    e.preventDefault();
    getRol()
})

async function getRol() {
    let usuario = {
        "correo": document.getElementById("correo").value,
        "password": document.getElementById("password").value,
        
    }
    const url = 'http://localhost:8000/api/login'
    const response = await fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(usuario),
    })

    let tipoUsuario = JSON.parse(await response.json())
    
    if (tipoUsuario == "administrador") {
        window.location.href = "Administrador/Clientes/Clientes.html"
    } else if (tipoUsuario == "administrador_ofertante") {
        window.location.href = "AdministradorEmpresaOfertante/GestionEmpleados/Empleados.html"
    } else if(tipoUsuario == "empleado"){
        window.location.href = "Empleado/Empleado.html"
    } else {
        alert("Credenciales Incorrectas")
    }
}