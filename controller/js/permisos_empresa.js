function EditEmpresa(cedula) {
    // Crear un objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../model/consu_editar_empresa.php?cedula=" + cedula, true);
    
    // Definir la función que se ejecutará al recibir la respuesta
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            cargarDatos(response);
        } else {
            console.error("Error al cargar permisos: " + xhr.status);
        }
    };
    
    // Enviar la solicitud
    xhr.send();
}

function cargarDatos(data) {
    // Actualizar el contenido del modal con los datos recibidos
    var modalBody = document.querySelector('#PermisosEmpresa .modal-body');
    modalBody.innerHTML = ''; // Limpiar contenido anterior
    
    var table = '<form action="../model/editar_permiso_empresa.php" method="POST">' +
                '<input type="hidden" name="Cedula" value="' + data.cedula + '">' +
                '<table>' +
                '<thead><tr><th>Empresa</th><th>Activo</th><th>Denegado</th></tr></thead>' +
                '<tbody>';

    data.permisos.forEach(function(acceso) {
        table += '<tr>';
        table += '<td>' + acceso.Descripcion + '</td>'; // Asumiendo que 'nombreEmpresa' está en la respuesta
        table += '<td><label class="switch"><input type="radio" name="Estado_' + acceso.Empresa+ '" value="1" ' + (acceso.Estado == 1 ? 'checked' : '') + '><span class="slider round"></span></label></td>';
        table += '<td><label class="switch"><input type="radio" name="Estado_' + acceso.Empresa+ '" value="2" ' + (acceso.Estado == 2 ? 'checked' : '') + '><span class="slider round"></span></label></td>';
        table += '</tr>';
    });

    table += '</tbody></table>' +
             '<div class="modal-footer">' +
             '<button type="submit" class="btn btn-primary">Registrar</button>' +
             '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>' +
             '</div></form>';
    
    modalBody.innerHTML = table;

    // Mostrar el modal
    $('#PermisosEmpresa').modal('show');
}