<?php 
include '../../Controller/salleC.php';
include "head.php";
require_once '../../model/salle.php';

$salleC = new salleC();
if (isset($_GET['id'])) {
  $salleToEdit = $salleC->getsallebyID($_GET['id']);
  
}
$listesalles = $salleC->affichersalle();

if (isset($_REQUEST['add']) || isset($_REQUEST['edit'])) {
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
     // $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
      //  echo "Sorry, your file is too large.";
     // $uploadOk = 0;
  }

  // Allow certain file formats
  if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
  ) {
      //  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //  $uploadOk = 0;
  }
  if ($uploadOk == 0) {
      header('Location:blank.php?error=1');
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo 'aaaaaa';
  
          $salleC = new salleC();
          if (isset($_REQUEST['add'])) {
            $salle = new salle(1, $_POST['Nom'], $_POST['Adresse'],  $_POST['capacite'] ,$_POST['Gouvernorat'],$_POST['frais'],$target_file);
            $salleC->ajoutersalle($salle);
            header('Location:formsalle.php');
          } else if (isset($_REQUEST['edit'])) {
          $salle = new salle($_POST['id'], $_POST['Nom'], $_POST['Adresse'], $_POST['capacite'],$_POST['Gouvernorat'],$_POST['frais'],$target_file);
          $salleC->modifiersalle($salle);
          header('Location:formsalle.php');
          }
         // header('Location:blank.php');
      } else {
          echo 'error';
          //header('Location:blank.php');
      }
    
    }}


?>
<body>
 <?php
include "nav-bar.php";
?>   
<div class="container-scroller">


<div class="container-fluid page-body-wrapper">
<?php
include "side-bar.php";
?>  
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Formulaire salles</h4>
                  
                  <form class="forms-sample" action="" enctype="multipart/form-data" method="POST">
                    <?php if (isset($salleToEdit)) {?>
                         <div class="form-group">
                      <label for="id">id</label>
                      <input type="text" class="form-control" id="id" name="id" value="<?php echo $salleToEdit['id'] ?>">
                    </div>
                      <?php  }
                    ?>
                    <div class="form-group">
                      <label for="Nom">nom salle</label>
                      <input type="text" class="form-control" id="Nom" name="Nom" placeholder="nom salle" name="<?php if (isset($salleToEdit)) echo $salleToEdit['Nom']  ?>"   >
                   <label id="error1"></label>
                    </div>
                    <div class="form-group">
                      <label for="Adresse">Adresse</label>
                      <input type="textarea" class="form-control" id="Adresse" name="Adresse" placeholder="Adresse" <?php if (isset($salleToEdit)) echo 'value".'.$salleToEdit['address'].'"' ?>  >
                    </div>
                    <div class="form-group">
                      <label for="capacite">capacite</label>
                      <input type="text" class="form-control" id="capacite" placeholder="Capacite" name="capacite"   <?php if (isset($salleToEdit)) echo 'value".'.$salleToEdit['capacite'].'"' ?>    >
                    </div>
                    <div class="form-group">
                      <label for="frais">frais</label>
                      <input type="text" class="form-control" id="frais" placeholder="frais" name="frais"   <?php if (isset($salleToEdit)) echo 'value".'.$salleToEdit['frais'].'"' ?>    >
                    </div>
                    <div class="form-group">
                      <label>File upload</label>
                      <input required type="file" class="form-control" id="fileToUpload"  name="fileToUpload">
                    </div>
                    <div>
                    <label for="cars">choisir Gouvernorat</label>

<select name="Gouvernorat" id="Gouvernorat" <?php if (isset($salleToEdit)) echo 'value".'.$salleToEdit['Gouvernorat'].'"' ?>>
  <option value="Arianna">Arianna</option>
  <option value="Beja">Beja</option>
  <option value="Ben Arous">Ben Arous</option>
  <option value="Bizerte">Bizerte</option>
  <option value="Gabes">Gabes</option>
  <option value="Gafsa">Gafsa</option>
  <option value="Jendouba">Jendouba</option>
  <option value="Kairaouan">Kairaouan</option>
  <option value="Kasserine">Kasserine</option>
  <option value="Kebili">Kebili</option>
  <option value="Kef">Kef</option>
  <option value="Mahdia">Manouba</option>
  <option value="Medenine">Medenine</option>
  <option value="Monastir">Monastir</option>
  <option value="Nabeul">Nabeul</option>
  <option value="Sfax">Sfax</option>
  <option value="Sidi bouzid">Sidi Bouzid</option>
  <option value="Silliana">Silliana</option>
  <option value="Sousse">Sousse</option>
  <option value="Tataouine">Tataouine</option>
  <option value="Tozeur">Tozeur</option>
  <option value="Tunis">Tunis</option>
  <option value="Zaghouan">Zaghouan</option>
  
</select>

                    </div>    

                
                    
                    <button type="submit" name="add" class="btn btn-primary me-2">Submit</button>
                    <button type="submit" name="edit" class="btn btn-dark btn-icon-text">
                                Edit
                                  <i class="ti-file btn-icon-append"></i>                          
                            </button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">salles</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Nom
                          </th>
                          <th>
                            Adresse
                          </th>
                          <th>
                            capacite
                          </th>
                          <th>
                            Gouvernorat
                          </th>
                          <th>
                            Frais
                          </th>
                          <th>
                            affiche
                          </th>
                          <th>
                            Edit
                          </th>
                          <th>
                            Delete
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listesalles as $key) {
                        ?>
                        <tr>
                          <td>
                            <?php echo $key['Nom']; ?>
                          </td>
                          <td>
                          <?php echo $key['Adresse']; ?> 
                          <iframe width="50%" height="250" src="https://maps.google.com/maps?q=<?php echo $key['Adresse']; ?>&output=embed"></iframe>
 
 <?php

?>
                          </td>
                          <td>
                          <?php echo $key['capacite']; ?> 
                          </td>
                          <td>
                          <?php echo $key['Gouvernorat']; ?> 
                          </td>
                          <td>
                          <?php echo $key['frais']; ?> 
                          </td>
                          <td class="py-1">
                            <img src="<?php echo $key['img']; ?>" alt="image"/>
                          </td>
                         
                          <td>
                            <a href="edit.php?id=<?php echo $key['id']; ?>" >
                            <button type="button" class="btn btn-dark btn-icon-text">
                                Edit
                                  <i class="ti-file btn-icon-append"></i>                          
                            </button>
                            </a>

                          </td>
                          <td>
                          <a href="deletesalle.php?id=<?php echo $key['id']; ?>">
                          <button type="button" class="btn btn-danger">Delete</button>
                          </td>
                        </a>

                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Charts</h4>
                <a href="Charts.php">
                  <button class="btn btn-danger">Voir stats</button>
              </div>
            </div>
          </div>
          </div>
        </div>


  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script></script>

  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>