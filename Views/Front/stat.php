<?php
include '../../Controller/evenementC.php';
require_once '../../model/evenement.php';

session_start();
$filtre = "vente";
$filmC = new filmC();
$film["vente"] = $filmC->TriVentes();
$film["venteA"] = $filmC->TriVentesA();
$film["avis"] = $filmC->TriAvis();
$film["avisA"] = $filmC->TriAvisA();
if(isset($_POST["test"])){ 
  $filmC->Noter($_SESSION['sq'], $_POST["note"]);
  header("Location:profile.php");
}
if(isset($_POST['tri'])){
  $filtre = $_POST["filtre"];
  $_SESSION['filtre'] = $filtre;
}
echo $_SESSION['filtre'];
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

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">info@example.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55
      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html"> PopCornTn </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.html">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php">Films</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

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
      
      <h2><?php echo "Classements" ?></h2>
      <p>Cherchez vos Films préférés</p>
    </div>
    <form action="" method="POST">
      <select name="filtre" id="filtre">
        <option value="vente">Ventes</option>
        <option value="venteA">Ventes Ascendant</option>
        <option value="avis">Avis</option>
        <option value="avisA">Avis Ascendant</option>
      </select>
      <input type="submit" name="tri" id="tri" value="Go">
    </form>
    <table style="border: 1px solid black;border-collapse:collapse;width:50%;">
      <tr>
        <th style="border: 1px solid black;border-collapse:collapse;"></th>
        <th style="border: 1px solid black;border-collapse:collapse;text-align: center;"><?php echo "Titre"?></th>
        <th style="border: 1px solid black;border-collapse:collapse;text-align: center;"><?php echo "Realisateur"?></th>
        <th style="border: 1px solid black;border-collapse:collapse;text-align: center;<?php 
          if(($_SESSION['filtre'] == "vente")||($_SESSION['filtre'] == "venteA"))
            {
              echo "color:red;";
            }
        ?>"><?php 
        if(($_SESSION['filtre'] == "vente")||($_SESSION['filtre'] == "venteA")){echo "<b>";} 
        echo "Vente";
        if(($_SESSION['filtre'] == "vente")||($_SESSION['filtre'] == "venteA")){echo "</b>";}
        ?></th>
        <th style="border: 1px solid black;border-collapse:collapse;text-align: center;"><?php echo "Prix"?></th>
        <th style="border: 1px solid black;border-collapse:collapse;text-align: center;<?php 
          if(($_SESSION['filtre'] == "avis")||($_SESSION['filtre'] == "avisA"))
            {
              echo "color:red;";
            }
        ?>"><?php 
        if(($_SESSION['filtre'] == "avis")||($_SESSION['filtre'] == "avisA")){echo "<b>";} 
        echo "Note";
        if(($_SESSION['filtre'] == "avis")||($_SESSION['filtre'] == "avisA")){echo "</b>";}
        ?></th>
      </tr>
      <?php foreach ($film[$filtre] as $key) {
      ?>
      <tr>
        <td style="border: 1px solid black;border-collapse:collapse;text-align: center;"><img  src="<?php echo $key["img"] ?>"  width="75"  height="75" alt="image"/></td>
        <td style="border: 1px solid black;border-collapse:collapse;text-align: center;"><?php echo $key["titre"]?></td>
        <td style="border: 1px solid black;border-collapse:collapse;text-align: center;"><?php echo $key["auteur"]?></td>
        <td style="border: 1px solid black;border-collapse:collapse;text-align: center;"><?php echo $key["vente"]?></td>
        <td style="border: 1px solid black;border-collapse:collapse;text-align: center;"><?php echo $key["prix"] . "DT"?></td>
        <td style="border: 1px solid black;border-collapse:collapse;text-align: center;"><?php echo number_format((float)$key["note"], 1, '.', ''). "/5" ?></td>
      </tr>
      <?php
      }
      ?>
    </table>
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