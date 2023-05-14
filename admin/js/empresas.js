
if (document.getElementById("add-empresa")) {
    let btnAddEmpresa = document.getElementById("add-empresa")

    btnAddEmpresa.addEventListener("click", e => {
        e.preventDefault()
        insertEmpresa()
    })
}


document.addEventListener("DOMContentLoaded", function () {
let btnUpdateEmpresa = document.getElementById("update-empresa")

btnUpdateEmpresa.addEventListener("click", (e)=> {
    e.preventDefault()
    updateEmpresa()
})
})


async function getEmpresas () {
    const url = 'http://localhost:8000/api/empresa'
    const response = await fetch(url)
    const jsonData = await response.json()
    let empresas = [];
    jsonData.forEach(element => {
        let miEmpresa = {
            "cod_empresa": element['cod_empresa'],
            "nombre": element['nombre'],
            "direccion": element['direccion'],
            "telefono": element['telefono'],
            "correo": element['correo'],
            "comision": element['comision'],
            "cod_rubro": element['cod_rubro'],
            "rubro": element['rubro'],
        }

        empresas.push(miEmpresa)
    }); 

    return empresas;
}

async function printEmpresas () {
    let empresas = await getEmpresas();
    let $myTable = document.getElementById("myTable");
    
    empresas.forEach(element => {
        let $tr = document.createElement("tr");
        $tr.innerHTML = 
        `   <td>${element['cod_empresa']}</td>
            <td>${element['nombre']}</td>
            <td>${element['direccion']}</td>
            <td>${element['telefono']}</td>
            <td>${element['correo']}</td>
            <td>${element['comision']}%</td>
            <td>${element['rubro']}</td>
            <td>
            <a href='EditarEmpresaOfertante.html?id=${element['cod_empresa']}' class="waves-effect waves-light btn">Modificar</a>
            <a href='#' onclick="deleteEmpresa('${element['cod_empresa']}')" class="waves-effect waves-light btn">Eliminar</a>
            </td>
        `

        $myTable.appendChild($tr)
    }); 
}

async function insertEmpresa () {

    let empresa = {
        "cod_empresa": document.getElementById("cod_empresa").value,
        "nombre": document.getElementById("nombre").value,
        "direccion": document.getElementById("direccion").value,
        "telefono": document.getElementById("telefono").value,
        "correo": document.getElementById("correo").value,
        "comision": document.getElementById("comision").value,
        "cod_rubro": document.getElementById("cod_rubro").value,
    }
    const url = 'http://localhost:8000/api/empresa'
    const response = await fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(empresa),
    })
    console.log(JSON.stringify(empresa))
    console.log(response)
    if (response.ok) {
        window.location.href = "EmpresasOfertantes.html"
    } else {
        console.log(response.error)
    }
}


async function showEmpresa () {
    let param = new URLSearchParams(window.location.search);
    let id = param.get("id");

    let url = `http://localhost:8000/api/empresa/${id}`
    // const jsonData = await response.json()
    const response = await fetch(url, {
        method: "GET",
    })
    const jsonData = await response.json()
    setTimeout(() => {
        
        let miEmpresa = {
            "cod_empresa": jsonData[0].cod_empresa,
            "nombre": jsonData[0].nombre,
            "direccion": jsonData[0].direccion,
            "telefono": jsonData[0].telefono,
            "correo": jsonData[0].correo,
            "comision": jsonData[0].comision,
            "cod_rubro": jsonData[0].cod_rubro,
        }
        console.log(jsonData)
        console.log(miEmpresa)
        
        
            document.getElementById("cod_empresa").value = miEmpresa.cod_empresa
    
            document.getElementById("nombre").value = miEmpresa.nombre
    
            document.getElementById("direccion").value = miEmpresa.direccion
    
            document.getElementById("telefono").value = miEmpresa.telefono

            document.getElementById("correo").value = miEmpresa.correo

            document.getElementById("comision").value = miEmpresa.comision

            document.getElementById("cod_rubro").value = miEmpresa.cod_rubro
    }, 0);
}

async function updateEmpresa () {

    let param = new URLSearchParams(window.location.search);
    let id = param.get("id");


    let url = `http://localhost:8000/api/empresa/${id}`
    // const jsonData = await response.json()
    let empresa = {
        // "cod_empresa": document.getElementById("cod_empresa").value,
        "nombre": document.getElementById("nombre").value,
        "direccion": document.getElementById("direccion").value,
        "telefono": document.getElementById("telefono").value,
        "correo": document.getElementById("correo").value,
        "comision": document.getElementById("comision").value,
        "cod_rubro": document.getElementById("cod_rubro").value,
    }
    
    console.log(empresa)
    const response = await fetch(url, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
          },
        body: JSON.stringify(empresa),
    })
    console.log(response)
    if (response.ok) {
        window.location.href = "EmpresasOfertantes.html"
    } else {
        alert(response.error)
    }
}

async function deleteEmpresa (id) {
    let eliminar = confirm(`Seguro que desea eliminar la empresa ${id}`)

    if (eliminar) {
        let url = `http://localhost:8000/api/empresa/${id}`
        // const jsonData = await response.json()
        const response = await fetch(url, {
            method: "DELETE",
        })

        if (response.ok) {
            console.log(response)
            window.location.href = "EmpresasOfertantes.html"
        } else {
            console.error(response.error)
        }
    }
}