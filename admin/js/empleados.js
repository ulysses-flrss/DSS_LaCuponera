async function getEmpleados () {
    const url = 'http://localhost:8000/api/empleado'
    const response = await fetch(url)
    const jsonData = await response.json()
    let empleados = [];
    jsonData.forEach(element => {
        let miEmpleado = {
            "cod_usuario": element['cod_usuario'],
            "nombres": element['nombres'],
            "apellidos": element['nombres'],
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
    
    editoriales.forEach(element => {
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
                <a href='modify.html?id=${element['cod_usuario']}' class="waves-effect waves-light btn">Modificar</a>
                <a href='#' onclick="deleteData('${element['cod_usuario']}')" class="waves-effect waves-light btn">Eliminar</a>
            </td>
        `

        $myTable.appendChild($tr)
    }); 
}

async function insertEmpleado () {
    let btnAddEmpleado = document.getElementById("add-empleado")

    btnAddEmpleado.addEventListener("click", (e)=> {
        e.preventDefault()
    })

    let empleado = {
        "nombres": document.getElementById("nombres").value,
        "apellidos": document.getElementById("apellidos").value,
        "telefono": document.getElementById("telefono").value,
        "dui": document.getElementById("dui").value,
        "correo": document.getElementById("correo").value,
        "cod_empresa": document.getElementById("cod_empresa").value,
    }
    const url = 'http://localhost:8000/api/empleado'
    const response = await fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(empleado),
    })

    console.log(empleado)
    if (response.ok) {
        window.location.href = "Empleados.html"
    } else {
        alert(response.error)
    }
}

async function showEmpleado (id) {
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
            "cod_usuario": jsonData ['cod_usuario'],
            "nombres": jsonData['nombres'],
            "apellidos": jsonData['apellidos'],
            "telefono": jsonData['telefono'],
            "dui": jsonData['dui'],
            "correo": jsonData['correo'],
            "cod_empresa": jsonData['cod_empresa'],
        }
        console.log(miEmpleado)
        
        
            document.getElementById("nombres").value = miEditorial.nombres
    
            document.getElementById("apellidos").value = miEditorial.apellidos
    
            document.getElementById("telefono").value = miEditorial.telefono
    
            document.getElementById("dui").value = miEditorial.dui

            document.getElementById("correo").value = miEditorial.correo

            document.getElementById("cod_empresa").value = miEditorial.cod_empresa

    }, 0);
}