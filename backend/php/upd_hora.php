<?php  
if(isset($_POST['upd_horari']))
{
    $codhor=trim($_POST['horid']);
    $nomhor=trim($_POST['nameho']);
    $coddoc=trim($_POST['namedoc']);

    try {

        $query = "UPDATE horario SET nomhor=:nomhor, coddoc=:coddoc, estado='1' WHERE codhor=:codhor LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nomhor' => $nomhor,
            ':coddoc' => $coddoc,
            ':codhor' => $codhor
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
            text: "Actualizar,
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



