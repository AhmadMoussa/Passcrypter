/*jshint esversion: 6 */

window.onload = function() {
	// add listeners
	document.getElementById("signUpButton").onclick = function() {
		// remove warning if exists
		$('#emailSignUpWarning').remove();

		verifyEmail();
	};

	document.getElementById("btnLogIn").onclick = logIn;
};


function logIn() {
	var email = document.getElementById("emailLogIn").value;
	// check mail validity
	if (!isEmailValid(email)) {
		// dispaly warning
		showLogInWarning("Invalid Email");
		return;
	}

	$('#logInWarning').remove();

	
	hashStr(document.getElementById("passwordLogIn").value, function(hash) {
		var ajax = new XMLHttpRequest();
		var url = "dummy/backend/login.php";

		ajax.open("GET", url+"?email="+email+"&password="+hash);

		ajax.onload = function() {
			alert(this.responseText);
			var response = JSON.parse(this.responseText);
			if (response.loggedIn) {
				logUser(email, document.getElementById("passwordLogIn").value);
				window.location.replace("html/manage.php");
			} else {
				showLogInWarning("Invalid email or password.");
			}
		};

		ajax.send();
	});
}

function signUp() {
	// remove warning if exists
	$('#passwordSignUpWarning').remove();

	var pass = document.getElementById("passSignUp").value;
	var passConfirm = document.getElementById("passConfirm").value;

	if (!(pass || passConfirm)) {
		showPasswordSignUpWarning("Please fill the Password and Confirm Password fields.");
		return;
	}

	if (pass != passConfirm) {
		showPasswordSignUpWarning("Password's don't match");
		return;
	}

	if (pass.length < 8) {
		showPasswordSignUpWarning("Password should be at least 8 characters long.");
		return;
	}

	// send request
	var ajax = new XMLHttpRequest();
	var url = "dummy/backend/register.php";

	ajax.open("POST", url, true);

	ajax.onload = function() {
		alert(this.responseText);
		var response = JSON.parse(this.responseText);
		if (response.succeeded) {
			logUser(document.getElementById("emailSignUp").value, pass);
		}
	};

	// register user
	hashStr(pass, function(hash) {
		var params = new FormData();
		params.append("email", document.getElementById("emailSignUp").value);
		params.append("password", hash);
		ajax.send(params);
	});
}

function verifyEmail() {
	var mail = document.getElementById("emailSignUp").value;

	// check if email is in correct format
	if (!isEmailValid(mail)) {
		// dispaly warning
		showEmailSignUpWarning("Invalid Email");
	}

	// check if email already exists
	var ajax = new XMLHttpRequest();
	var url = "dummy/backend/verifyEmail.php";

	ajax.open("GET", url+"?email="+mail, true);
	ajax.onload = function() {
		var response = JSON.parse(this.responseText);
		alert(this.responseText);
		alert(response.userExists);
		if (response.userExists) {
			showEmailSignUpWarning("Email is already used.");
			alert("email already exists");
		} else {
			signUp();
		}
	};

	ajax.send();
}

function showEmailSignUpWarning(msg) {
	var warning = document.createElement("p");
	warning.className = "text-danger";
	warning.id = "emailSignUpWarning";
	warning.innerHTML = msg;

	document.getElementById("emailSignUpForm").appendChild(warning);
}

function showPasswordSignUpWarning(msg) {
	var warning = document.createElement("p");
	warning.className = "text-danger";
	warning.id = "passwordSignUpWarning";
	warning.innerHTML = msg;

	document.getElementById("passwordSignUpForm").appendChild(warning);
}

function showLogInWarning(msg) {
	var warning = document.createElement("p");
	warning.className = "text-danger";
	warning.id = "logInWarning";
	warning.innerHTML = msg;

	document.getElementById("logInFrom").appendChild(warning);
}

function isEmailValid(email) {
	var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}

function logUser(email, pass) {
	hashStr(pass, function(hash) {
		sessionStorage.setItem("pass", pass);
		sessionStorage.setItem("passHash", hash);
		sessionStorage.setItem("email", email);
		window.location.replace("./html/manage.php");
	});
}
