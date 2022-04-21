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
  
 
     
          
          $salleC = new salleC();
          if (isset($_REQUEST['add'])) {
            $salle = new salle(1, $_POST['Nom'], $_POST['Adresse'],  $_POST['capacite']);
            $salleC->ajoutersalle($salle);
            header('Location:blank.php');
          } else if (isset($_REQUEST['edit'])) {
          $salle = new salle($_POST['id'], $_POST['Nom'], $_POST['Adresse'], $_POST['capacite']);
          $salleC->modifiersalle($salle);
          header('Location:blank.php');
          }
         // header('Location:blank.php');
      } else {
          echo 'error';
          //header('Location:blank.php');
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
                    </div>
                    <div class="form-group">
                      <label for="Adresse">Adresse</label>
                      <input type="textarea" class="form-control" id="Adresse" name="Adresse" placeholder="Adresse" <?php if (isset($salleToEdit)) echo 'value".'.$salleToEdit['Adresse'].'"' ?>  >
                    </div>
                    <div class="form-group">
                      <label for="capacite">capacite</label>
                      <input type="text" class="form-control" id="capacite" placeholder="Capacite" name="capacite"   <?php if (isset($salleToEdit)) echo 'value".'.$salleToEdit['capacite'].'"' ?>    >
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
                          </td>
                          <td>
                          <?php echo $key['capacite']; ?> 
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