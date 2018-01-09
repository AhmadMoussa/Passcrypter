window.onload = function() {
	centerHorizontal();
};


function centerHorizontal() {
	var elements = document.getElementsByClassName("center-horizontal");
	for (var i = 0; i <= elements.length-1; i++) {
		element = elements[i];
		element.style.position = "absolute";

		var parent = element.parentElement;
		alert(parent.clientWidth);
		element.left = parent.left + parent.clientWidth/2 - element.clientWidth/2;

	}
}