<?php
	session_start();
	if(isset($_SESSION["username"])){
		header("Location: html/manage.php");
	}
?> 


<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>PassCrypter</title>

		<!-- Font Awesome -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

	    <!-- Bootstrap core CSS -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">

	    <!-- Material Design Bootstrap -->
	    <link href="css/mdb.min.css" rel="stylesheet">

	    <!-- custom styling -->
	    <link href="css/intro.css" rel="stylesheet">
	</head>

	<body>
		<!--Navigation & Intro-->
		<header>
		    <!--Mask-->
		    <div class="view hm-black-strong">
		        <div class="full-bg-img flex-center">
		            <div class="container">
		                <div class="row" id="home">

		                    <!--First column-->
		                    <div class="col-lg-6">
		                        <div class="description">
		                            <h2 class="h2-responsive wow fadeInLeft">Sign up right now! </h2>
		                            <hr class="hr-dark wow fadeInLeft">
		                            <p class="wow fadeInLeft" data-wow-delay="0.4s">Strong passwords combined with having many passwords can cause headaches. Our manager helps eliminate that by letting you access your paswords from any browser, anywhere, anytime, no need to carry yet another device or install on multiple computers.</p>
		                            <br>
		                            
		                        </div>
		                    </div>
		                    <!--/.First column-->

		                    <!--Second column-->
		                    <div class="col-lg-6">		     
								<!--Form-->
	                        <div class="card wow fadeInRight">
	                            <div class="card-block">
	                                <!--Header-->
	                                <div class="text-center">
	                                    <h3><i class="fa fa-user"></i> Register:</h3>
	                                    <hr>
	                                </div>

	                                <!--Body-->
	                                <div class="md-form form-sm" id="emailSignUpForm">
		                                <i class="fa fa-envelope prefix"></i>
		                                <input type="text" id="emailSignUp" class="form-control">
		                                <label for="emailSignUp">Your email</label>
		                            </div>

		                            <div class="md-form form-sm" id="passwordSignUpForm">
		                                <i class="fa fa-lock prefix"></i>
		                                <input type="password" id="passSignUp" class="form-control">
		                                <label for="passSignUp">Your password</label>
		                            </div>

		                            <div class="md-form form-sm">
		                                <i class="fa fa-lock prefix"></i>
		                                <input type="password" id="passConfirm" class="form-control">
		                                <label for="passConfirm">Repeat password</label>
		                            </div>

	                                <div class="text-center form-sm mt-2" id="signUpButton">
		                                <button class="btn btn-info" data-toggle="modal" data-target="">Sign up <i class="fa fa-sign-in ml-1"></i></button>
		                            </div>

	                                <br>

	                                <!--Footer-->
			                        <div class="modal-footer">
			                            <div class="options  mx-auto">
			                                <p class="pt-1">Already have an account? <a data-toggle="modal" data-target="#modalLogin" href="#" class="blue-text">Log In</a></p>
			                            </div>
			                        </div>

			                    </div>
	                        </div>
	                        <!--/.Form-->
                                            
		                    </div>
		                    <!--/Second column-->
		                </div>
		            </div>
		        </div>
		    </div>
		    <!--/.Mask-->

		</header>
		<!--/Navigation & Intro-->

		<!--Modal: Login Form-->
		<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog cascading-modal" role="document">
		        <!--Content-->
		        <div class="modal-content">

		            <!--Header-->
		            <div class="modal-header light-blue darken-3 white-text">
		                <h4 class="title mx-auto"><i class="fa fa-user"></i> Log in</h4>
		            </div>
		            <!--Body-->
		            <div class="modal-body" id="logInFrom">
		                <div class="md-form form-sm">
		                    <i class="fa fa-envelope prefix"></i>
		                    <input type="text" id="emailLogIn" class="form-control">
		                    <label for="emailLogIn">Your email</label>
		                </div>

		                <div class="md-form form-sm">
		                    <i class="fa fa-lock prefix"></i>
		                    <input type="password" id="passwordLogIn" class="form-control">
		                    <label for="passwordLogIn">Your password</label>
		                </div>

		                <div class="text-center mt-2">
		                    <a><button class="btn btn-info" id="btnLogIn">Log in <i class="fa fa-sign-in ml-1"></i></button></a>
		                </div>

		            </div>
		        </div>
		        <!--/.Content-->
		    </div>
		</div>
		<!--Modal: Login Form-->

		<!-- SCRIPTS -->

	    <!-- JQuery -->
	    <script type="text/javascript" src="js/mdb/jquery-2.2.3.min.js"></script>

	    <!-- Bootstrap tooltips -->
	    <script type="text/javascript" src="js/mdb/tether.min.js"></script>

	    <!-- Bootstrap core JavaScript -->
	    <script type="text/javascript" src="js/mdb/bootstrap.min.js"></script>

	    <!-- MDB core JavaScript -->
	    <script type="text/javascript" src="js/mdb/mdb.min.js"></script>

	    <!-- Custom Classes -->
	    <script src="js/customClasses.js" type="text/javascript" charset="utf-8"></script>

	    <script src="js/crypto.js" type="text/javascript" charset="utf-8"></script>

	    <script src="js/page scripts/index.js" type="text/javascript" charset="utf-8"></script>

	    <script>
	    new WOW().init();
	    $('#modalLRForm').modal('toggle');
	    </script>
	</body>
</html>