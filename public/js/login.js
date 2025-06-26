document.addEventListener('DOMContentLoaded', function () {
    validarFormularioInicioSesion();
});

const mostrarAlerta = (icon, title, content, type, buttons) => {
    $.confirm({
        icon: icon,
        title: title,
        content: content,
        type: type,
        typeAnimated: true,
        buttons: buttons
    });
};

document.getElementById('registrarUsuario').addEventListener('click', function () {
    formularioRegistrarUsuario();
});

const formularioRegistrarUsuario = () => {
    $.confirm({
        title: "Creación de Usuario",
        type: 'blue',
        onContentReady: function () {
            validarFormularioRegistrarUsuario();
        },
        columnClass: 'small',
        content: `
            <form id="frmCrearUsuario">
                <div class="form-group col-xs-12">
                    <label for="userName">Nombre de usuario</label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-user-circle"></i> </span>
                        <input type="text" name="userName" id="userName" autocomplete="off" class="form-control" placeholder="Ejemplo: juanperez01">      
                    </div>
                </div>
                <div class="form-group col-xs-12">
                    <label for="userEmail">Correo electrónico</label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-envelope"></i> </span>
                        <input type="email" name="userEmail" id="userEmail" autocomplete="off" class="form-control" placeholder="Ejemplo: correo@correo.com">
                    </div>
                </div>
                <div class="form-group col-xs-12">
                    <label for="userPassword">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                        <input type="password" name="userPassword" id="userPassword" autocomplete="off" class="form-control" placeholder="Ingrese una contraseña segura">
                    </div>
                </div>
                <div class="form-group col-xs-12">
                    <label for="confirmPassword">Confirmar Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                        <input type="password" name="confirmPassword" id="confirmPassword" autocomplete="off" class="form-control" placeholder="Confirme su contraseña">
                    </div>
                </div>
            </form>
        `,
        buttons: {
            formSubmit: {
                text: 'Crear',
                btnClass: 'btn-blue',
                action: function () {
                    $('#frmCrearUsuario').submit();
                    return false;
                }
            },
            cancel: {
                text: 'Cerrar',
                btnClass: 'btn-red',
                action: function () {
                }
            }
        }
    });
};

const validarFormularioRegistrarUsuario = () => {
    $('#frmCrearUsuario')
        .bootstrapValidator({
            excluded: ':disabled',
            message: 'Este Valor no es Valido',
            feedbackIcons: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                userName: {
                    validators: {
                        notEmpty: {
                            message: 'El nombre de usuario es requerido'
                        },
                        stringLength: {
                            min: 5,
                            max: 50,
                            message: 'El nombre de usuario debe tener entre 5 y 50 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_.\-@]+$/,
                            message: 'El nombre de usuario solo puede contener letras, números, guiones bajos, puntos y guiones'
                        }
                    }
                },
                userEmail: {
                    validators: {
                        notEmpty: {
                            message: 'El correo electrónico es requerido'
                        },
                        emailAddress: {
                            message: 'El correo electrónico no es válido'
                        }
                    }
                },
                userPassword: {
                    validators: {
                        notEmpty: {
                            message: 'La contraseña es requerida'
                        },
                        stringLength: {
                            min: 6,
                            message: 'La contraseña debe tener al menos 6 caracteres'
                        }
                    }
                },
                confirmPassword: {
                    validators: {
                        notEmpty: {
                            message: 'La contraseña es requerida'
                        },
                        identical: {
                            field: 'userPassword',
                            message: 'Las contraseñas no coinciden'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function (e) {
            e.preventDefault();
            const $form = $(e.target);
            const bv = $form.data('bootstrapValidator');
            ajax('registrarUsuario', 'POST', $form.serialize(), 'json', confirmarUsuarioRegistrado);
            bv.disableSubmitButtons(false);
        });
};

const confirmarUsuarioRegistrado = (response) => {
    if (response.status === 'success') {
        mostrarAlerta('fa fa-check',
            'Éxito',
            'Usuario registrado correctamente.',
            'green',
            {
                Cerrar: function () {
                    location.reload();
                }
            }
        );
    } else {
        mostrarAlerta('fa fa-times',
            'Error',
            response.message,
            'red',
            {
                Cerrar: function () { }
            }
        );
    }
};

const validarFormularioInicioSesion = () => {
    $('#frmLogin')
        .bootstrapValidator({
            excluded: ':disabled',
            message: 'Este Valor no es Valido',
            feedbackIcons: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                userNameLogin: {
                    validators: {
                        notEmpty: {
                            message: 'El nombre de usuario es requerido'
                        }
                    }
                },
                userPasswordLogin: {
                    validators: {
                        notEmpty: {
                            message: 'La contraseña es requerida'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function (e) {
            e.preventDefault();
            const $form = $(e.target);
            const bv = $form.data('bootstrapValidator');
            ajax('login', 'POST', $form.serialize(), 'json', confirmarInicioSesion);
            bv.disableSubmitButtons(false);
        });
};

const confirmarInicioSesion = (response) => {
    if (response.status === 'success') {
        mostrarAlerta('fa fa-check',
            'Éxito',
            'Inicio de sesión exitoso.',
            'green',
            {
                Inicio: function () {
                    window.location.href = 'inicio';
                }
            }
        );
    } else {
        mostrarAlerta('fa fa-times',
            'Error',
            response.message,
            'red',
            {
                Cerrar: function () { }
            }
        );
    }
};