/*jshint esversion: 6 */

window.onload = function() {

	// start of testing code
	// end of testing code

	loadAccounts();

	$("#addModalSave").click(addAccount);
	$("modalAddShow").click(() => { // remove warning when modal is shown
		$("#passwordMismatchWarning").remove();
	});

	$("#modalCredsDelete").click(deleteCred);

	// push footer to bottom of page
	var tHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
	var main = document.getElementsByTagName("main")[0];
	var footer = document.getElementsByTagName("footer")[0];
	
	main.style.minHeight = (tHeight - footer.clientHeight) + "px";
};

function deleteCred() {
	//alert("working");
	var domain = $("#modalCredsTitle").html();
	$.get("../dummy/backend/delete.php?domain="+domain, function(data) {console.log(data);});
	$("#credsModal").modal("hide");
	window.location.reload(true);
}

function addAccount() {
	var modal = $(this);
	
	// get account info
	var tag = document.getElementById("addModalTag").value;
	var websiteUrl = document.getElementById("addModalUrl").value;
	var email = document.getElementById("addModalEmail").value;
	var username = document.getElementById("addModalUsername").value;
	var pass = document.getElementById("addModalPass").value;
	var passConfirm = document.getElementById("addModalPassConfirm").value;

	if (!tag) {
		tag = "Other";
	}

	if (!websiteUrl) {
		showWarning("Please enter a website link.");
	}

	// check if passwords don't match
	if (pass != passConfirm) {
		// show warning
		var warning = document.createElement("p");
		warning.className = "text-danger";
		warning.id = "passwordMismatchWarning";
		warning.innerHTML = "Passwords don't match.";
		return;
	}

	// send post request to server
	var ajax = new XMLHttpRequest();
	var url = "../dummy/backend/addAccount.php";

	ajax.open("POST", url, true);

	// encrypt creds
	var passHash = sessionStorage.getItem("passHash");
	////alert(passHash);
	var credsEnc = encryptCreds(passHash, email, username, pass).then(credsEnc => {
		var params = new FormData();
		params.append("tag", tag);
		params.append("websiteUrl", websiteUrl);
		params.append("email", credsEnc.email);
		params.append("username", credsEnc.username);
		params.append("password", credsEnc.password);
		params.append("iv", arrayBufferToHex(credsEnc.iv.buffer));
		params.append("accUserName", sessionStorage.getItem("email"));

		//alert();

		ajax.onload = function() {
			//window.location.reload(true);
			alert(this.responseText);
		};

		ajax.send(params);
		////alert(true);
		$("#basicExample").modal('hide');
	});
}

function loadAccounts() {
	var ajax = new XMLHttpRequest();
	//alert(sessionStorage.getItem("email"))
	var url = "../dummy/backend/loadAccounts.php?accUserName="+sessionStorage.getItem("email");

	ajax.open("GET", url, true);
	ajax.onload = function() {
		console.log(ajax.responseText);
		var response = JSON.parse(ajax.responseText);
		//Format: response["tag"] => accounts[]

		for (var tag in response) {
		    if (response.hasOwnProperty(tag)) {
		        var accounts = response[tag];

		        // set up div
		        var div = $("#category").html();
		        div = div.replace("@tag", capitalizeFirstLetter(tag));
		        div = div.replace("@count", accounts.length);

		        var category = $(div);
		        var row;
		        var i;
		        for(i = 0; i <= accounts.length-1; i++) {	
		        	if (i%4 == 0) {
		        		row = $($("#rowTemplate").html());
		        		category.append(row);
		        	}

		        	var account = accounts[i];

		        	var card = $("#accountCard").html();
		        	card = card.replace("@websiteName", capitalizeFirstLetter(account.website));
		        	card = card.replace("@emailOrUsername", account.websiteUrl);

		        	card = $(card);

		        	// set image
		        	var url1 = "http://"+account.websiteUrl+"/favicon.ico";
		        	var url2 = "http://www.google.com/s2/favicons?domain_url="+ encodeURIComponent(account.websiteUrl);
		        	
		        	card.find("#thumbnail").error(function() {
		        		////alert(account.websiteUrl);
		        		$(this).attr("src", url2);
		        	});
		        	card.find("#thumbnail").attr("src", url1);

		        	// set on click listener for each card
		        	card.click(onCardClick);

		        	row.find("#accountRow").append(card);
	        	}

	        	// some shitty code to fix a shitty bug
	        	if (i%4 != 0) {
	        		for (var j = 1; j <= 4 - i%4; j++) {
	        			card = $($("#accountCard").html());
	        			card.css("visibility", "hidden");
	        			row.find("#accountRow").append(card);
	        		}
	        	}
	        	// end of shitty code

		        $("#accounts").append(category);
		    }
		}
	};

	ajax.send();
}


// called when a card is clicked
function onCardClick() {
	var websiteUrl = $(this).find("#websiteName").html();
	////alert(websiteUrl);

	// retrive encrypted credentials from server
	var ajax  = new XMLHttpRequest();
	var url = "../dummy/backend/loadCred.php?url="+websiteUrl+"&email="+sessionStorage.getItem("email");

	ajax.open("GET", url, true);
	ajax.onload = function() {
		console.log(this.responseText);

		var credentials = JSON.parse(this.responseText);
		
		var passHash = sessionStorage.getItem("passHash");
		////alert("Pass Hash: " +passHash);
		decryptCreds(passHash, credentials).then(creds => {
			showCredsModal(creds);
		});
	};

	ajax.send();
}

// responsible for showing up the creds modal with the right contents
function showCredsModal(creds) {
	////alert(JSON.stringify(creds));
	//alert("1");
	var modal = $("#credsModal");
	//alert(JSON.stringify(creds));
	var modalTitle = getDomainName(creds.websiteUrl);

	modal.find("#modalCredsTitle").html(capitalizeFirstLetter(modalTitle));
	modal.find("#modalCredsEmail").html(creds.email);
	modal.find("#modalCredsUsername").html(creds.username);
	modal.find("#modalCredsPassword").html(creds.password);

	modal.find("#modalCredsClose").click(() => {
		modal.modal("hide");
	});

	modal.modal("show");
}

// decrypts encrypted credentials
async function decryptCreds(pass, creds) {
	alert("Creds: "+JSON.stringify(creds));
	//alert("Pass: "+pass);
	var iv = hexToBytes(creds.iv);
	////alert(iv);

	creds.email = await decrypt(pass, creds.email, iv);
	creds.username = await decrypt(pass, creds.username, iv);
	creds.password = await decrypt(pass, creds.password, iv);
	//alert("3");

	//////alert(JSON.stringify(creds));

	return creds;
}

async function encryptCreds(pass, email, username, password) {
	var credsEnc = [];

	var iv = generateIV();
	
	credsEnc.email = await encrypt(pass, email, iv);
	credsEnc.username = await encrypt(pass, username, iv);
	credsEnc.password = await encrypt(pass, password, iv);
	credsEnc.iv = iv;

	return credsEnc;
}

function getDomainName(url) {
	//alert("url: "+url);
	var regex = /^(?:https?:\/\/)?(?:[^@\n]+@)?(?:www\.)?([^:\/\n]+)/im;
	return (url.match(regex)[1]).split(".")[0];
}

function showWarning(msg) {
	var warning = document.createElement("p");
	warning.className = "text-danger";
	warning.id = "passwordMismatchWarning";
	warning.innerHTML = msg;
	$("#addModalBody").append($(warning));
}

function imageExists(imageSrc, good, bad) {
    var img = new Image();
    img.src = imageSrc;
    img.onload = good; 
    img.onerror = bad;
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}