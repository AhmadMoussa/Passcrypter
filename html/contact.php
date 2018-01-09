<?php
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Contact</title>

		<?php include "requiredHeader.php"; ?>
	</head>

	<body>
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
	                            <a class="nav-link" data-toggle="modal" href="#basicExample">Add</a>
	                        </li>

	                        <li class="nav-item">
	                            <a href="manage.php" class="nav-link">Manage</a>
	                        </li>
	                        
	                        <li class="nav-item">
	                            <a href="account.php" class="nav-link">Account</a>
	                        </li>

	                        <li class="nav-item active">
	                            <a class="nav-link">Contact</a>
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

		<main>
			<div class="container">

				<br><br>

				<!-- main content -->
				<div class="row">
					<!-- contact form -->
					<div class="col-md-12">
						<div class="card">
							<div class="card-block">
								<!-- header -->
								<div class="form-header mdb-color">
                        			<h3><i class="fa fa-envelope"></i> Write to us:</h3>
                    			</div>

                    			<div class="md-form">
			                        <i class="fa fa-user prefix"></i>
			                        <input type="text" id="form3" class="form-control">
			                        <label for="form3">Your name</label>
			                    </div>

			                    <div class="md-form">
			                        <i class="fa fa-envelope prefix"></i>
			                        <input type="text" id="form2" class="form-control">
			                        <label for="form2">Your email</label>
			                    </div>

			                    <div class="md-form">
			                        <i class="fa fa-tag prefix"></i>
			                        <input type="text" id="form32" class="form-control">
			                        <label for="form32">Subject</label>
			                    </div>

			                    <div class="md-form">
			                        <i class="fa fa-pencil prefix"></i>
			                        <textarea type="text" id="form8" class="md-textarea"></textarea>
			                        <label for="form8">Message</label>
			                    </div>

			                    <div class="text-center">
			                        <button class="btn btn-ins">Submit</button>
			                    </div>

							</div>
						</div>
					</div>
					<!--./contact form -->

					<!-- contact info -->
					<div class="row mx-auto text-center">
						<div class="col-md-6">
		                    <i class="fa fa-phone fa-3x"></i></a>
		                    <p>+ 01 234 567 89</p>
		                </div>

		                <div class="col-md-6">
		                    <i class="fa fa-envelope fa-3x"></i></a>
		                    <p>contact@gmail.com</p>
		                </div>
					</div>
					<!-- contact info -->
				</div>
				<!--./ main content -->
			</div>

			<!-- insert modal -->
			<?php include "addModal.php" ?>
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

	    <script>
	    new WOW().init();
	    </script>
	</body>
</html>