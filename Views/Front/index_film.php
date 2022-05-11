<?php
include '../../Controller/filmC.php';
require_once '../../Model/film.php';


session_start();
$filmC = new filmC();
$list['Pas de filtres'] = $filmC->afficherevenement();
$list['Action'] = $filmC->afficherevenementCateg("Action");
$list['Drama'] = $filmC->afficherevenementCateg("Drama");
$list['Comédie'] = $filmC->afficherevenementCateg("Comédie");
$list['Horreur'] = $filmC->afficherevenementCateg("Horreur");
$list['Romance'] = $filmC->afficherevenementCateg("Romance");
$list['Sci-Fi'] = $filmC->afficherevenementCateg("Sci-Fi");
$filtre = "Pas de filtres";
if(isset($_POST['search'])){
  $filtre = $_POST["categ"];
}
foreach($list["Pas de filtres"] as $key){
  if(isset($_POST["res" . $key["id"]])){
    $filmC->augmenterVente($key["titre"]);
  }
  if(isset($_POST["profile" . $key["id"]])){
    $_SESSION['sq'] = $key["id"];
    header("Location:profile.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Films </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Day - v4.7.0
  * Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<?php
include 'head.php';
?>

  <main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="index.html">Home</a></li>
      <li> Films </li>
    </ol>
    <h2>Films</h2>

  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
   <!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container">

    <div class="section-title">
      
      <h2>Films</h2>
      <p>Cherchez vos Films préférés</p>
      <form action="" method="post">
        <select name="categ" id="categ" value="Pas de filtres">
          <option value="Pas de filtres">Pas de filtres</option>
          <option value="Action">Action</option>
          <option value="Drama">Drama</option>
          <option value="Comédie">Comédie</option>
          <option value="Horreur">Horreur</option>
          <option value="Romance">Romance</option>
          <option value="Sci-Fi">Sci-Fi</option>
        </select>
        <input type="submit" name="search" value="Go"/>
      </form>
    </div>

    <div class="row">
    <?php 
    foreach ($list[$filtre] as $key) {

       ?>
       
       <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
        <div class="icon-box">
          <div class="icon"><i class="bx bxl-dribbble"></i></div>
          <h4><a href=""><?php echo $key['titre']; ?> </a></h4>
          <img  src="<?php echo $key['img']; ?>"  width="250"  height="250" alt="image"/>  
          <p><?php echo $key['categorie']; ?> </p>
          <form method="post">
            <input type="submit" name="res<?php echo $key['id']?>" id="res<?php echo $key['id']?>" style="position:relative;right:-45px;" value="Reserver"/>
            <input type="submit" name="profile<?php echo $key['id']?>" id="profile<?php echo $key['id']?>" style="position:relative;bottom:-35px;right:40px;" value="Voir plus"/>
          </form>
        </div>
      </div>
    <?php
    }
    ?>

    </div>

  </div>
</section><!-- End Services Section -->
<section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">

        <div class="row d-flex align-items-center">

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->
    <p align = "center">
     End 
    </p>
  </div>
</section>

</main><!-- End #main -->

  

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>PopCornTn</h3>
              <p>
                Ariana Soghra , Tunisia <br>
                <strong>Phone:</strong> +216 00000000 <br>
                <strong>Email:</strong> Contact@PopCorn.tn<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

    <div class="container">
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
        Designed by Team Spirit</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>