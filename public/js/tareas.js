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

let modalCrearTarea = null;

const formularioCrearTarea = () => {
    modalCrearTarea = $.confirm({
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
                dt_tareas.ajax.reload();
                modalCrearTarea.close();
            }
        });
    } else {
        mostrarAlerta('fa fa-times', 'Error', response.message, 'red', {
            Cerrar: function () { }
        });
    }
}

let dt_tareas = $('#dt_tareas').DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "No se encontraron registros",
        // "info": "Mostrando página _PAGE_ de _PAGES_",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
        "infoEmpty": "No Hay registros disponibles",
        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
        "search": "Buscar:",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        searchBuilder: {
            add: 'Añadir condición',
            condition: 'Condición',
            conditions: {
                "date": {
                    "after": "Despues",
                    "before": "Antes",
                    "between": "Entre",
                    "empty": "Vacío",
                    "equals": "Igual a",
                    "notBetween": "No entre",
                    "notEmpty": "No Vacio",
                    "not": "Diferente de"
                },
                "number": {
                    "between": "Entre",
                    "empty": "Vacio",
                    "equals": "Igual a",
                    "gt": "Mayor a",
                    "gte": "Mayor o igual a",
                    "lt": "Menor que",
                    "lte": "Menor o igual que",
                    "notBetween": "No entre",
                    "notEmpty": "No vacío",
                    "not": "Diferente de"
                },
                "string": {
                    "contains": "Contiene",
                    "empty": "Vacío",
                    "endsWith": "Termina en",
                    "equals": "Igual a",
                    "notEmpty": "No Vacio",
                    "startsWith": "Empieza con",
                    "not": "Diferente de",
                    "notContains": "No Contiene",
                    "notStarts": "No empieza con",
                    "notEnds": "No termina con"
                },
                "array": {
                    "not": "Diferente de",
                    "equals": "Igual",
                    "empty": "Vacío",
                    "contains": "Contiene",
                    "notEmpty": "No Vacío",
                    "without": "Sin"
                }
            },
            clearAll: 'Borrar todo',
            delete: 'Eliminar',
            deleteTitle: 'Eliminar regla de filtrado',
            data: 'Data',
            // left: 'Izquierda',
            leftTitle: 'Criterios anulados',
            logicAnd: 'Y',
            logicOr: 'O',
            // right: 'Derecha',
            rightTitle: 'Criterios de sangría',
            title: {
                0: 'Constructor de búsqueda',
                _: 'Constructor de búsqueda (%d)'
            },
            value: 'Valor',
            valueJoiner: 'et'
        }
    },
    "deferRender": true,
    dom: 'Qfrtip',
    select: {
        style: 'multi'
    },
    "ajax": {
        "url": "listarTareas",
        data: {},
        beforeSend: function (xhr) {
            $('.preload').removeClass('hidden');
        },
        complete: function (xhr) {
            $('.preload').addClass('hidden');
        },
        dataType: "json",
        "type": "POST"
    },
    columns: [
        { data: 'idTarea' },
        { data: 'tituloTarea' },
        { data: 'descripcionTarea' },
        { data: 'fechaVencimientoTarea' },
        { data: 'prioridadTarea' },
        { data: 'tareaCompleta' },
        { data: 'created_at' },
        { data: 'updated_at' },
        { data: 'acciones' },
    ],
    "scrollX": true,
    "order": [[3, "asc"]],
    "displayLength": 10
});

const terminarTarea = (idTarea) => {
    $.confirm({
        title: 'Confirmar',
        content: '¿Estás seguro de que deseas marcar esta tarea como completada?, esta acción no se puede deshacer.',
        type: 'green',
        buttons: {
            confirm: {
                text: 'Sí, completar',
                btnClass: 'btn-green',
                action: function () {
                    ajax('terminarTarea', 'POST', { idTarea: idTarea }, 'json', function (response) {
                        if (response.status === 'success') {
                            mostrarAlerta('fa fa-check', 'Éxito', 'Tarea completada correctamente.', 'green', {
                                Cerrar: function () {
                                    dt_tareas.ajax.reload();
                                }
                            });
                        } else {
                            mostrarAlerta('fa fa-times', 'Error', response.message, 'red', {
                                Cerrar: function () { }
                            });
                        }
                    });
                }
            },
            cancel: {
                text: 'Cancelar',
                btnClass: 'btn-red',
                action: function () {
                }
            }
        }
    });
};

const editarTarea = (idTarea) => {
    ajax('consultarTarea', 'POST', { idTarea: idTarea }, 'json', formularioEditarTarea);
};

let modalEditarTarea = null;
const formularioEditarTarea = (response) => {
    if (response.status === 'success') {
        const tarea = response.data;
        modalEditarTarea = $.confirm({
            title: "Editar Tarea",
            type: 'blue',
            onContentReady: function () {
                validarFormularioEditarTarea();
            },
            columnClass: 'medium',
            content: `
                <form id="frmEditarTarea">
                    <input type="hidden" name="idTarea" value="${tarea.idTarea}">
                    <div class="form-group col-xs-12">
                        <label for="tareaTitulo">Título de la Tarea</label>
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-tasks"></i> </span>
                            <input type="text" name="tareaTitulo" id="tareaTitulo" value="${tarea.tituloTarea}" autocomplete="off" class="form-control" placeholder="Ejemplo: Reunión con el cliente">
                        </div>
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="tareaDescripcion">Descripción de la Tarea</label>
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-info-circle"></i> </span>
                            <textarea name="tareaDescripcion" id="tareaDescripcion" class="form-control" rows="5" placeholder="Descripción detallada de la tarea">${tarea.descripcionTarea}</textarea>
                        </div>
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="tareaFechaVencimiento">Fecha de Vencimiento</label>
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                            <input type="date" name="tareaFechaVencimiento" id="tareaFechaVencimiento" value="${tarea.fechaVencimientoTarea}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="tareaPrioridad">Prioridad de la Tarea</label>
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-exclamation-triangle"></i> </span>
                            <select name="tareaPrioridad" id="tareaPrioridad" class="form-control">
                                <option value="" disabled>Seleccione una prioridad</option>
                                <option value="baja" ${tarea.prioridadTarea === 'baja' ? 'selected' : ''}>Baja</option>
                                <option value="media" ${tarea.prioridadTarea === 'media' ? 'selected' : ''}>Media</option>
                                <option value="alta" ${tarea.prioridadTarea === 'alta' ? 'selected' : ''}>Alta</option>
                            </select>
                        </div>
                    </div>
                </form>
            `,
            buttons: {
                formSubmit: {
                    text: 'Guardar',
                    btnClass: 'btn-blue',
                    action: function () {
                        $('#frmEditarTarea').submit();
                        return false;
                    }
                },
                cancel: {
                    text: 'Cerrar',
                    btnClass: 'btn-red',
                    action: function () { }
                }
            }
        });
    } else {
        mostrarAlerta('fa fa-times', 'Error', response.message, 'red', {
            Cerrar: function () { }
        });
    }
};

const validarFormularioEditarTarea = () => {
    $('#frmEditarTarea')
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
            ajax('editarTarea', 'POST', $form.serialize(), 'json', confirmarTareaEditada);
            bv.disableSubmitButtons(false);
        });
};

const confirmarTareaEditada = (response) => {
    if (response.status === 'success') {
        mostrarAlerta('fa fa-check', 'Éxito', 'Tarea editada correctamente.', 'green', {
            Cerrar: function () {
                dt_tareas.ajax.reload();
                modalEditarTarea.close();
            }
        });
    } else {
        mostrarAlerta('fa fa-times', 'Error', response.message, 'red', {
            Cerrar: function () { }
        });
    }
};

const eliminarTarea = (idTarea) => {
    $.confirm({
        title: 'Confirmar',
        content: '¿Estás seguro de que deseas eliminar esta tarea? Esta acción no se puede deshacer.',
        type: 'red',
        buttons: {
            confirm: {
                text: 'Sí, eliminar',
                btnClass: 'btn-red',
                action: function () {
                    ajax('eliminarTarea', 'POST', { idTarea }, 'json', function (response) {
                        if (response.status === 'success') {
                            mostrarAlerta('fa fa-check', 'Éxito', 'Tarea eliminada correctamente.', 'green', {
                                Cerrar: function () {
                                    dt_tareas.ajax.reload();
                                }
                            });
                        } else {
                            mostrarAlerta('fa fa-times', 'Error', response.message, 'red', {
                                Cerrar: function () { }
                            });
                        }
                    });
                }
            },
            cancel: {
                text: 'Cancelar',
                btnClass: 'btn-default',
                action: function () { }
            }
        }
    });
};