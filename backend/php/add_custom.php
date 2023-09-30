<?php 
require_once('../../backend/db/config.php'); 
 if(isset($_POST['add_customers']))
 {
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email
    $dnipa=trim($_POST['dnipaci']);
    $nombrep=trim($_POST['nompac']);
    $apellidop=trim($_POST['apepac']);
    $seguro=trim($_POST['segpa']);
    $tele=trim($_POST['telpa']);
    $sexo=trim($_POST['sexpa']);

   
   
    
  if(empty($dnipa)){
   $errMSG = "Please enter number.";
  }

   
  $stmt = "SELECT * FROM customers WHERE dnipa ='$dnipa'";
   if(empty($dnipa)) {
             

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
            $sql="SELECT * FROM customers WHERE dnipa ='$dnipa'";
            

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
            {
                if(!isset($errMSG))
  {
$stmt = $connect->prepare("INSERT INTO customers(dnipa,nombrep,apellidop,seguro,tele,sexo) VALUES(:dnipa,:nombrep,:apellidop,:seguro,:tele,:sexo)");
$stmt->bindParam(':dnipa',$dnipa);
$stmt->bindParam(':nombrep',$nombrep);
$stmt->bindParam(':apellidop',$apellidop);
$stmt->bindParam(':seguro',$seguro);
$stmt->bindParam(':tele',$tele);
$stmt->bindParam(':sexo',$sexo);

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