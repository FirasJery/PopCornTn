<?PHP
	include "../../controller/userCont.php";
	session_start();
	$clientC=new userC();
	
	if (isset($_POST["id"])){
		$clientC->supprimeruser($_POST["id"]);
		header('Location:afficher.php');
	}

?>
