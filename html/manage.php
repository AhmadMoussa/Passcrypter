<?php
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../index.php");
	}
?>

<!DOCTYPE html>
	<html lang="en">
	
	<head>
		<title>PassCrypter</title>

		<?php include "requiredHeader.php"; ?>
	</head>
	
	<body>

		<!-- insert templates -->
		<?php include "accountTemplate.php" ?>

		<header>
			<!-- Navbar -->
			<nav class="navbar navbar-toggleable-md navbar-dark">
	            <div class="container">
	            	<!-- toggle menu -->
	                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
	                    <span class="navbar-toggler-icon"></span>
	                </button>

	                <!-- logo -->
	                <a class="navbar-brand" href="#">
	                    <strong>PassCrypter</strong>
	                </a>

	                <!-- navbar links -->
	                <div class="collapse navbar-collapse" id="navbarNav1">
	                    <ul class="navbar-nav mr-auto">
	                    	<li class="nav-item">
	                            <a class="nav-link" data-toggle="modal" href="#basicExample" id="modalAddShow">Add</a>
	                        </li>

	                        <li class="nav-item active">
	                            <a class="nav-link">Manage <span class="sr-only">(current)</span></a>
	                        </li>
	                        
	                        <li class="nav-item">
	                            <a href="account.php" class="nav-link">Account</a>
	                        </li>

	                        <li class="nav-item">
	                            <a href="contact.php" class="nav-link">Contact</a>
	                        </li>

	                        <li class="nav-item">
	                            <a href="../dummy/backend/logout.php" class="nav-link">Log Out</a>
	                        </li>
	                    </ul>

	                    <!-- search -->
	                    <form class="form-inline waves-effect waves-light">
	                        <input class="form-control" type="text" placeholder="Search">
	                    </form>
	                </div>
	            </div>
        	</nav>
		</header>

		<!-- insert modal -->
		<?php include "addModal.php" ?>

		<!-- credentials modal -->
		<div class="modal fade" id="credsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<!--Content-->
				<div class="modal-content">
					<!--Header-->
					<div class="modal-header">
					<h4 class="modal-title mx-auto" id="modalCredsTitle"></h4>
					</div>

					<!--Body-->
					<div class="modal-body">
						<p><strong>Email: </strong><span id="modalCredsEmail"></span></p>

						<p><strong>Username: </strong><span id="modalCredsUsername"></span></p>

						<p><strong>Password: </strong><span id="modalCredsPassword"></span></p>
			    	</div>

		            <!--Footer-->
		            <div class="modal-footer">
		            	<p class="btn-flat waves-effect" id="modalCredsDelete"><strong>Delete</strong></p>
		            	<p class="btn-flat waves-effect" id="modalCredsClose"><strong>Close</strong></p>
		            </div>
		        </div>
		        <!--/.Content-->
			</div>
		</div>
		<!-- Modal -->

		<main>
			<!-- main layout -->
			<div class="container" id="accounts">
				<!--Page heading-->
	            <div class="row">
	                <div class="col-md-12">
	                    <h2 class="h2-responsive">Sites</h2>
	                </div>
	            </div>

	            <br>
			</div>
		</main>

		<!--Footer-->
		<footer class="page-footer center-on-small-only">
		<!--Footer links-->
		<div class="container-fluid">
		   	<div class="row">
		        <!--First column-->
		        <div class="col-md-10 offset-lg-1">
		            <h5 class="title">PassCrypter</h5>
		            <p>We are two college students working on this project like it's our full time job to make sure your passwords stay safe. PassCrypt remembers your passwords so you don't have to.</p>
		        </div>
		        <!--/.First column-->
		        <hr class="hidden-md-up">
		    </div>
		</div>
		<!--/.Footer links-->

		<!--Credits-->
		    <div class="footer-copyright">
		        <div class="containter-fluid">
		            Done by <span class="credits">Mouhammed El Zaart and Ahmad Mousa</span>
		        </div>
		    </div>
		    <!--/.Credits-->
		</footer>
    	<!--/.Footer-->
		

		<!-- SCRIPTS -->
	    <?php include "requiredJS.php" ?>

	    <script src="../js/page scripts/manage.js" type="text/javascript" charset="utf-8" async defer></script>

	    <script>
	    new WOW().init();
	    </script>
	</body>
</html>