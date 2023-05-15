async function getClientes () {
    const url = 'http://localhost:8000/api/cliente'
    const response = await fetch(url)
    const jsonData = await response.json()
    let clientes = [];
    jsonData.forEach(element => {
        let miCliente = {
            "cod_usuario": element['cod_usuario'],
            "nombres": element['nombres'],
            "apellidos": element['apellidos'],
            "telefono": element['telefono'],
            "dui": element['dui'],
            "correo": element['correo']
        }

        clientes.push(miCliente)
    }); 

    return clientes;
}

async function printClientes () {
    let cliente = await getClientes();
    let $myTable = document.getElementById("myTable");
    
    cliente.forEach(element => {
        let $tr = document.createElement("tr");
        $tr.innerHTML = 
        `   <td>${element['cod_usuario']}</td>
            <td>${element['nombres']}</td>
            <td>${element['apellidos']}</td>
            <td>${element['telefono']}</td>
            <td>${element['dui']}</td>
            <td>${element['correo']}</td>
        `

        $myTable.appendChild($tr)
    }); 
}
