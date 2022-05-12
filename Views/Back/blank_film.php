<?php 
include '../../Controller/filmC.php';
include '../../Controller/categC.php';
include "head.php";
require_once '../../model/film.php';
require_once '../../model/categ.php';

$filmC = new filmC();
$categC = new CategC();
if (isset($_GET['id'])) {
  $eventToEdit = $filmC->getevenementbyID($_GET['id']);
}
$listeEvents = $filmC->afficherevenement();

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
      header('Location:blank_film.php?error=1');
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo 'aaaaaa';
          $filmC = new filmC();
          if (isset($_REQUEST['add'])) {
            $film = new film(1, $_POST['titre'], $_POST['description'], $target_file, $_POST['auteur'], $_POST['prix'], 0, $_POST['categ']);
            $filmC->ajouterevenement($film);
            $categC->augmenterFilms($_POST['categ']);
          } else if (isset($_REQUEST['edit'])) {
          $film = new film($_POST['id'], $_POST['titre'], $_POST['description'], $target_file, $_POST['auteur'], $_POST['prix'], $_POST['vente'], $_POST['categ']);
          $filmC->modifierevenement($film);
          }
          header('Location:blank_film.php');
      } else {
          echo 'chyyyyyyyy2';
          header('Location:blank_film.php');
      }
  }
}

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
                  <h4 class="card-title">Formulaire Film</h4>
                  
                  <form class="forms-sample" action="" enctype="multipart/form-data" method="POST">
                    <?php if (isset($eventToEdit)) {?>
                         <div class="form-group">
                      <label for="id">id</label>
                      <input type="text" class="form-control" id="id" name="id" value="<?php echo $eventToEdit['id'] ?>">
                    </div>
                      <?php  }
                    ?>
                    <div class="form-group">
                      <label for="nom">nom</label>
                      <input type="text" class="form-control" id="nom" name="titre" placeholder="nom" name="titre" value="<?php if (isset($eventToEdit)) echo $eventToEdit['titre']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="description">description</label>
                      <input type="textarea" class="form-control" id="description" name="description" placeholder="description" value="<?php if (isset($eventToEdit)) echo $eventToEdit['description'] ?>"  >
                    </div>
                    <div class="form-group">
                      <label for="Realisateur">Realisateur</label>
                      <input type="text" class="form-control" id="Realisateur" placeholder="Realisateur" name="auteur"   value="<?php if (isset($eventToEdit)) echo $eventToEdit['auteur'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="Prix">Prix</label>
                      <input type="number" class="form-control" id="Prix" placeholder="Prix" name="prix" value="<?php if (isset($eventToEdit)) echo $eventToEdit['prix'] ?>" >
                    </div>
                    <div class="form-group">
                      <label for="Prix">Categorie</label>
                      <select name="categ" id="categ" value="<?php if (isset($eventToEdit)) echo $eventToEdit['categ'] ?>">
                        <option>Action</option>
                        <option>Drama</option>
                        <option>Comédie</option>
                        <option>Horreur</option>
                        <option>Romance</option>
                        <option>Sci-Fi</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="date">Date</label>
                      <input type="date" class="form-control" id="date"  name="date">
                    </div>
                    
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" class="form-control" id="fileToUpload"  name="fileToUpload" value="<?php if (isset($eventToEdit)) echo $eventToEdit['img'] ?>">
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
                  <h4 class="card-title">Films</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Nom
                          </th>
                          <th>
                            Description
                          </th>
                          <th>
                            Realisateur
                          </th>
                          <th>
                            Categorie
                          </th>
                          <th>
                            Prix
                          </th>
                          <th>
                            Affiche
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
                        <?php foreach ($listeEvents as $key) {
                        ?>
                        <tr>
                          <td>
                            <?php echo $key['titre']; ?>
                          </td>
                          <td>
                          <?php echo $key['description']; ?> 
                          </td>
                          <td>
                          <?php echo $key['auteur']; ?> 
                          </td>
                          <td>
                          <?php echo $key['categorie']; ?>
                          </td>
                          <td>
                          <?php echo $key['prix']; ?>
                          </td>
                          <td class="py-1">
                            <img src="<?php echo $key['img']; ?>" alt="image"/>
                          </td>
                          <td>
                            <a href="blank_film.php?id=<?php echo $key['id']; ?>" >
                            <button type="button" class="btn btn-dark btn-icon-text">
                                Edit
                                  <i class="ti-file btn-icon-append"></i>                          
                            </button>
                            </a>

                          </td>
                          <td>
                          <a href="deleteFilm.php?id=<?php echo $key['id']; ?>">
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
          </div>
        </div>


  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
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