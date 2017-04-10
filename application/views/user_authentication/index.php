<?php
if (!empty($this->session->userdata['userData']['id'])){
$checkvalueadditional = $model_obj->returnCheckValueAdditional($this->session->userdata['userData']['id']);

if($checkvalueadditional == '0'){
  redirect('more_details');
}
}
?>
<body id="singlecolored">
<?php
if(!empty($authUrlf) && !empty($authUrlg)) {
    echo '<div class="container">
    <div id="loginrow" class="row">
      <div class="col-md-6">
        <a href="'.$authUrlf.'">
          <img id="flogin" class="img-responsive" src="'.base_url().'assets/images/flogin.png" alt=""/>
          </a>
      </div>
';
    echo '<div class="col-md-6">
    <a href="'.$authUrlg.'">
      <img id="glogin" class="img-responsive" src="'.base_url().'assets/images/glogin.png" alt=""/>
      </a>
    </div>
    </div>
</div>';
}else if(empty($authUrlf)){

?>
<div class="container">
  <div class="row">
<div class="col-md-12 wrapper">
    <h1>Profile Details </h1>
    <?php
    echo '<div class="welcome_txt"><p>Welcome <b>'.$userData['first_name'].'</b></p></div>';
    echo '<div class="fb_box" style="margin-top:30px;">';
    //echo '<p class="image"><img src="'.$userData['picture_url'].'" alt="" width="300" height="220"/></p>';
    //echo '<p><b>Facebook ID : </b>' . $userData['oauth_uid'].'</p>';
    echo '<p><b>Name : </b>' . $userData['first_name'].' '.$userData['last_name'].'</p>';
    echo '<p><b>Email : </b>' . $userData['email'].'</p>';
    //if(!empty($userData['level'])){
    echo '<p><b>Mobile number : </b>'.$mobilenumber.'</p>';
    echo '<p><b>College name : </b>'.$collegename.'</p>';
    echo '<p><b>Current level : </b>'.$level.'</p>';
  //}
  //if(!empty($userData['levelcheckintime'])){
    echo '<p><b>Current level check in time : </b>'.$levelcheckintime.'</p>';
  //}
    //echo '<p><b>Gender : </b>' . $userData['gender'].'</p>';
    //echo '<p><b>Locale : </b>' . $userData['locale'].'</p>';
    //echo '<p><b>FB Profile Link : </b>' . $userData['profile_url'].'</p>';
    echo '<p><b>Your account is linked with : </b>Facebook</p>';
    echo '<p><b><a href="'.base_url().'user_authentication/logout">Logout with Facebook</a></b></p>';
    echo '</div>';
    ?>
</div>
</div>
</div>
<?php }else if(empty($authUrlg)){
  echo '<div class="container">';
    echo '<div class="row">';
 echo '<div class="col-md-12 wrapper">' ;
   echo '<h1>Profile Details </h1>';
   echo '<div class="welcome_txt">Welcome <b>'.$userData['first_name'].'</b></div>';
   echo '<div class="google_box" style="margin-top:30px;">';
   //echo '<p><b>Google ID : </b>' . $userData['oauth_uid'].'</p>';
   echo '<p><b>Name : </b>' . $userData['first_name'].' '.$userData['last_name'].'</p>';
   echo '<p><b>Email : </b>' . $userData['email'].'</p>';
   echo '<p><b>Mobile number : </b>'.$mobilenumber.'</p>';
   echo '<p><b>College name : </b>'.$collegename.'</p>';
   echo '<p><b>Current level : </b>'.$level.'</p>';
 //}
 //if(!empty($userData['levelcheckintime'])){
   echo '<p><b>Current level check in time : </b>'.$levelcheckintime.'</p>';
   //echo '<p><b>Google+ Link : </b>' . $userData['profile_url'].'</p>';
   echo '<p><b>Your account is linked with : </b>Google</p>';
   echo '<p><b><a href="'.base_url().'user_authentication/logout">Logout with Google</a></b></p>';
   echo '</div>';
 echo '</div>';
 echo '</div>';
 echo '</div>';
 }?>
