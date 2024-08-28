$(document).ready(function () {
    $(document).on("click", ".icon-container", function () {
        var iconId = $(this).attr("id").split("-")[1];
        var estadoActual = $(this).data("estado");
        var nuevoEstado = estadoActual === 1 ? 2 : 1;

        if (estadoActual === 1) {
            // Cambio automático de 1 a 2
            $.ajax({
                type: "POST",
                url: "../model/val_editestado_empleado.php",
                data: { estado: nuevoEstado, cedula: iconId },
                success: function (response) {
                    console.log("Respuesta del servidor:", response);
                    if (response.trim() === "success") {
                        $(`#icon-${iconId}`).data("estado", nuevoEstado);
                        $(`#icon-${iconId} i`).attr("class", nuevoEstado === 1 ? 'bi bi-person-check-fill' : 'bi bi-x-square');
                        location.reload();

                    }
                }
            });
        } else if (estadoActual === 2) {
            console.log('Intentando abrir el modal');
            // Carga el contenido del modal desde un archivo HTML
            $('#modalContainer').load('../view/modal_editempleado.php', function () {
                // Una vez que el contenido esté cargado, muestra el modal
                $('#modalCedula').val(iconId);
                $('#modalFechaIngreso').val('');  // Aquí puedes cargar el valor actual si lo tienes
                $('#modalFechaRetiro').val('');  // Aquí puedes cargar el valor actual si lo tienes
                $('#modalUbicacion').val('');  // Aquí puedes cargar el valor actual si lo tienes
                $('#editarModal').modal('show');

            });
        }
    });

    // Manejador de formulario del modal
    $(document).on('submit', '#form-editar', function (e) {
        e.preventDefault();

        var cedula = $('#modalCedula').val();
        var fechaIngreso = $('#modalFechaIngreso').val();
        var fechaRetiro = $('#modalFechaRetiro').val();
        var ubicacion = $('#modalUbicacion').val();

        console.log('Fecha de Retiro capturada:', fechaRetiro);  // Verificar si se captura el valor


        $.ajax({
            type: "POST",
            url: "../model/val_editestado_empleado.php",
            data: {
                estado: 1,  // Cambiando a 1
                cedula: cedula,
                Fechaingreso: fechaIngreso,
                Fecharetiro: fechaRetiro,
                Ubicacion: ubicacion,
                actualizar: true  // Indicador para actualizar los campos adicionales
            },
            success: function (response) {
                console.log("Respuesta del servidor:", response);
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