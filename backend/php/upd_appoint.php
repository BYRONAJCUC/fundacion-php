<?php  
if(isset($_POST['upd_appoi']))
{
    $codcit=trim($_POST['appoid']);
    $dates=trim($_POST['fecappo']);
    $hour=trim($_POST['ourappo']);
    $codpaci=trim($_POST['paciappo']);
    $codespe=trim($_POST['areappo']);
    $coddoc=trim($_POST['mediappo']);
    try {

        $query = "UPDATE appointment SET dates=:dates,hour=:hour,codpaci=:codpaci,coddoc=:coddoc,codespe=:codespe WHERE codcit=:codcit LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':dates' => $dates,
            ':hour' => $hour,
            ':codpaci' => $codpaci,
            ':coddoc' => $coddoc,
            ':codespe' => $codespe,
            ':codcit' => $codcit
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            
           

        echo '<script type="text/javascript">

swal({
    title: "Actualizado Correctamente!",
    text: "¡Haz click en aceptar!",
    icon: "success",
    buttons: {
        confirm: {
            text: "Aceptar",

            value: true,
            visible: true,
            className: "btn btn-success",
            closeModal: true
        }
    }
}).then((result) => {
    window.location.replace("../../frontend/citas/mostrar.php");
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



