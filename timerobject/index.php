<?php
  $json = file_get_contents('https://cryptex.drishticet.org/timersetting.php');
  //var_dump(json_decode($json, true));
  $obj = json_decode($json);
  //if else ladder -- start
  if (date("Y-m-d H:i:s") < $obj->starttime)
  {
    $setting = 0;
    $time = $obj->starttime;
    echo date("Y-m-d H:i:s");
  }
  else if(date("Y-m-d H:i:s")>=$obj->starttime&&date("Y-m-d H:i:s")<=$obj->endtime)
  {
    $setting = 1;
    $time = $obj->endtime;
  }
  else {
    $setting = 2;
  }
  //if else ladder -- end
  $arr = array('setting' => $setting, 'time' => $time);
  echo json_encode($arr);
 ?>
