$(document).ready(function () {
    $(document).on("click", ".icon-container", function () {
        var iconId = $(this).attr("id").split("-")[1];
        var estadoActual = $(this).data("estado");
        var nuevoEstado = estadoActual === 1 ? 2 : 1;

        if (estadoActual === 1) {
               
            // Verifica si la ruta es correcta
            $('#modalFechaRetiroContainer').load('../view/modal_fecharetiro.php', function (response, status, xhr) {
                if (status == "error") {
                } else {
                    $('#modalFechaRetiroCedula').val(iconId); 
                    $('#modalFechaRetiro').val(''); 
                    $('#modalFechaRetiroModal').modal('show'); 
                }
            });
        } else if (estadoActual === 2) {
            $('#modalContainer').load('../view/modal_editempleado.php', function () {
                $('#modalCedula').val(iconId);
                $('#modalFechaIngreso').val('');
                $('#modalUbicacion').val('');
                $('#editarModal').modal('show');
            });
        }
    });

    // Manejador del formulario del modal de fecha de retiro
    $(document).on('submit', '#form-fecha-retiro', function (e) {
        e.preventDefault();

        var cedula = $('#modalFechaRetiroCedula').val();
        var fechaRetiro = $('#modalFechaRetiro').val();

        // Enviar el estado actualizado y la fecha de retiro
        $.ajax({
            type: "POST",
            url: "../model/val_fecha_retiro.php",
            data: {
                estado: 2, // Cambiando a 2
                cedula: cedula,
                Fecharetiro: fechaRetiro
            },
            success: function (response) {
                if (response.trim() === "success") {
                    $(`#icon-${cedula}`).data("estado", 2);
                    $(`#icon-${cedula} i`).attr("class", 'bi bi-x-square');
                    $('#modalFechaRetiroModal').modal('hide');
                    location.reload();
                }
            }
        });
    });

    // Manejador del formulario del modal de edición
    $(document).on('submit', '#form-editar', function (e) {
        e.preventDefault();

        var cedula = $('#modalCedula').val();
        var fechaIngreso = $('#modalFechaIngreso').val();
        var ubicacion = $('#modalUbicacion').val();

        $.ajax({
            type: "POST",
            url: "../model/val_editestado_empleado.php",
            data: {
                estado: 1, // Cambiando a 1
                cedula: cedula,
                Fechaingreso: fechaIngreso,
                Ubicacion: ubicacion,
                actualizar: true
            },
            success: function (response) {
                if (response.trim() === "success") {
                    $(`#icon-${cedula}`).data("estado", 1);
                    $(`#icon-${cedula} i`).attr("class", 'bi bi-person-check-fill');
                    $('#editarModal').modal('hide');
                    location.reload();
                }
            }
        });
    });

});
