document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('input[type="checkbox"][name="empresa[]"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var empresaId = this.getAttribute('data-id');
            var hiddenField = document.getElementById('empresaEstado_' + empresaId);
            hiddenField.value = this.checked ? '1' : '2';
            console.log('Checkbox ID: ' + empresaId + ', Checked: ' + this.checked + ', Hidden Value: ' + hiddenField.value);
        });
    });
});