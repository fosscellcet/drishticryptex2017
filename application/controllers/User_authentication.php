<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_authentication extends CI_Controller
{
    function __construct() {
        parent::__construct();
        // Load user model
        $this->load->model('User');//model for facebook login
    }

    public function logout() {
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        redirect('/user_authentication');
    }

    public function index(){

        $data['model_obj'] = $this->User;

        // Include the facebook api php libraries
        include_once APPPATH."libraries/facebook-api-php-codexworld/facebook.php";

        // Facebook API Configuration
        $appId = '620431361499357';
        $appSecret = '5bbfb9f891d986faa3b51d9cab979fab';
        $redirectUrl = base_url() . 'user_authentication/';
        $fbPermissions = 'email';

        //Call Facebook API
        $facebook = new Facebook(array(
          'appId'  => $appId,
          'secret' => $appSecret

        ));

        $fbuser = $facebook->getUser();

        // Include the google api php libraries
        include_once APPPATH."libraries/google-api-php-client/src/Google_Client.php";
        include_once APPPATH."libraries/google-api-php-client/src/contrib/Google_Oauth2Service.php";

        // Google Project API Credentials
        $clientId = '385620686697-05l5ctjlqks4dbreq5v99dtndh6iqpcb.apps.googleusercontent.com';
        $clientSecret = '5G4NNZnIdWGTdH_rrgZBnYtN';
        $redirectUrl = base_url() . 'user_authentication';

        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to cryptex.drishticet.org');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if ($fbuser) {
            $userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
            if(is_null($userData['email']))
            {
              redirect(emailrequired);
            }
            else {
            $checkEmailExist = $this->User->checkEmailExist($userData['email']);
            if($checkEmailExist == '1g')
            {
              //logout();
              redirect(usegoogle);
            } else{

              // Insert or update user data
              $userID = $this->User->checkUser($userData);
              $userData['id'] = $userID;
              if(!empty($userID)){
                $data['level'] = $this->User->returnLevel($userID);
                $data['levelcheckintime'] = $this->User->returnLevelCheckInTime($userID);
                $data['collegename'] = $this->User->returnCollegeName($userID);
                $data['mobilenumber'] = $this->User->returnMobileNumber($userID);
              }
              if(!empty($userID)){
                  $data['userData'] = $userData;
                  $this->session->set_userdata('userData',$userData);
              } else {
                 $data['userData'] = array();
              }

            } }
        } else {

                  if (isset($_REQUEST['code'])) {
                      $gClient->authenticate();
                      $this->session->set_userdata('token', $gClient->getAccessToken());
                      redirect($redirectUrl);
                  }

                  $token = $this->session->userdata('token');
                  if (!empty($token)) {
                      $gClient->setAccessToken($token);
                      $userProfile = $google_oauthV2->userinfo->get();
                      // Preparing data for session insertion
                      $userData['oauth_provider'] = 'google';
                      $userData['oauth_uid'] = $userProfile['id'];
                      $userData['first_name'] = $userProfile['given_name'];
                      $userData['last_name'] = $userProfile['family_name'];
                      $userData['email'] = $userProfile['email'];
                      $userData['profile_url'] = $userProfile['link'];
                      $checkEmailExist = $this->User->checkEmailExist($userData['email']);
                      if($checkEmailExist == '1f')
                      {
                        //logout();
                        redirect(usefacebook);
                      } else{
                      // Insert or update user data
                      $userID = $this->User->checkUser($userData);
                      $userData['id'] = $userID;
                      //get level current level information -- start
                      if(!empty($userID)){
                        $data['level'] = $this->User->returnLevel($userID);
                        $data['levelcheckintime'] = $this->User->returnLevelCheckInTime($userID);
                        $data['collegename'] = $this->User->returnCollegeName($userID);
                        $data['mobilenumber'] = $this->User->returnMobileNumber($userID);
                      }
                      //get level current level information -- end
                      $this->session->set_userdata('userData',$userData);
                    }
                  }

                  if ($gClient->getAccessToken()) {
                      $userProfile = $google_oauthV2->userinfo->get();
                      // Preparing data for database insertion
                      $userData['oauth_provider'] = 'google';
                      $userData['oauth_uid'] = $userProfile['id'];
                      $userData['first_name'] = $userProfile['given_name'];
                      $userData['last_name'] = $userProfile['family_name'];
                      $userData['email'] = $userProfile['email'];
                      $userData['profile_url'] = $userProfile['link'];
                      // Insert or update user data
                      $userID = $this->User->checkUser($userData);
                      //get level current level information -- start
                      if(!empty($userID)){
                        $data['level'] = $this->User->returnLevel($userID);
                        $data['levelcheckintime'] = $this->User->returnLevelCheckInTime($userID);
                        $data['collegename'] = $this->User->returnCollegeName($userID);
                        $data['mobilenumber'] = $this->User->returnMobileNumber($userID);
                      }
                      //get level current level information -- end
                      if(!empty($userID)){
                          $data['userData'] = $userData;
                          $this->session->set_userdata('userData',$userData);
                      } else {
                         $data['userData'] = array();
                      }
                  } else {
                      $data['authUrlg'] = $gClient->createAuthUrl();
                  }

            $fbuser = '';
            $data['authUrlf'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
        }
        $this->load->view('templates/header');
        $this->load->view('menu2');
        $this->load->view('user_authentication/index',$data);
        $this->load->view('templates/footer');
    }
}
