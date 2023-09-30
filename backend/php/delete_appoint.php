<?php  
if(isset($_POST['delete_appoin']))
{
    $codcit=trim($_POST['appoid']);
   
    try {

        $query = "UPDATE appointment SET estado='0' WHERE codcit=:codcit LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':codcit' => $codcit
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            
           

        echo '<script type="text/javascript">

swal({
    title: "Eliminado Correctamente!",
    text: ¡Haz click en aceptar!,
    icon: "success",
    buttons: {
        confirm: {
            text: "Eliminar,
            value: true,
            visible: true,
            className: "btn btn-success",
            closeModal: true
        }
    }
});

        </script>';

            exit(0);
        }
        else
        {
           


        echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos!", {
                        icon : "error",
                        buttons: {                  
                            confirm: {
                                className : "btn btn-danger"
                            }
                        },
                    });

        </script>';

            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>



