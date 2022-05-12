<?php

include "../../controller/userCont.php";
include_once '../../model/user.php';



  $clientC = new userC();
  $message="";
if (isset($_POST["email"])&&isset($_POST["password"]))
   { 
    if (!empty($_POST["email"])&&
    !empty($_POST["password"])
       )
       { 
           $message=$clientC->connexionUser($_POST["email"],$_POST["password"]);
          
          
           echo $message;
           if ($message!='pseudo ou le mot de passe est incorrect')
           {
            if($_SESSION['role']=="admin")
            header('Location:../back/index.php');
            else
              header('Location:index_2.php');
          
           }
               else
                 {
               $message='pseudo ou le mot de passe est incorrect';
               echo $message;
               
               
                 }


       }
       else
      { 
        $message="Missing information";
       echo $message;}
}
?>