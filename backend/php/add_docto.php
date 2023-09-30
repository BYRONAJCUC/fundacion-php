<?php 
require_once('../../backend/db/config.php'); 
 if(isset($_POST['add_doct']))
 {
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email
    $dnidoc=trim($_POST['dnidoc']);
    $nomdoc=trim($_POST['nomdoc']);
    $apedoc=trim($_POST['apedoc']);
    $codespe=trim($_POST['espdo']);
    $telefo=trim($_POST['teldoc']);
    $sexo=trim($_POST['sexdoc']);
    $fechanaci=trim($_POST['nacme']);
    $correo=trim($_POST['coomed']);
    $naciona=trim($_POST['nacionam']);
   
    
  if(empty($dnidoc)){
   $errMSG = "Please enter number.";
  }

   
  $stmt = "SELECT * FROM doctor WHERE dnidoc ='$dnidoc'";
   if(empty($dnidoc)) {
             

         echo '<script type="text/javascript">
swal("Error!", "Ya existe el registro a agregar!", {
                        icon : "error",
                        buttons: {                  
                            confirm: {
                                className : "btn btn-danger"
                            }
                        },
                    });

        </script>';


         }

         else
         {  // Validaremos primero que el document no exista
            $sql="SELECT * FROM doctor WHERE dnidoc ='$dnidoc'";
            

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
            {
                if(!isset($errMSG))
  {
$stmt = $connect->prepare("INSERT INTO doctor(dnidoc,nomdoc,apedoc,codespe,sexo,telefo,fechanaci,correo,naciona,estado) VALUES(:dnidoc,:nomdoc,:apedoc,:codespe,:sexo,:telefo,:fechanaci,:correo,:naciona,'1')");
$stmt->bindParam(':dnidoc',$dnidoc);
$stmt->bindParam(':nomdoc',$nomdoc);
$stmt->bindParam(':apedoc',$apedoc);
$stmt->bindParam(':codespe',$codespe);
$stmt->bindParam(':sexo',$sexo);
$stmt->bindParam(':telefo',$telefo);
$stmt->bindParam(':fechanaci',$fechanaci);
$stmt->bindParam(':correo',$correo);
$stmt->bindParam(':naciona',$naciona);

   if($stmt->execute())
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
   }
   else
   {
    $errMSG = "error while inserting....";
   }

  } 
            }

                else{

        echo '<script type="text/javascript">
swal("Error!", "Ya existe el registro a agregar o no se puede agregar!", {
                        icon : "error",
                        buttons: {                  
                            confirm: {
                                className : "btn btn-danger"
                            }
                        },
                    });

        </script>';

 // if no error occured, continue ....

}
  

  }
 
 }
?>