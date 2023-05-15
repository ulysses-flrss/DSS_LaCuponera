async function getEsperaAprobacion () {
    const url = 'http://localhost:8000/api/ofertas/espera'
    const response = await fetch(url)
    const jsonData = await response.json()
    let ofertas = [];
    jsonData.forEach(element => {
        let miOferta = {
            "cod_oferta": element['cod_oferta'],
            "titulo": element['titulo'],
            'precio_regular': element['precio_regular'],
            'precio_oferta': element['precio_oferta'],
            'inicio_oferta': element['inicio_oferta'],
            'fin_oferta': element['fin_oferta'],
            'fechaLimite_cupon': element['fechaLimite_cupon'],
            'descripcion': element['descripcion'],
            'estado': element['estado'],
            'cod_empresa': element['cod_empresa'],
        }
        ofertas.push(miOferta)
    }); 

    return ofertas;
}

async function printEsperaAprobacion () {
    let ofertas = await getEsperaAprobacion();
    let $myTable = document.getElementById("myTable");
    
    ofertas.forEach(element => {
        let $tr = document.createElement("tr");
        $tr.innerHTML = 
        `   <td>${element['titulo']}</td>
            <td>${element['precio_regular']}</td>
            <td>${element['precio_oferta']}</td>
            <td>${element['inicio_oferta']}</td>
            <td>${element['fin_oferta']}</td>
            <td>${element['fechaLimite_cupon']}</td>
            <td>${element['descripcion']}</td>
            <td>${element['estado']}</td>
            <td>${element['cod_empresa']}</td>
        `

        $myTable.appendChild($tr)
    }); 
}

async function getFuturaAprobacion () {
    const url = 'http://localhost:8000/api/ofertas/futuras'
    const response = await fetch(url)
    const jsonData = await response.json()
    let ofertas = [];
    jsonData.forEach(element => {
        let miOferta = {
            "titulo": element['titulo'],
            'precio_regular': element['precio_regular'],
            'precio_oferta': element['precio_oferta'],
            'inicio_oferta': element['inicio_oferta'],
            'fin_oferta': element['fin_oferta'],
            'fechaLimite_cupon': element['fechaLimite_cupon'],
            'descripcion': element['descripcion'],
            'estado': element['estado'],
            'cod_empresa': element['cod_empresa'],
        }
        ofertas.push(miOferta)
    }); 

    return ofertas;
}

async function printFuturaAprobacion () {
    let ofertas = await getFuturaAprobacion();
    let $myTable = document.getElementById("myTable2");
    
    ofertas.forEach(element => {
        let $tr = document.createElement("tr");
        $tr.innerHTML = 
        `   <td>${element['titulo']}</td>
            <td>${element['precio_regular']}</td>
            <td>${element['precio_oferta']}</td>
            <td>${element['inicio_oferta']}</td>
            <td>${element['fin_oferta']}</td>
            <td>${element['fechaLimite_cupon']}</td>
            <td>${element['descripcion']}</td>
            <td>${element['estado']}</td>
            <td>${element['cod_empresa']}</td>
        `

        $myTable.appendChild($tr)
    }); 
}

async function getOfertaActiva () {
    const url = 'http://localhost:8000/api/ofertas/activas'
    const response = await fetch(url)
    const jsonData = await response.json()
    let ofertas = [];
    jsonData.forEach(element => {
        let miOferta = {
            "titulo": element['titulo'],
            'precio_regular': element['precio_regular'],
            'precio_oferta': element['precio_oferta'],
            'inicio_oferta': element['inicio_oferta'],
            'fin_oferta': element['fin_oferta'],
            'fechaLimite_cupon': element['fechaLimite_cupon'],
            'descripcion': element['descripcion'],
            'estado': element['estado'],
            'cod_empresa': element['cod_empresa'],
        }
        ofertas.push(miOferta)
    }); 

    return ofertas;
}
async function printOfertaActiva () {
    let ofertas = await getOfertaActiva();
    let $myTable = document.getElementById("myTable3");
    
    ofertas.forEach(element => {
        let $tr = document.createElement("tr");
        $tr.innerHTML = 
        `   <td>${element['titulo']}</td>
            <td>${element['precio_regular']}</td>
            <td>${element['precio_oferta']}</td>
            <td>${element['inicio_oferta']}</td>
            <td>${element['fin_oferta']}</td>
            <td>${element['fechaLimite_cupon']}</td>
            <td>${element['descripcion']}</td>
            <td>${element['estado']}</td>
            <td>${element['cod_empresa']}</td>
        `

        $myTable.appendChild($tr)
    }); 
}

async function getOfertaPasada () {
    const url = 'http://localhost:8000/api/ofertas/pasadas'
    const response = await fetch(url)
    const jsonData = await response.json()
    let ofertas = [];
    jsonData.forEach(element => {
        let miOferta = {
            "titulo": element['titulo'],
            'precio_regular': element['precio_regular'],
            'precio_oferta': element['precio_oferta'],
            'inicio_oferta': element['inicio_oferta'],
            'fin_oferta': element['fin_oferta'],
            'fechaLimite_cupon': element['fechaLimite_cupon'],
            'descripcion': element['descripcion'],
            'estado': element['estado'],
            'cod_empresa': element['cod_empresa'],
        }
        ofertas.push(miOferta)
    }); 

    return ofertas;
}

async function printofertaPasada () {
    let ofertas = await getOfertaPasada();
    let $myTable = document.getElementById("myTable4");
    
    ofertas.forEach(element => {
        let $tr = document.createElement("tr");
        $tr.innerHTML = 
        `   <td>${element['titulo']}</td>
            <td>${element['precio_regular']}</td>
            <td>${element['precio_oferta']}</td>
            <td>${element['inicio_oferta']}</td>
            <td>${element['fin_oferta']}</td>
            <td>${element['fechaLimite_cupon']}</td>
            <td>${element['descripcion']}</td>
            <td>${element['estado']}</td>
            <td>${element['cod_empresa']}</td>
        `

        $myTable.appendChild($tr)
    }); 
}

async function getOfertaRechazada () {
    const url = 'http://localhost:8000/api/ofertas/rechazadas'
    const response = await fetch(url)
    const jsonData = await response.json()
    let ofertas = [];
    jsonData.forEach(element => {
        let miOferta = {
            "titulo": element['titulo'],
            'precio_regular': element['precio_regular'],
            'precio_oferta': element['precio_oferta'],
            'inicio_oferta': element['inicio_oferta'],
            'fin_oferta': element['fin_oferta'],
            'fechaLimite_cupon': element['fechaLimite_cupon'],
            'descripcion': element['descripcion'],
            'estado': element['estado'],
            'cod_empresa': element['cod_empresa'],
        }
        ofertas.push(miOferta)
    }); 

    return ofertas;
}

async function printOfertaRechazada () {
    let ofertas = await getOfertaRechazada();
    let $myTable = document.getElementById("myTable5");
    
    ofertas.forEach(element => {
        let $tr = document.createElement("tr");
        $tr.innerHTML = 
        `   <td>${element['titulo']}</td>
            <td>${element['precio_regular']}</td>
            <td>${element['precio_oferta']}</td>
            <td>${element['inicio_oferta']}</td>
            <td>${element['fin_oferta']}</td>
            <td>${element['fechaLimite_cupon']}</td>
            <td>${element['descripcion']}</td>
            <td>${element['estado']}</td>
            <td>${element['cod_empresa']}</td>
        `

        $myTable.appendChild($tr)
    }); 
}

async function getOfertaDescartada () {
    const url = 'http://localhost:8000/api/ofertas/descartadas'
    const response = await fetch(url)
    const jsonData = await response.json()
    let ofertas = [];
    jsonData.forEach(element => {
        let miOferta = {
            "titulo": element['titulo'],
            'precio_regular': element['precio_regular'],
            'precio_oferta': element['precio_oferta'],
            'inicio_oferta': element['inicio_oferta'],
            'fin_oferta': element['fin_oferta'],
            'fechaLimite_cupon': element['fechaLimite_cupon'],
            'descripcion': element['descripcion'],
            'estado': element['estado'],
            'cod_empresa': element['cod_empresa'],
        }
        ofertas.push(miOferta)
    }); 

    return ofertas;
}

async function printOfertaDescartada () {
    let ofertas = await getOfertaDescartada();
    let $myTable = document.getElementById("myTable6");
    
    ofertas.forEach(element => {
        let $tr = document.createElement("tr");
        $tr.innerHTML = 
        `   <td>${element['titulo']}</td>
            <td>${element['precio_regular']}</td>
            <td>${element['precio_oferta']}</td>
            <td>${element['inicio_oferta']}</td>
            <td>${element['fin_oferta']}</td>
            <td>${element['fechaLimite_cupon']}</td>
            <td>${element['descripcion']}</td>
            <td>${element['estado']}</td>
            <td>${element['cod_empresa']}</td>
        `

        $myTable.appendChild($tr)
    }); 
}
