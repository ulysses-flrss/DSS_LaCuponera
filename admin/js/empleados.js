
    if (document.getElementById("add-empleado")) {
        let btnAddEmpleado = document.getElementById("add-empleado")
    
        btnAddEmpleado.addEventListener("click", e => {
            e.preventDefault()
            insertEmpleado()
        })
    }


document.addEventListener("DOMContentLoaded", function () {
    let btnUpdateEmpleado = document.getElementById("update-empleado")

    btnUpdateEmpleado.addEventListener("click", (e)=> {
        e.preventDefault()
        updateEmpleado()
    })
})




async function getEmpleados () {
    const url = 'http://localhost:8000/api/empleado'
    const response = await fetch(url)
    const jsonData = await response.json()
    let empleados = [];
    jsonData.forEach(element => {
        let miEmpleado = {
            "cod_usuario": element['cod_usuario'],
            "nombres": element['nombres'],
            "apellidos": element['apellidos'],
            "telefono": element['telefono'],
            "dui": element['dui'],
            "correo": element['correo'],
            "cod_empresa": element['cod_empresa'],
        }

        empleados.push(miEmpleado)
    }); 

    return empleados;
}

async function printEmpleados () {
    let empleado = await getEmpleados();
    let $myTable = document.getElementById("myTable");
    
    empleado.forEach(element => {
        let $tr = document.createElement("tr");
        $tr.innerHTML = 
        `   <td>${element['cod_usuario']}</td>
            <td>${element['nombres']}</td>
            <td>${element['apellidos']}</td>
            <td>${element['telefono']}</td>
            <td>${element['dui']}</td>
            <td>${element['correo']}</td>
            <td>${element['cod_empresa']}</td>
            <td>
                <a href='EditarEmpleado.html?id=${element['cod_usuario']}' class="waves-effect waves-light btn">Modificar</a>
                <a href='#' onclick="deleteEmpleado('${element['cod_usuario']}')" class="waves-effect waves-light btn">Eliminar</a>
            </td>
        `

        $myTable.appendChild($tr)
    }); 
}

async function insertEmpleado () {


    let empleado = {
        "correo": document.getElementById("correo").value,
        "password": document.getElementById("password").value,
        "dui": document.getElementById("dui").value,
        "nombres": document.getElementById("nombres").value,
        "apellidos": document.getElementById("apellidos").value,
        "telefono": document.getElementById("telefono").value,
        "cod_empresa": document.getElementById("cod_empresa").value,
        "cod_rol": document.getElementById("cod_rol").value
    }
    
    const url = 'http://localhost:8000/api/empleado'
    const response = await fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(empleado),
    })

    console.log(response)
    if (response.ok) {
        window.location.href = "Empleados.html"
    } else {
        alert(response.error)
    }
}

async function showEmpleado () {
    let param = new URLSearchParams(window.location.search);
    let id = param.get("id");

    let url = `http://localhost:8000/api/empleado/${id}`
    // const jsonData = await response.json()
    const response = await fetch(url, {
        method: "GET",
    })
    const jsonData = await response.json()

    setTimeout(() => {
        
        let miEmpleado = {

            "correo": jsonData[0].correo,
            "password": jsonData[0].password,
            "dui": jsonData[0].dui,
            "nombres": jsonData[0].nombres,
            "apellidos": jsonData[0].apellidos,
            "telefono": jsonData[0].telefono,
            "cod_empresa": jsonData[0].cod_empresa,
            "cod_rol":jsonData[0].cod_rol
        }

        
        
            document.getElementById("correo").value = miEmpleado.correo
            document.getElementById("password").value = miEmpleado.password
            document.getElementById("dui").value = miEmpleado.dui
            document.getElementById("nombres").value = miEmpleado.nombres
            document.getElementById("apellidos").value = miEmpleado.apellidos
            document.getElementById("telefono").value = miEmpleado.telefono
            document.getElementById("cod_empresa").value = miEmpleado.cod_empresa
            document.getElementById("cod_rol").value = miEmpleado.cod_rol
    }, 0);
}

async function updateEmpleado () {
   
    let param = new URLSearchParams(window.location.search);
    let id = param.get("id");


    let url = `http://localhost:8000/api/empleado/${id}`
    // const jsonData = await response.json()
    let empleado = {
        "correo": document.getElementById("correo").value,
        "password": document.getElementById("password").value,
        "dui": document.getElementById("dui").value,
        "nombres": document.getElementById("nombres").value,
        "apellidos": document.getElementById("apellidos").value,
        "telefono": document.getElementById("telefono").value,
        "cod_empresa": document.getElementById("cod_empresa").value,
        "cod_rol": document.getElementById("cod_rol").value,
    }

    console.log(empleado)
    const response = await fetch(url, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
          },
        body: JSON.stringify(empleado),
    })
    console.log(response)
    if (response.ok) {
        window.location.href = "Empleados.html"
    } else {
        console.log(response.error)
    }
}

async function deleteEmpleado (id) {
    let eliminar = confirm(`Seguro que desea eliminar este Empleado? ${id}`)

    if (eliminar) {
        let url = `http://localhost:8000/api/empleado/${id}`
        // const jsonData = await response.json()
        const response = await fetch(url, {
            method: "DELETE",
        })

        if (response.ok) {
            window.location.href = "Empleados.html"
        } else {
            console.error(response.error)
        }
    }
}