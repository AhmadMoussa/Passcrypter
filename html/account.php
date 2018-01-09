<?php
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../index.php");
	}
?>

<!DOCTYPE html>

<html lang="en">

<html>
	<head>
		<title>Account</title>

		<?php include "requiredHeader.php"; ?>
	</head>
	
	<body>
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
	                            <a href="manage.php" class="nav-link">Manage <span class="sr-only">(current)</span></a>
	                        </li>
	                        
	                        <li class="nav-item active">
	                            <a class="nav-link">Account</a>
	                        </li>

	                        <li class="nav-item">
	                            <a href="contact.php" class="nav-link">Contact</a>
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

		<!-- main content -->
		<main>
			<div class="container">

				<!-- personal info -->
				<div class="row">
		            <div class="col-md-12">
		                <h2 class="h2-responsive">Personal Info</h2>
		            </div>
		        </div>

		        <br>

		        <div class="list-group">
		        	<div class="list-group-item justify-content-between">
		        		<strong>Name</strong>
		        		<span class="text-muted">Mouhammed EL Zaart</span>
		        		<i class="fa fa-pencil prefix"></i>
		        	</div>

		        	<div class="list-group-item justify-content-between">
		        		<strong>Email</strong>
		        		<span class="text-muted">mae98@mail.aub.edu</span>
		        		<i class="fa fa-pencil prefix"></i>
		        	</div>

		        	<div class="list-group-item justify-content-between">
		        		<strong>Change Password</strong>
		        		<i class="fa fa-pencil prefix"></i>
		        	</div>
		        </div>

				<!--./personal info -->

				<br>
				<br>

				<!-- account settings -->
				<div class="row">
		            <div class="col-md-12">
		                <h2 class="h2-responsive">Account Settings</h2>
		            </div>
		        </div>

		        <br>

		        <div class="list-group">
			        <div class="list-group-item justify-content-between">
			        	Notifications and Alert Settings
			        	<i class="fa fa-angle-right" aria-hidden="true"></i>
			        </div>
			  
			  		<div class="list-group-item justify-content-between">
			        	Cookie Settings
			        	<i class="fa fa-angle-right" aria-hidden="true"></i>
			        </div>

			        <div class="list-group-item justify-content-between">
			        	Account Recovery Options
			        	<i class="fa fa-angle-right" aria-hidden="true"></i>
			        </div>
			        
			        <div class="list-group-item justify-content-between">
			        	Language
			        	<i class="fa fa-angle-right" aria-hidden="true"></i>
			        </div>

			        <div class="list-group-item justify-content-between">
			        	Deactivate Account
			        	<i class="fa fa-angle-right" aria-hidden="true"></i>
			        </div>
		        </div>
				<!--/.account settings -->

				<br>
				<br>

				<!-- recent activity -->
				<div class="row">
		            <div class="col-md-12">
		                <h2 class="h2-responsive">Recent Activity</h2>
		            </div>
		        </div>

		        <br>

				<div class="list-group">
				    <div class="list-group-item flex-column align-items-start">
				        <div class="d-flex w-100 justify-content-between">
							<small><strong>6:30 PM</strong></small>
							<p class="mb-1">Signed in from Chrome (Mac)</p>
							<small class="text-muted">Beirut, Lebanon</small>
						</div>
				    </div>

				    <div class="list-group-item flex-column align-items-start">
				        <div class="d-flex w-100 justify-content-between">
							<small><strong>Jul 7</strong></small>
							<p class="mb-1">Signed in from Opera (Windows)</p>
							<small class="text-muted">Beirut, Lebanon</small>
						</div>
				    </div>

				    <div class="list-group-item flex-column align-items-start">
				        <div class="d-flex w-100 justify-content-between">
							<small><strong>May 8</strong></small>
							<p class="mb-1">Signed in from Chrome (Android)</p>
							<small class="text-muted">Beirut, Lebanon</small>
						</div>
				    </div>
				</div>
				<!--/.recent activity-->

				<br>
				<br>
			</div>
		</main>
		<!--/.main content -->

		<!-- SCRIPTS -->
		<?php include "requiredJS.php" ?>

	    <script>
	    new WOW().init();
	    $('#modalLRForm').modal('toggle');
	    </script>
	</body>
</html>