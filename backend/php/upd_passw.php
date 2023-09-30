<?php  
if(isset($_POST['upd_pass']))
{
    $id=trim($_POST['userid']);
    $clave=MD5($_POST['newuser']);
    try {

        $query = "UPDATE usuarios SET clave=:clave WHERE id=:id LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':clave' => $clave,
            
            ':id' => $id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            
           

        echo '<script type="text/javascript">

swal({
    title: "Actualizado Correctamente!",
    text: ¡Haz click en Actualizar!,
    icon: "success",
    buttons: {
        confirm: {
            text: "Actualizars,
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



