<?php


require_once     '../../controller/evenementC.php';
require_once '../../model/evenement.php';

if ( isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['auteur'])) {
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        // echo "File is not an image.";
      // $uploadOk = 0;
    }


    // Check if file already exists
    if (file_exists($target_file)) {
        //  echo "Sorry, file already exists.";
      //  $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        //  echo "Sorry, your file is too large.";
      //$uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        //  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
       // $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        header('Location:afficherevenement.php?error=1');
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo 'aaaaaa';
            $evenement = new evenement(1, $_POST['titre'], $_POST['description'], $target_file, $_POST['auteur'], $_POST['prix']);
                                        //$titre, $description, $img , $auteur,$prix
            $evenementC = new evenementC();
            $evenementC->ajouterevenement($evenement);
            header('Location:afficherevenement.php');
        } else {
            echo 'chyyyyyyyy2';
            header('Location:afficherevenement.php');
        }
    }
}
