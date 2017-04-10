<body onload="javascript:init();">
<script type='text/javascript' src='<?php echo base_url();?>assets/js/midi.js'></script>
<script type="text/javascript">
    var mp1, mp2;

    function init() {
        // Example 1. This will loop 5 times, and has a callback function at the end.
        var callback = function() { document.getElementById('btn1').value = 'play'; }
        mp1 = new MidiPlayer('Saved.mid', 'btn1', true, 5, callback);
        mp1.setDebugDiv('msg');

        // Example 2. This will not loop.
        mp2 = new MidiPlayer('<?php echo base_url();?>assets/audio/midi.mid', 'btn2');
    }

    function doPlay(m, btn) {
        if (btn.value == 'play') {
            m.play();
            btn.value = 'stop';
        }
        else {
            m.stop();
            btn.value = 'play';
        }
    }

    function do_clear() {
	    document.getElementById('msg').innerHTML='';
	    document.getElementById('div_clear').style.display='none';
	}
	function show_clear() {
        document.getElementById('div_clear').style.display='block';
	}
    </script>
<!-- I love you Bob <3 -->
<div class="container">
<div class="row">
<!-- This is for you sweetheart! -->
<div class="col-md-12 wrapper" style="font-size:20px;">
  <img class="img-responsive" src="<?php echo base_url();?>assets/images/mozart.jpg"/><br>
<input style="color:black;" type="button" value="play" id='btn2' onclick="doPlay(mp2, this);"/>
<!-- Play something for me then -->
<!-- I do! -->
<!-- Hey Bob! Do you love me? -->
</div>
</div>
</div>
