$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.select2_general').select2({
        placeholder: "Seleccione una opción",
        dropdownParent: $("#form_modal_modulo")
    });

});

$("#form_modulo").submit(function(event){
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
                $('#form_modal_modulo').modal('hide');
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
