<?php


 include "../../controler/userCont.php";
 require_once "../../Model/user.php";
 $userC=new userC();
 if (isset($_POST["nom"]) &&
  isset($_POST["prenom"]) && 
  isset($_POST["Date_N"]) &&
   isset($_POST["sexe"]) &&
    isset($_POST["email"]) && 
	isset($_POST["Login"]) &&
	 isset($_POST["password"]) && 
	 isset($_POST["password2"])) 
	 
 { 
    $newuser=new User($_POST['nom'],$_POST['prenom'],$_POST['sexe'],$_POST['email'],$_POST['Login'],$_POST['Date_N'],$_POST['password']);
	if ($_POST["password"]!=$_POST["password2"])
{
         $error= "Les deux mot de passes sont differents";

}
     else
     {
       
             if( $userC->ajouteruser($newuser));
              header("Location: registre.php");
        
     }
     
 }
 
 include('index.html');
 ?>
 