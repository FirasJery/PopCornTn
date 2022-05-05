
<?php
				require_once "../../controler/userCont.php";
                if (isset($_POST['idproduit'])){
					$idproduit=$_POST["idproduit"];
				$produit1C=new userC();
				$listeproduits=$produit1C->recherche($idproduit);
				?>

<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>DataTables | Gentelella</title>

	<!-- Bootstrap -->
	<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- Datatables -->

	<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
	<link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
	<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
	<link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>CarePoint </span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="images/ahmedpdp.jpg" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2>Karoui Ahmed</h2>
						</div>
					</div>
				  
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>General</h3>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="index.html">Dashboard</a></li>
										<li><a href="index2.html">Dashboard2</a></li>
										<li><a href="index3.html">Dashboard3</a></li>
									</ul>
								</li>
							   
								<li><a><i class="fa fa-table"></i> Gestion Des Produits <span class="fa fa-chevron-down"></span></a>
									 <ul class="nav child_menu">
										
										<li><a href="afficher-produits.php">Afficher Produits</a></li>
										<li><a href="ajouter-produits.php">Ajouter Produits</a></li>
										<li><a href="supprimer-produits.php">Supprimer Produits</a></li>
										<li><a href="modifier-produits.php">Modifier Produits</a></li>
									</ul>
							   </li>
							   <li><a><i class="fa fa-table"></i> Gestion Des Categories <span class="fa fa-chevron-down"></span></a>
                                         <ul class="nav child_menu">
                                            
                                            <li><a href="afficher-categories.php">Afficher Categories</a></li>
                                            <li><a href="ajouter-categories.php">Ajouter Categories</a></li>
                                            <li><a href="supprimer-categories.php">Supprimer Categories</a></li>
                                            <li><a href="modifier-categories.php">Modifier Categories</a></li>
                                        </ul>
                                   </li>

							
							   
							</ul>
						</div>
					

					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<nav class="nav navbar-nav">
						<ul class=" navbar-right">
							<li class="nav-item dropdown open" style="padding-left: 15px;">
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
									<img src="images/ahmedpdp.jpg" alt="">Karoui Ahmed
								</a>
								<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="javascript:;"> Profile</a>
									<a class="dropdown-item" href="javascript:;">
										<span class="badge bg-red pull-right">50%</span>
										<span>Settings</span>
									</a>
									<a class="dropdown-item" href="javascript:;">Help</a>
									<a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
								</div>
							</li>

							<li role="presentation" class="nav-item dropdown open">
								<a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-envelope-o"></i>
									<span class="badge bg-green">6</span>
								</a>
								<ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
									<li class="nav-item">
										<a class="dropdown-item">
											<span class="image"><img src="images/ahmedpdp.jpg" alt="Profile Image" /></span>
											<span>
						<span>Karoui Ahmed</span>
											<span class="time">3 mins ago</span>
											</span>
											<span class="message">
					   this costumer has made an order hurry up .... 
					  </span>
										</a>
									</li>
									<li class="nav-item">
										<a class="dropdown-item">
											<span class="image"><img src="images/ahmedpdp.jpg" alt="Profile Image" /></span>
											<span>
						<span>Karoui Ahmed</span>
											<span class="time">3 mins ago</span>
											</span>
											<span class="message">
						welcome again ahmed!!!!
					  </span>
										</a>
									</li>
									<li class="nav-item">
										<a class="dropdown-item">
											<span class="image"><img src="images/ahmedpdp.jpg" alt="Profile Image" /></span>
											<span>
						<span>Karoui Ahmed</span>
											<span class="time">3 mins ago</span>
											</span>
											<span class="message">
						your sales are rising like thunder
					  </span>
										</a>
									</li>
									<li class="nav-item">
										<a class="dropdown-item">
											<span class="image"><img src="images/ahmedpdp.jpg" alt="Profile Image" /></span>
											<span>
						<span>Karoui Ahmed</span>
											<span class="time">3 mins ago</span>
											</span>
											<span class="message">
						you should check these products..........
					  </span>
										</a>
									</li>
									<li class="nav-item">
										<div class="text-center">
											<a class="dropdown-item">
												<strong>See All Alerts</strong>
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->

			<!-- page content -->


				
				<div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3> <small>CECI EST LE PRODUIT CHERCHE SELON SON ID</small></h3>
                            </div>

                            <div class="title_right">
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Produit selon id</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="ajouter-produits.php">Ajouter produit</a>
                                                    <a class="dropdown-item" href="supprimer-formulaire.php">Supprimer produit</a>
                                                    <a class="dropdown-item" href="modifier-formulaire.php">Modifier produit</a>
                                                </div>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">

                                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Id Produit</th>
                                                                <th>Nom Produit</th>
                                                                <th>Categorie Produit</th>
                                                                <th>Marque Produit</th>
                                                                <th>Prix produit</th>
                                                                <th>Quantite Produit</th>
                                                                <th>Code</th>
                                                                <th>Actions</th>

                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                        <?php
                                                       foreach($listeproduits as $row){
	                                                   ?>
	                                                      <tr>
	                                                            <td><?PHP echo $row['nom']; ?></td>
	                                                            <td><?PHP echo $row['prenom']; ?></td>
	                                                            <td><?PHP echo $row['sexe']; ?></td>
	                                                            <td><?PHP echo $row['email']; ?></td>
	                                                            <td><?PHP echo $row['login']; ?></td>
                                                                <td><?PHP echo $row['prixproduit']; ?></td>
                                                                <td><?PHP echo $row['code']; ?></td>
                                                                <td><a href="ajouter-produits.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ajouter </a>
                                                                <a href="modifier-formulaire.php" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier </a>
                                                                <a href="supprimer-formulaire.php" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>  Supprimer </a></td>
                                                        </tr>
	                                                    <?PHP
}}
                                                        ?>
                                                     

                                                        </tbody>
                                                    </table>
                                                    <a href="afficher-produits.php" class="btn btn-info btn-xs"><i "></i> RETOUR </a>
                                     
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- iCheck -->
        <script src="../vendors/iCheck/icheck.min.js"></script>
        <!-- Datatables -->
        <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        <script src="../vendors/jszip/dist/jszip.min.js"></script>
        <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>

    </body>
    </html>