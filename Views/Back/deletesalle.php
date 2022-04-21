<?php
    require '../../controller/salleC.php';
if (isset($_GET['id'])) {
    $salleC = new salleC();
    $salleC->supprimersalle($_GET['id']);
   header('Location:blank.php');
   echo 'sudd';
} else {
    echo 'oooooooooooooooooo';
}
    
?>