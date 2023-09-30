<?php  
if(isset($_POST['upd_doct']))
{
    $coddoc=trim($_POST['doctid']);
    $dnidoc=trim($_POST['dnidoct']);
    $nomdoc=trim($_POST['namedoc']);
    $apedoc=trim($_POST['apdoc']);
    $codespe=trim($_POST['espdo']);
    $telefo=trim($_POST['teldoc']);
    $sexo=trim($_POST['sexdoc']);
    $fechanaci=trim($_POST['nacdoc']);
    $correo=trim($_POST['coomed']);
    $naciona=trim($_POST['nacionam']);
   

    try {

        $query = "UPDATE doctor SET dnidoc=:dnidoc,nomdoc=:nomdoc,apedoc=:apedoc,codespe=:codespe,telefo=:telefo,sexo=:sexo,fechanaci=:fechanaci,correo=:correo,naciona=:naciona WHERE coddoc=:coddoc LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':dnidoc' => $dnidoc,
            ':nomdoc' => $nomdoc,
            ':apedoc' => $apedoc,
            ':codespe' => $codespe,
            ':telefo' => $telefo,
            ':sexo' => $sexo,
            ':fechanaci' => $fechanaci,
            ':correo' => $correo,
            ':naciona' => $naciona,
            ':coddoc' => $coddoc
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



