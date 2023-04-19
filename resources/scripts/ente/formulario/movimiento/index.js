"use strict";

window.loadWindow = function(id, type) {
    var pid = $('#movimiento_pid').val();
    $.get(HOST_URL + '/ente/formulario/movimiento/' + id + '/' + type + '/' + pid + '/edit', function (data) {
        $("#modal-content-movimiento").html(data);
        $("#form_modal_movimiento").modal("show");
    });
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
        url : HOST_URL + '/ente/formulario/movimiento/' + id,
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
    var pid = $('#movimiento_pid').val();
    var initTable1 = function() {
        window.table = $('#movimiento_datatable').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            language: {
                url: '/storage/lang/spanish.json'
            },
            ajax: {
                url: HOST_URL + '/ente/formulario/movimiento_datatable/' + pid,
            },
            columns: [

                { data: 'id', name: 'm.id', title: 'Acciones' },
                { data: 'estado_empleador', name: 'cee.nombre', title: 'Estado' },
                { data: 'fecha', name: 'm.fecha', title: 'Fecha' },
            ],
            columnDefs: [
                {
                    targets: 0,
                    searchable: false,
                    width: "220px",
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var boton = '' +
                            '<div align="center">' +

                            '<a href="javascript:loadWindow(\''+data+'\' , \'update\');" class="btn btn-sm btn-outline-success mr-2" style="width: 105px;">'+
                            '<i class="fa flaticon-edit"></i>&nbsp;Editar'+
                            '</a>'+

                            '<a href="javascript:itemDelete(\''+data+'\');" class="btn btn-sm btn-outline-danger" style="width:105px;">'+
                            '<i class="fa flaticon-delete"></i>&nbsp;Eliminar'+
                            '</a>'+


                            '</div>';

                        return boton;
                    }
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
});


