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