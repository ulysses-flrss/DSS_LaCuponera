if (document.getElementById("add-rubro")) {
    let btnAddrubro = document.getElementById("add-rubro")

    btnAddrubro.addEventListener("click", e => {
        e.preventDefault()
        insertrubro()
    })
}


document.addEventListener("DOMContentLoaded", function () {
    let btnUpdaterubro = document.getElementById("update-rubro")

    btnUpdaterubro.addEventListener("click", (e) => {
        e.preventDefault()
        updaterubro()
    })
})

async function getRubros () {
    const url = 'http://localhost:8000/api/rubro'
    const response = await fetch(url)
    const jsonData = await response.json()
    let rubros = [];
    jsonData.forEach(element => {
        let miRubro = {
            "cod_rubro": element['cod_rubro'],
            "rubro": element['rubro']
        }

        rubros.push(miRubro)
    }); 

    return rubros;
}

async function printRubros () {
    let rubros = await getRubros();
    let $myTable = document.getElementById("myTable");
    
    rubros.forEach(element => {
        let $tr = document.createElement("tr");
        $tr.innerHTML = 
        `   <td>${element['cod_rubro']}</td>
            <td>${element['rubro']}</td>
            <td>
                <a href='EditarRubros.html?id=${element['cod_rubro']}' class="waves-effect waves-light btn">Modificar</a>
                <a href='#' onclick="deleteRubro('${element['cod_rubro']}')" class="waves-effect waves-light btn">Eliminar</a>
            </td>
        `

        $myTable.appendChild($tr)
    }); 
}

async function insertRubros () {


    let rubro = {
        "rubro": document.getElementById("rubro").value,
    }
    
    const url = 'http://localhost:8000/api/rubro'
    const response = await fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(rubro),
    })

    console.log(response)
    if (response.ok) {
        window.location.href = "Rubros.html"
    } else {
        alert(response.error)
    }
}

async function showRubro () {
    let param = new URLSearchParams(window.location.search);
    let id = param.get("id");

    let url = `http://localhost:8000/api/rubro/${id}`
    // const jsonData = await response.json()
    const response = await fetch(url, {
        method: "GET",
    })
    const jsonData = await response.json()

    setTimeout(() => {
        
        let miRubro = {

            "rubro": jsonData[0].rubro
        }

        
        
            document.getElementById("rubro").value = miRubro.rubro
    }, 0);
}

async function updateRubro () {
   
    let param = new URLSearchParams(window.location.search);
    let id = param.get("id");


    let url = `http://localhost:8000/api/rubro/${id}`
    // const jsonData = await response.json()
    let rubro = {
        "rubro": document.getElementById("rubro").value
    }

    console.log(rubro)
    const response = await fetch(url, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
          },
        body: JSON.stringify(rubro),
    })
    console.log(response)
    if (response.ok) {
        window.location.href = "Rubros.html"
    } else {
        console.log(response.error)
    }
}

async function deleteRubro (id) {
    let eliminar = confirm(`Seguro que desea eliminar este Rubro? ${id}`)

    if (eliminar) {
        let url = `http://localhost:8000/api/rubro/${id}`
        // const jsonData = await response.json()
        const response = await fetch(url, {
            method: "DELETE",
        })

        if (response.ok) {
            window.location.href = "Rubros.html"
        } else {
            console.error(response.error)
        }
    }
}