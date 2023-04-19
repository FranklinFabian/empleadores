$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.select2_general').select2({
        placeholder: "Seleccione una opción",
        dropdownParent: $("#form_modal_submodulo")
    });

});

$("#form_submodulo").submit(function(event){
    event.preventDefault(); //prevent default action
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission

    $.ajax({
        url : post_url,
        type: request_method,
        dataType: 'json',
        data : form_data
    }).done(function(response){ //
        if (response.id !== 0) {
            swal.fire({
                icon: 'success',
                title: 'Registro insertado correctamente',
                showConfirmButton: false,
                timer: 2000
            }).then(function() {
                $('#form_modulo').trigger("reset");
                $('#form_modal_submodulo').modal('hide');
                window.table.draw();
            });
        }else{
            swal.fire({
                icon: 'error',
                title: 'Error de sistema, comuniquese con el administrador',
                showConfirmButton: false,
                timer: 3000
            });
        }
    });


});


$("#id_mod").on('change', function () {
    $("#id_submodulo").prop("disabled", false);
    var pid = $('#model_id').val();
    submodulo($(this).val(), pid);
});

function submodulo (id, pid){
    $("#id_mod option:selected").each(function () {
        $.get( HOST_URL + '/administracion/item/submodulo_catalogo/submodulo/' + id + '/' + pid, function (data) {
            $("#id_submodulo").empty();
            $("#id_submodulo").append("<option></option>");
            if (data){
                $.each(jQuery(data), function () {
                    $("#id_submodulo").append($("<option></option>").val(this['id']).html(this['submodulo']));
                });
            }
        });
    });
}
