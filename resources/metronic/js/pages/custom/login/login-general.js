"use strict";

var KTLogin = function() {
    var _login;

    var _showForm = function(form) {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-forgot-on');
        _login.removeClass('login-signin-on');
        _login.removeClass('login-signup-on');

        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    };

    var _handleSignInForm = function() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_signin_form'),
			{
				fields: {
					email: {
						validators: {
							notEmpty: {
								message: 'Se requiere nombre de usuario.'
							},
							emailAddress: {
								message: 'El texto ingresado no es un correo válido.'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Se requiere contraseña.'
							}
						}
					}
				},
				plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    //submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#kt_login_signin_submit').on('click', function (e) {
            e.preventDefault();
            validation.validate();
        });

        // Handle forgot button
        $('#kt_login_forgot').on('click', function (e) {
            e.preventDefault();
            _showForm('forgot');
        });

        // Handle signup
        $('#kt_login_signup').on('click', function (e) {
            e.preventDefault();
            _showForm('signup');
        });

    };

    var _handleSignUpForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_signup_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    fullname: {
                        validators: {
                            notEmpty: {
                                message: 'Username is required'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email address is required'
                            },
                            emailAddress: {
                                message: 'The value is not a valid email address'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            }
                        }
                    },
                    cpassword: {
                        validators: {
                            notEmpty: {
                                message: 'The password confirmation is required'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
                        }
                    },
                    agree: {
                        validators: {
                            notEmpty: {
                                message: 'Debes aceptar los terminos y condiciones'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        );

        $('#kt_login_signup_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    swal.fire({
                        text: "Sus datos fueron registrados satisfactoriamente",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 2000,
                    }).then(function() {
                        _showForm('signin');
                        //KTUtil.scrollTop();
                    });
                } else {
                    swal.fire({
                        text: "Se detectaron errores en su registro, porfavor intente de nuevo.",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 2000,
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            });
        });

        // Handle cancel button
        $('#kt_login_signup_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
    };

    var _handleForgotForm = function(e) {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_forgot_form'),
			{
				fields: {
					email: {
						validators: {
							notEmpty: {
								message: 'Se requiere una dirección de correo electrónico.'
							},
                            emailAddress: {
								message: 'El texto ingresado no es un correo válido.'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        // Handle submit button
        $('#kt_login_forgot_submit').on('click', function (e) {
            e.preventDefault();

			validation.validate().then(function(status) {
				if (status == 'Valid') {
					swal.fire({
						text: "Se envio la nueva contraseña al correo electrónico indicado.",
						icon: "success",
						buttonsStyling: false,
						confirmButtonText: "Ok, entendido!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light-primary"
						}
					}).then(function() {
						KTUtil.scrollTop();
					});
				} else {
					swal.fire({
						text: "Se detectaron algunos errores, porfavor intente de nuevo.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, entendido!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light-primary"
						}
					}).then(function() {
						KTUtil.scrollTop();
					});
				}
			});

        });

        // Handle cancel button
        $('#kt_login_forgot_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
    };

    // Public Functions
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');

            _handleSignInForm();
            //_handleSignUpForm();
            //_handleForgotForm();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    KTLogin.init();
	$("#email").on("input", function() {
		$( "#logueofallido" ).hide();
	});


});


$("#form_register").submit(function(event){
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
                location.reload();
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
