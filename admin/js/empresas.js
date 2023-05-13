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
        }

        empresas.push(miEmpresa)
    }); 

    return empresas;
}

async function printEmpresas () {
    let empresas = await getEmpresas();
    let $myTable = document.getElementById("myTable");
    
    editoriales.forEach(element => {
        let $tr = document.createElement("tr");
        $tr.innerHTML = 
        `   <td>${element['cod_empresa']}</td>
            <td>${element['nombre']}</td>
            <td>${element['direccion']}</td>
            <td>${element['telefono']}</td>
            <td>${element['correo']}</td>
            <td>${element['comision']}</td>
            <td>
                <a href='modify.html?id=${element['cod_empresa']}'>Modificar</a>
                <a href='#' onclick="deleteData('${element['cod_empresa']}')">Eliminar</a>
            </td>
        `

        $myTable.appendChild($tr)
    }); 
}

async function insertEmpresa () {
    let btnAddEmpresa = document.getElementById("add-empresa")

    btnAddEmpresa.addEventListener("click", (e)=> {
        e.preventDefault()
    })

    let empresa = {
        "codigo_editorial": document.getElementById("codigo_editorial").value,
        "nombre_editorial": document.getElementById("nombre_editorial").value,
        "contacto": document.getElementById("contacto").value,
        "telefono": document.getElementById("telefono").value,
    }
    const url = 'http://localhost:8000/api/empresa'
    const response = await fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(empresa),
    })

    console.log(empresa)
    if (response.ok) {
        window.location.href = "index.html"
    } else {
        alert(response.error)
    }
}


async function showEmpresa (id) {
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
            "cod_empresa": jsonData ['cod_empresa'],
            "nombre": jsonData['nombre'],
            "direccion": jsonData['direccion'],
            "telefono": jsonData['telefono'],
            "correo": jsonData['correo'],
            "comision": jsonData['comision'],
            "cod_rubro": jsonData['cod_rubro'],
        }
        console.log(miEmpresa)
        
        
            document.getElementById("codigo_editorial").value = miEditorial.codigo_editorial
    
            document.getElementById("nombre_editorial").value = miEditorial.nombre_editorial
    
            document.getElementById("contacto").value = miEditorial.contacto
    
            document.getElementById("telefono").value = miEditorial.telefono
    }, 0);
}

async function updateEmpresa () {
    let btnUpdateEditorial = document.getElementById("update-editorial")

    btnUpdateEditorial.addEventListener("click", (e)=> {
        e.preventDefault()
    })

    let param = new URLSearchParams(window.location.search);
    let id = param.get("id");


    let url = `http://localhost:8000/api/editoriales/${id}`
    // const jsonData = await response.json()
    let editorial = {
        "codigo_editorial": document.getElementById("codigo_editorial").value,
        "nombre_editorial": document.getElementById("nombre_editorial").value,
        "contacto": document.getElementById("contacto").value,
        "telefono": document.getElementById("telefono").value,
    }

    console.log(editorial)
    const response = await fetch(url, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
          },
        body: JSON.stringify(editorial),
    })
    if (response.ok) {
        window.location.href = "index.html"
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
            window.location.href = "index.html"
        } else {
            console.error(response.error)
        }
    }
}