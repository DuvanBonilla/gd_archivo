function abrirModal(cedula) {
    // Crear un objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../model/consu_editar_usuario.php?cedula=" + cedula, true);
    
    // Definir la función que se ejecutará al recibir la respuesta
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            cargarDatosEnModal(response);
        } else {
            console.error("Error al cargar permisos: " + xhr.status);
        }
    };
    
    // Enviar la solicitud
    xhr.send();
}

function cargarDatosEnModal(data) {
    // Actualizar el contenido del modal con los datos recibidos
    var modalBody = document.querySelector('#Permisos .modal-body');
    modalBody.innerHTML = ''; // Limpiar contenido anterior
    
    var table = '<form action="../model/editar_acceso.php" method="POST">' +
                '<input type="hidden" name="Cedula" value="' + data.cedula + '">' +
                '<table>' +
                '<thead><tr><th>Area</th><th>Ver</th><th>Editar</th><th>Ninguno</th></tr></thead>' +
                '<tbody>';

    data.permisos.forEach(function(acceso) {
        table += '<tr>';
        table += '<td>' + acceso.nombreA + '</td>'; // Asumiendo que 'nombreArea' está en la respuesta
        table += '<td><label class="switch"><input type="radio" name="permiso_' + acceso.Area + '" value="1" ' + (acceso.Permiso == 1 ? 'checked' : '') + '><span class="slider round"></span></label></td>';
        table += '<td><label class="switch"><input type="radio" name="permiso_' + acceso.Area + '" value="2" ' + (acceso.Permiso == 2 ? 'checked' : '') + '><span class="slider round"></span></label></td>';
        table += '<td><label class="switch"><input type="radio" name="permiso_' + acceso.Area + '" value="3" ' + (acceso.Permiso == 3 ? 'checked' : '') + '><span class="slider round"></span></label></td>';
        table += '</tr>';
    });

    table += '</tbody></table>' +
             '<div class="modal-footer">' +
             '<button type="submit" class="btn btn-primary">Registrar</button>' +
             '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>' +
             '</div></form>';
    
    modalBody.innerHTML = table;

    // Mostrar el modal
    $('#Permisos').modal('show');
}