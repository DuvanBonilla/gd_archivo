<?php
class EmpleadosFincas{
    
    public function BuscarEmpleados ($finca,$conMysql){
        if (!empty($finca)){
        $stmt = $conMysql->prepare("SELECT * FROM tbl_personas WHERE empresa = ?");
        $stmt->bind_param("i", $finca);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
        }else{
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Falta de datos',
                    showCancelButton: false,
                    confirmButtonColor: '#FF5733 ',
                    confirmButtonText: 'OK',
                    timer: 5000
                }).then(() => {
                    location.assign('../view/register.php');
                });
            });
            </script>";
        }
}
}