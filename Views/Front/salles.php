<?php
include '../../Controller/salleC.php';
require_once '../../model/salle.php';

$salleC = new salleC();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Salles </title>
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
<?php 
if(isset($_REQUEST['search'])){
  $listesalles=$salleC->searchsalle($_POST['search_text']);
  
}
else {
  $listesalles = $salleC->affichersalle();
}
?>
<body>

<?php
include 'head.php';
?>


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index_2.php">Acceuil</a></li>
          <li> Salles </li>
        </ol>
        <h1>Salles</h1>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
      <form class="forms-sample" action="" enctype="multipart/from-data" method="POST">
  <input  class="form-control" name="search_text" type="text" placeholder="Rechercher Salles.."></input>
  <button type="submit" name="search" class="btn btn-outline-primary">Search</button>
</form>
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
          <div class="container">

            <div class="section-title">

              <h1>Salles</h1>
              <p>decouvrez nos salles</p>
            </div>

            <div class="row">
              <?php foreach ($listesalles as $key) { ?>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                  <div class="icon-box">
                    <div class="icon"><i class="bi bi-card-text"></i></div>
                    <h4><a href=""><?php echo $key['Nom']; ?> </a></h4>
                    <img src="<?php echo $key['img']; ?>" width="250" height="250" alt="image" />
                    <p><?php echo $key['Adresse']; ?> </p>
                    <p><?php echo $key['capacite'] ; ?> places </p>
                    
                  </div>
                </div>
              <?php
              }
              ?>

            </div>

          </div>
        

      </div>
    </section>

  </main><!-- End #main -->



  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
      <div class="container">

       
        <div class="row" data-aos="fade-up">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>PARC TECHNOLOGIQUE
                2088 ARIANA</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>Popcorn@esprit.tn</p>
              
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+1 5589 55488 55</p>
            </div>
          </div>

        </div>

        <button style = "position:center;"  ><a href="bot.php"> Aide </a></button>
        
      </div>
    </section><!-- End Contact Section -->
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