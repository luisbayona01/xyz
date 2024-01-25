function listdatafactura() {
    fetch('factura/listdata')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener los datos');
            }
            return response.json();
        })
        .then(data => {

            leerdata(data);
        })
        .catch(error => {

            console.error('Error:', error);
        });
}

function leerdata(data) {
    let tbody = document.querySelector('.dtosfactura');
    tbody.innerHTML = '';

    data.facturas.forEach(factura => {
        let rowContent = `<tr>
                        <td>${factura.productos}</td>
                        <td>${factura.fecha}</td>
                        <td style="text-align: center;"><input type='number'name='cantidad' value='${factura.cantidad}'onchange="updatecantidad(this,${factura.id},${factura.valor_unitario})" min='1'" ></td>
                        <td>${factura.valor_unitario}</td>
                        <td>${factura.subtotal}</td>
                        <td> <input type='number'name='iva'value='${factura.iva}' onchange="updateiva(this,${factura.id})" min='1' ></td>
                        <td>${factura.valorIva}</td>
                        <td>${factura.totaconliva}</td>
                         <td><button type='button' class='btn btn-danger' onClick='eliminarP(${factura.id})'>Eliminar producto</button> </td>
                      </tr>`;

        // Agrega la fila al tbody
        tbody.innerHTML += rowContent;
    });

}

function eliminarP(idF) {
    //console.log('idfactE',idF)
    let token = $('.csrf_token').val()
    let formdata = new FormData();
    formdata.append('_token', token)
    let url = `/factura/delete/${idF}`;
    //console.log(url);
    ajaxdta(url, formdata)
}

function updatecantidad(cantidad, id, valor_unitario) {
    //console.log(valor_unitario);
    //return false;
    let token = $('.csrf_token').val()

    let formdata = new FormData();
    formdata.append('cantidad', cantidad.value)
    formdata.append('idfactura', id)
    formdata.append('_token', token)
    formdata.append('valor_unitario', valor_unitario)
    let url = '/factura/actualizadata'

    ajaxdta(url, formdata)
}

function updateiva(iva, idfactura) {


    let token = $('.csrf_token').val()


    let formdata = new FormData();
    formdata.append('porcentaje', iva.value)
    formdata.append('idfactura', idfactura)
    formdata.append('_token', token)
    let url = '/factura/actualizadata'
    ajaxdta(url, formdata)
}

function ajaxdta(url, formdata) {
    fetch(url, {
            method: 'POST',
            body: formdata,
        })
        .then(response => response.json())
        .then(data => {
            toastr.success(data['mensaje']);
            listdatafactura()
        })
        .catch(error => {
            // Manejar errores
            console.error('Error en la solicitud POST:', error);
        });

}

$(document).ready(function () {

    listdatafactura();

})
