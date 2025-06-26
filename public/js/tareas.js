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

document.getElementById('btnAddTarea').addEventListener('click', e => {
    formularioCrearTarea();
});

const formularioCrearTarea = () => {
    $.confirm({
        title: "Nueva Tarea",
        type: 'blue',
        onContentReady: function () {
            validarFormularioCrearTarea();
        },
        columnClass: 'medium',
        content: `
            <form id="frmCrearTarea">
                <div class="form-group col-xs-12">
                    <label for="tareaTitulo">Título de la Tarea</label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-tasks"></i> </span>
                        <input type="text" name="tareaTitulo" id="tareaTitulo" autocomplete="off" class="form-control" placeholder="Ejemplo: Reunión con el cliente">
                    </div>
                </div>
                <div class="form-group col-xs-12">
                    <label for="tareaDescripcion">Descripción de la Tarea</label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-info-circle"></i> </span>
                        <textarea name="tareaDescripcion" id="tareaDescripcion" class="form-control" rows="5" placeholder="Descripción detallada de la tarea"></textarea>
                    </div>
                </div>
                <div class="form-group col-xs-12">
                    <label for="tareaFechaVencimiento">Fecha de Vencimiento</label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                        <input type="date" name="tareaFechaVencimiento" id="tareaFechaVencimiento" class="form-control">
                    </div>
                </div>
                <div class="form-group col-xs-12">
                    <label for="tareaPrioridad">Prioridad de la Tarea</label>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-exclamation-triangle"></i> </span>
                        <select name="tareaPrioridad" id="tareaPrioridad" class="form-control">
                            <option value="" disabled selected>Seleccione una prioridad</option>
                            <option value="baja">Baja</option>
                            <option value="media">Media</option>
                            <option value="alta">Alta</option>
                        </select>
                    </div>
                </div>
            </form>
        `,
        buttons: {
            formSubmit: {
                text: 'Crear',
                btnClass: 'btn-blue',
                action: function () {
                    $('#frmCrearTarea').submit();
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

const validarFormularioCrearTarea = () => {
    $('#frmCrearTarea')
        .bootstrapValidator({
            excluded: ':disabled',
            message: 'Este Valor no es Valido',
            feedbackIcons: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                tareaTitulo: {
                    validators: {
                        notEmpty: {
                            message: 'El título de la tarea es obligatorio'
                        },
                        stringLength: {
                            min: 5,
                            max: 100,
                            message: 'El título debe tener entre 5 y 100 caracteres'
                        }
                    }
                },
                tareaDescripcion: {
                    validators: {
                        notEmpty: {
                            message: 'La descripción de la tarea es obligatoria'
                        },
                        stringLength: {
                            min: 10,
                            max: 500,
                            message: 'La descripción debe tener entre 10 y 500 caracteres'
                        }
                    }
                },
                tareaFechaVencimiento: {
                    validators: {
                        notEmpty: {
                            message: 'La fecha de vencimiento es obligatoria'
                        },
                        date: {
                            format: 'YYYY-MM-DD',
                            message: 'La fecha de vencimiento no es válida'
                        }
                    }
                },
                tareaPrioridad: {
                    validators: {
                        notEmpty: {
                            message: 'La prioridad de la tarea es obligatoria'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function (e) {
            e.preventDefault();
            const $form = $(e.target);
            const bv = $form.data('bootstrapValidator');
            ajax('crearTarea', 'POST', $form.serialize(), 'json', confirmarTareaCreada);
            bv.disableSubmitButtons(false);
        });
};

const confirmarTareaCreada = (response) => {
    if (response.status === 'success') {
        mostrarAlerta('fa fa-check', 'Éxito', 'Tarea creada correctamente.', 'green', {
            Cerrar: function () {
                location.reload();
            }
        });
    } else {
        mostrarAlerta('fa fa-times', 'Error', response.message, 'red', {
            Cerrar: function () { }
        });
    }
}