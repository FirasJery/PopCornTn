<?php
include '../../Controller/evenementC.php';
include '../../Controller/mail.php';
include "head.php";
require_once '../../model/evenement.php';
include '../../Controller/sponsorC.php';
require_once '../../model/sponsor.php';


$eventC = new evenementC();
if (isset($_GET['id'])) {
  $eventToEdit = $eventC->getevenementbyID($_GET['id']);
}


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
      $evenementC = new evenementC();
      $sponsorC = new sponsorC();
      if (isset($_REQUEST['add'])) {
        $evenement = new evenement(1, $_POST['titre'], $_POST['description'], $target_file, $_POST['auteur'], $_POST['prix']);
        $evenementC->ajouterevenement($evenement);
        $email = 'firas.jery@gmail.com';
        $email_content = array(
          'Subject' => 'event bien ajoute',
          'body' => "Bonjour Mr/Mme ,
               votre evenement est bien ajoute,
               cordialement,
               POPCORNTN"
        );
        sendemail($email, $email_content);
        $sponsor = new sponsor(1, $_POST['sponsor'], $evenement->getid());
        $sponsorC->ajoutersponsor($sponsor);
      } else if (isset($_REQUEST['edit'])) {
        $evenement = new evenement($_POST['id'], $_POST['titre'], $_POST['description'], $target_file, $_POST['auteur'], $_POST['prix']);
        $evenementC->modifierevenement($evenement);
      }
      header('Location:blank.php');
    } else {
      echo 'chyyyyyyyy2';
      header('Location:blank.php');
    }
  }
}
if (isset($_REQUEST['search'])) {
  $listeEvents = $eventC->searchevenement($_POST['search_text']);
} else if (isset($_REQUEST['tri'])) {
  $listeEvents = $eventC->trievenement();
} else {
  $listeEvents = $eventC->afficherevenement();
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
                  <h4 class="card-title">Formulaire evenement</h4>

                  <form class="forms-sample" action="" enctype="multipart/form-data" method="POST">
                    <?php if (isset($eventToEdit)) { ?>
                      <div class="form-group">
                        <label for="id">id</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $eventToEdit['id'] ?>">
                      </div>
                    <?php  } ?>
                    <div class="form-group">
                      <label for="nom">nom</label>
                      <input required type="text" class="form-control" id="nom" name="titre" placeholder="nom" <?php if (isset($eventToEdit)) echo $eventToEdit['titre']  ?>>
                    </div>
                    <div class="form-group">
                      <label for="description">description</label>
                      <input required type="textarea" class="form-control" id="description" name="description" placeholder="description" <?php if (isset($eventToEdit)) echo 'value".' . $eventToEdit['description'] . '"' ?>>
                    </div>
                    <div class="form-group">
                      <label for="Realisateur">Realisateur</label>
                      <input required type="text" class="form-control" id="Realisateur" placeholder="Realisateur" name="auteur" <?php if (isset($eventToEdit)) echo 'value".' . $eventToEdit['auteur'] . '"' ?>>
                    </div>
                    <div class="form-group">
                      <label for="Prix">Prix</label>
                      <input required type="number" class="form-control" id="Prix" placeholder="Prix" name="prix" <?php if (isset($eventToEdit)) echo 'value".' . $eventToEdit['prix'] . '"' ?>>
                    </div>
                    <div class="form-group">
                      <label for="date">Date</label>
                      <input required type="date" class="form-control" id="date" name="date">
                    </div>

                    <div class="form-group">
                      <label>File upload</label>
                      <input required type="file" class="form-control" id="fileToUpload" name="fileToUpload">
                    </div>
                    <div class="form-group">
                      <label for="sponsor">sponsor</label>
                      <input required type="text" class="form-control" id="sponsor" placeholder="sponsor" name="sponsor" <?php // if (isset($eventToEdit)) echo 'value".'.$eventToEdit['nom_sponsor'].'"' 
                                                                                                                          ?>>
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
                  <h4 class="card-title">Evenements</h4>
                  <form class="forms-sample" action="" enctype="multipart/form-data" method="POST">
                    <input type="text" class="form-control" id="search_text" placeholder="search_text" name="search_text">
                    <button type="submit" name="search" class="btn btn-primary me-2">Search</button>
                    <button type="submit" name="tri" class="btn btn-primary me-2">Tri</button>
                  </form>

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
                            Date
                          </th>
                          <th>
                            Prix
                          </th>
                          <th>
                            affiche
                          </th>
                          <th>
                            sponsor
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
                              <?php echo $key['date_ajout']; ?>
                            </td>
                            <td>
                              <?php echo $key['prix']; ?>
                            </td>

                            <td class="py-1">
                              <img src="<?php echo $key['img']; ?>" alt="image" />
                            </td>
                            <td>
                              <?php echo $key['nom_sponsor']; ?>
                            </td>
                            <td>
                              <a href="blank.php?id=<?php echo $key['id_event']; ?>">
                                <button type="button" class="btn btn-dark btn-icon-text">
                                  Edit
                                  <i class="ti-file btn-icon-append"></i>
                                </button>
                              </a>

                            </td>
                            <td>
                              <a href="deleteEvent.php?id=<?php echo $key['id_event']; ?>">
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
          <div>
            <!---- Order list -->
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Charts</h4>
                  <table>
                    <tbody>
                      <tr>
                        <canvas id="bar-chart-horizontal" width="800" height="100"></canvas>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Export</h4>
                <a href="export.php">
                  <button class="btn btn-danger">Export Excel</button>
              </div>
            </div>
          </div>
        </div>
      </div>



    </div>




    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
    <script>
      new Chart(document.getElementById("bar-chart-horizontal"), {
        type: 'horizontalBar',
        data: {
          labels: ["Evenements"],
          datasets: [{
            label: "Nombre evenements",
            backgroundColor: ["#3e95cd", "#8e5ea2"],
            data: [<?php echo $eventC->countEvent(); ?>]
          }]
        },
        options: {
          scales: {
            xAxes: [{
              ticks: {
                stepSize: 1
              }
            }]
          },
          legend: {
            display: false
          },
          title: {
            display: true,
            text: 'Nombre des evenements'
          }
        }
      });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>