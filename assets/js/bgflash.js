var colors = new Array("Violet","Indigo","Blue","Green","Yellow","Orange","Red");
var colornow = 0;
var btnconfig = 0;
var id;
function changeBackground(color){
	document.body.style.background = color;
}
function incrementColor(){
	if(colornow == 7){
		colornow = 0;	
	}
	else{
		colornow++;	
	}
}
/*function loopli() {
	setTimeout(function () {
		changeBackground(colors[colornow]);
			incrementColor();
			loopli();		
	},100);
}	*/
function flash(){
	btnconfig = btnconfig + 1;
	if(btnconfig%2 == 1){
		document.getElementById("napoleon").src = "https://cryptex.drishticet.org/assets/images/napoleoncool.jpg";
		id = setInterval(loopli, 100);
		function loopli() {
			changeBackground(colors[colornow]);
			incrementColor();
		}		
		//loopli();
	}
	else if(btnconfig%2 == 0){
		clearInterval(id);
		document.body.style.background = "black";
		document.getElementById("napoleon").src = "https://cryptex.drishticet.org/assets/images/napoleon.jpg";
	}
}