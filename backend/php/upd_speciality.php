<?php  
if(isset($_POST['upd_speciality']))
{
    $codespe=trim($_POST['esid']);
    $nombrees=trim($_POST['namees']);
   

    try {

        $query = "UPDATE specialty SET nombrees=:nombrees WHERE codespe=:codespe LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nombrees' => $nombrees,
            ':codespe' => $codespe
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



