<?php
if(isset($_POST['delete_custome'])){
////////////// Elimianr registro de la tabla /////////
$consulta = "DELETE FROM `customers` WHERE `codpaci`=:codpaci";
$sql = $connect-> prepare($consulta);
$sql -> bindParam(':codpaci', $codpaci, PDO::PARAM_INT);
$codpaci=trim($_POST['custid']);

$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();

echo '<script type="text/javascript">

swal({
    title: "Eliminado Correctamente!",
    text: "¡Haz click en aceptar!",
    icon: "success",
    buttons: {
        confirm: {
            text: "Eliminar",
            value: true,
            visible: true,
            className: "btn btn-success",
            closeModal: true
        }
    }
}).then((result) => {
    window.location.replace("../../frontend/pacientes/mostrar.php");
  });

        </script>';

}
else{

    echo '<script type="text/javascript">
swal("Error!", "No se pudo eliminar el registro!", {
                        icon : "error",
                        buttons: {                  
                            confirm: {
                                className : "btn btn-danger"
                            }
                        },
                    });

        </script>';

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>