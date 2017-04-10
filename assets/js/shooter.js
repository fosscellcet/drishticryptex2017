var chars = Array('.  .  .  .','.  .','...','...  .  ...  .','...  ...  ...','...  .','.  .  ...  .','.  .','.  ...  .','...  ...','.','...  .  .');
var charpos = 0;
function myFunction() {
  var elem = document.getElementById("animation");
  var btn = document.getElementById("Button"); 
  btn.disabled = false;   
  var pos = 0;    
  var id = setInterval(shootl, 5); 
  var newid;  
  function shootl() {
    if (pos == 800-chars[charpos].length) {
      clearInterval(id);
      elem.innerHTML = "";
      charpos++;
      if (charpos == 12) {
			charpos = 0;	
			btn.disabled = false;	
		} 
		else{
			newid = setInterval(shootr, 1);
		}       	
    } else {
    	btn.disabled = true;
      pos++; 
      elem.innerHTML = chars[charpos];
      elem.style.left = pos + 'px'; 
    }
 }
  function shootr(){
	if (pos == 0) {  
      clearInterval(newid);
      elem.innerHTML = "";
      charpos++;
      if (charpos == 12) {
			charpos = 0;      
			btn.disabled = false;
      }
      else{
			id = setInterval(shootl, 1);      
      }
      
    } else {
    	btn.disabled = true;
      pos--; 
      elem.innerHTML = chars[charpos];
      elem.style.left = pos + 'px';
   }
}
}