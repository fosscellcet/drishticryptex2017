//document.write(5 + 6);

var colors = new Array( "White", "Violet", "Indigo", "Blue", "Green", "Yellow", "Orange", "Red", "Black" );
var colornow=0;

function changeBackground(color) {
   document.body.style.background = color;
}

function incrementcolor() {
	if(colornow==8) {
		colornow=0;
	}
	else {
		colornow++;
	}	
}

function loopLi() {
setTimeout(function () {
     changeBackground(colors[colornow]);
	incrementcolor();
	loopLi();
}, 100);
}

loopLi();
console.log("Your server available at /drishti17");