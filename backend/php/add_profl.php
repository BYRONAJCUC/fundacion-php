<?php  
if(isset($_POST['add_prof']))
{
    $codpaci = $_POST['custid'];
    $usuario = $_POST['usnam'];
    $clave=MD5($_POST['usclav']);
  
   
    try {

        $query = "UPDATE customers SET usuario  =:usuario, clave=:clave,cargo='2', estado='1'  WHERE codpaci=:codpaci LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
         
            ':usuario' => $usuario,
            ':clave' => $clave,
            ':codpaci' => $codpaci
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            
        echo '<script type="text/javascript">

swal({
    title: "Agregado Correctamente!",
    text: ¡Haz click en aceptar!,
    icon: "success",
    buttons: {
        confirm: {
            text: "Aceptar,
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



