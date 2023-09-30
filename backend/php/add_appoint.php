<?php 
require_once('../../backend/db/config.php'); 
 if(isset($_POST['add_appoi']))
 {
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email
    $dates=trim($_POST['fecappo']);
    $hour=trim($_POST['ourappo']);
    $codpaci=trim($_POST['paciappo']);
    $codespe=trim($_POST['areappo']);
    $coddoc=trim($_POST['mediappo']);
 
   
    
  if(empty($dates)){
   $errMSG = "Please enter number.";
  }

   
  $stmt = "SELECT * FROM appointment WHERE dates ='$dates'";
   if(empty($dates)) {
             

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
            $sql="SELECT * FROM appointment WHERE dates ='$dates'";
            

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
            {
                if(!isset($errMSG))
  {
$stmt = $connect->prepare("INSERT INTO appointment(dates,hour,codpaci,coddoc,codespe,estado) VALUES(:dates,:hour,:codpaci,:coddoc,:codespe,'1')");



$stmt->bindParam(':dates',$dates);
$stmt->bindParam(':hour',$hour);
$stmt->bindParam(':codpaci',$codpaci);
$stmt->bindParam(':coddoc',$coddoc);
$stmt->bindParam(':codespe',$codespe);


   if($stmt->execute())
   {
    

        echo '<script type="text/javascript">

swal({
    title: "Agregado Correctamente!",
    text: "¡Haz click en aceptar!",
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
}).then((result) => {
    window.location.replace("../../frontend/citas/mostrar.php");
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