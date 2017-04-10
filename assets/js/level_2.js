
var width =0;
var elem = document.getElementById("myBar");
var headi=document.getElementById("headi");
function move() {
     
    
	var id = setInterval(frame, 200);
	
    function frame() {
        if (width < 78) {
            width++; 
			if(width%4==0)
		headi.innerHTML="Loading";
	else
		headi.innerHTML+=".";
            elem.style.width = width + '%'; 
            elem.innerHTML = width * 1 + '%';
        }
		

	}
}
function key()
{ if(width<100)
	
	{width++; 
	if(width%4==0)
		headi.innerHTML="Loading";
	else
		headi.innerHTML+=".";
	 elem.style.width = width + '%'; 
      elem.innerHTML = width * 1 + '%';}
else
{headi.innerHTML="Loading complete";
document.getElementById("new1").innerHTML="gnimocsiretniw";}
}