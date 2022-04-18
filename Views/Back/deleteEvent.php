<?php
    require '../../controller/evenementC.php';
if (isset($_GET['id'])) {
    $evenementC = new evenementC();
    $evenementC->supprimerevenement($_GET['id']);
   // header('Location:blank.php');
   echo 'sudd';
} else {
    echo 'oooooooooooooooooo';
}
    
?>