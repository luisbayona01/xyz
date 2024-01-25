  function AgregaProductoFactura(idproducto, valorunitario) {

            let token = $('.csrf_token').val();

            const formdata = new FormData();
            formdata.append('id_producto', idproducto);
            formdata.append('valor_unitario', valorunitario)
            formdata.append('_token', token)
            fetch('/factura/addproduct', {
                    method: 'POST',
                    body: formdata,
                })
                .then(response => response.json())
                .then(data => {
                    toastr.success(data['mensaje']);
                    cantidad()
                })
                .catch(error => {
                    // Manejar errores
                    console.error('Error en la solicitud POST:', error);
                });




        }

        function cantidad() {
            fetch('/factura/cantidadproductosA')
                .then(response => response.json())
                .then(data => {
                    $("#cantidad").text(data.cantidad)

                    //console.log('Cantidad de productos:', data.cantidad);
                })
                .catch(error => {

                    console.error('Error al obtener la cantidad de productos:', error);
                });
        }
        $(document).ready(function() {

            cantidad();


        })
