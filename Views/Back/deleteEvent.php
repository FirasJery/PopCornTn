<?php
    require '../../controller/evenementC.php';
if (isset($_GET['id'])) {
    $evenementC = new evenementC();
    $evenementC->supprimerevenement($_GET['id']);
   header('Location:blank.php');  
                          
} else {
    echo 'oooooooooooooooooo';
}
    
?>