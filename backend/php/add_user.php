<?php 
require_once('../../backend/db/config.php'); 
 if(isset($_POST['add_use']))
 {
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email
    $nombre=trim($_POST['namees']);
    $usuario=trim($_POST['nameusua']);
    $email=trim($_POST['emaiusu']);
    $cargo=trim($_POST['usucarg']);
   
    
  if(empty($email)){
   $errMSG = "Please enter number.";
  }

   
  $stmt = "SELECT * FROM usuarios WHERE email ='$email'";
   if(empty($email)) {
             

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
            $sql="SELECT * FROM usuarios WHERE email ='$email'";
            

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
            {
                if(!isset($errMSG))
  {
$stmt = $connect->prepare("INSERT INTO usuarios(nombre,usuario,email,cargo) VALUES(:nombre,:usuario,:email,:cargo)");
$stmt->bindParam(':nombre',$nombre);
$stmt->bindParam(':usuario',$usuario);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':cargo',$cargo);

   if($stmt->execute())
   {
    

        echo '<script type="text/javascript">

swal({
    title: "Agregado Correctamente!",
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
    window.location.replace("../../frontend/usuarios/mostrar.php");
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