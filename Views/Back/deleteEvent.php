<?php
    require '../../controller/evenementC.php';
    require '../../controller/categC.php';
if (isset($_GET['id'])) {
    $evenementC = new filmC();
    $categC = new categC();
    $evenementC->supprimerevenement($_GET['id']);
    $categC->diminuerFilms($_POST['categ']);
   header('Location:blank.php');
} else {
    echo 'Suppression échoué';
}
    
?>