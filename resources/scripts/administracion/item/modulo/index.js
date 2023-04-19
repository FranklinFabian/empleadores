"use strict";

window.loadWindow = function(id, type) {
    var pid = $('#modulo_pid').val();
    $.get(HOST_URL + '/administracion/item/modulo/' + id + '/' + type + '/' + pid + '/edit', function (data) {
        $("#modal-content-modulo").html(data);
        $("#form_modal_modulo").modal("show");
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
        url : HOST_URL + '/administracion/item/modulo/' + id,
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
    var pid = $('#modulo_pid').val();
    var initTable1 = function() {
        window.table = $('#module_datatable').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: HOST_URL + '/administracion/item/modulo_datatable/' + pid,
            },
            columns: [
                { data: 'id', name: 'mhr.id', title: 'Acciones' },
                { data: 'codigo', name: 'r.id', title: 'Id' },
                { data: 'modulo', name: 'r.section', title: 'Módulo' },
            ],
            columnDefs: [
                {
                    targets: 0,
                    searchable: false,
                    width: "300px",
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var boton = '' +
                            '<div align="center">' +

                            '<a href="javascript:itemDelete(\''+data+'\');" class="btn btn-sm btn-outline-danger" style="width:110px;">'+
                            '<i class="fa flaticon-delete">&nbsp;Eliminar</i>'+
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


