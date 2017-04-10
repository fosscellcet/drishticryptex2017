<div class="container">
  <div class="row">
<div class="col-md-12 wrapper">
<h3>Leaderboard</h3>
<table style="width:100%">
  <tr>
    <th style="padding-top: 8px;
padding-bottom: 8px;">Rank</th>
<th style="padding-top: 8px;
padding-bottom: 8px;">User ID</th>
<th style="padding-top: 8px;
padding-bottom: 8px;">Name</th>
<th style="padding-top: 8px;
padding-bottom: 8px;">College Name</th>
<th style="padding-top: 8px;
padding-bottom: 8px;">Level</th>
<th style="padding-top: 8px;
padding-bottom: 8px;">Level Check In Time</th>
  </tr>
<?php
$i = 1;
$testusers = array("");
//define testusers here.
foreach($userdetails->result() as $userdetails) {
  if(in_array($userdetails->id,$testusers)){

  }
  else {
    echo '<tr>';
    echo '<td style="padding-top: 5px;
padding-bottom: 5px;">'.$i.'</td>';
    echo '<td style="padding-top: 5px; padding-bottom: 5px;">'.$userdetails->id.'</td>';
    echo '<td style="padding-top: 5px;
padding-bottom: 5px;">'.$userdetails->first_name.' ';
    echo $userdetails->last_name.'</td>';
    echo '<td style="padding-top: 5px;
padding-bottom: 5px;">'.$userdetails->collegename.'</td>';
    echo '<td style="padding-top: 5px;
padding-bottom: 5px;">'.$userdetails->level.'</td>';
    echo '<td style="padding-top: 5px; padding-bottom: 5px;">'.$userdetails->levelcheckintime.'</td>';
    $i = $i + 1;
    echo '</tr>';
  }
}?>
</table>
</div>
</div>
</div>
