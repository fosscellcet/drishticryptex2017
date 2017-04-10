<style>
#field{
	display: inline-block;	
	position: relative;	
	height: 277px;
	width: 874px;	
}
#animation{
	height: 15px;
	width: 200px;
	position: absolute;
	margin-top:103px;
	font-size: 35px;
}
#img{
display: inline-block;
}
#Button{
	margin-left: 600px;
	display: table-cell;
	vertical-align: middle;
}
</style>
<div id="container">
<div  id = "img">
<img src="<?php echo base_url();?>assets/images/cowboyl.jpeg" style="float: left;">
</div>
<div id="field">
<p id="animation"></p>
</div>
<div id="img">
<img src="<?php echo base_url();?>assets/images/cowboyr.jpeg" style="float: right;">
</div>
<div style="display: table;">
<button id="Button" type="button" onclick="myFunction()" style="background-color: white;color: black;">Click Me!</button>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/shooter.js"></script>
</div>