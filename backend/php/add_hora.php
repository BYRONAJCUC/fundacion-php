<?php 
require_once('../../backend/db/config.php'); 
 if(isset($_POST['add_horar']))
 {
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email
    $nomhor=trim($_POST['nameho']);
    $coddoc=trim($_POST['namedoc']);
    
  if(empty($nomhor)){
   $errMSG = "Please enter number.";
  }

   
  $stmt = "SELECT * FROM horario WHERE nomhor ='$nomhor'";
   if(empty($nomhor)) {
             

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
            $sql="SELECT * FROM horario WHERE nomhor ='$nomhor'";
            

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
            {
                if(!isset($errMSG))
  {
$stmt = $connect->prepare("INSERT INTO horario(nomhor,coddoc,estado) VALUES(:nomhor,:coddoc,'1')");
$stmt->bindParam(':nomhor',$nomhor);
$stmt->bindParam(':coddoc',$coddoc);

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
    window.location.replace("../../frontend/horarios/mostrar.php");
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