"use strict";

window.loadWindow = function(id, tipo) {
    window.location.href = HOST_URL + '/ente/formulario/tab/' + id + '/' + tipo ;
};

window.itemPdf = function(id) {
    window.open('/ente/formulario/item/ficha_pdf/' + id, '_blank');
};

window.itemDelete = function(id){
    Swal.fire({
        title: 'Esta seguro de borrar el registro?',
        text: "Recuerde que el registro se eliminará permanentemente.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Eliminar!!!',
        cancelButtonText: "No, cancelar"
    }).then(function(result) {
        if (result.value) {
            itemDeleteAction(id);
        }
    });
};

function itemDeleteAction(id){
    $.ajax({
        url : HOST_URL + '/ente/formulario/item/' + id,
        type: 'DELETE'
    }).done(function(response){
        if (response == 1){
            Swal.fire({
                icon: 'success',
                title: 'El registro fue borrado satisfactoriamente',
                showConfirmButton: false,
                timer: 2000
            });
        }else{
            Swal.fire({
                icon: 'error',
                title: 'El registro no puede ser eliminado, primero debe borrar los registros relacionados',
                showConfirmButton: false,
                timer: 4000
            });
        }
        window.table.draw();
    });

}


var KTDatatablesDataSourceAjaxServer = function() {
    var initTable1 = function() {
        window.table = $('#kt_datatable').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            language: {
                url: '/storage/lang/spanish.json'
            },
            ajax: {
                url: HOST_URL + '/ente/formulario/item',
                type: 'GET'
            },
            columns: [
                { data: 'id', name: 'e.razon_social', title: 'Acciones' },
                { data: 'razon_social', name: 'e.razon_social', title: 'Razon Social' },
                { data: 'estado', name: 'cee.nombre', title: 'Estado' },
                { data: 'ente', name: 'ceg.nombre', title: 'ID' },
                { data: 'departamento', name: 'cd.nombre', title: 'Departamento' }
            ],
            columnDefs: [
                {
                    targets: 0,
                    searchable: false,
                    width: "320px",
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var boton;
                        boton =
                            '<div align="center">' +

                                '<a href="javascript:loadWindow(\''+data+'\',\'update\');" class="btn btn-outline-primary btn-sm mr-2 mb-2">'+
                                    '<i class="flaticon2-menu-4"></i>&nbsp;Ingresar'+
                                '</a>'+

                                '<a href="javascript:itemDelete(\''+data+'\');" class="btn btn-sm btn-outline-danger mr-2 mb-2">'+
                                    '<i class="fa flaticon-delete"></i>&nbsp;Eliminar'+
                                '</a>'+

                                '<a href="javascript:itemPdf(\''+data+'\');" class="btn btn-outline-success btn-sm mr-2 mb-2">'+
                                    '<i class="far fa-file-pdf"></i>&nbsp;Imprimir'+
                                '</a>'+

                            '</div>';
                        return boton;
                    },
                },
            ],
        });
    };

    return {

        //main function to initiate the module
        init: function() {
            initTable1();
        },

    };

}();

jQuery(document).ready(function() {
    KTDatatablesDataSourceAjaxServer.init();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

