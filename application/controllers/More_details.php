<?php defined('BASEPATH') OR exit('No direct script access allowed');
class More_details extends CI_Controller
{
    function __construct() {
        parent::__construct();
        // Load user model
        $this->load->model('User');
    }

public function index(){
    if (!empty($this->session->userdata['userData']['id'])){
      $checkvalueadditional = $this->User->returnCheckValueAdditional($this->session->userdata['userData']['id']);
      //if additional data does not exist
      if($checkvalueadditional == '0')
      {
          $this->load->view('templates/header');
          $this->load->view('menu2');
          $this->load->view('getmoredetails');
          $this->load->view('templates/footer');
      }
      else if($checkvalueadditional == '1')//if additional data does exist
      {
          redirect('user_authentication');
      }
    }
    else {
          redirect('user_authentication');
      }
  }

  public function submit(){
    if (!empty($this->session->userdata['userData']['id'])){
      //if additional data does not exist
      $checkvalueadditional = $this->User->returnCheckValueAdditional($this->session->userdata['userData']['id']);
      if($checkvalueadditional == '0')
      {
          $collegename = $this->input->post("collegename");
          $mobilenumber = $this->input->post("mobilenumber");
          $this->User->addMoreDetails($this->session->userdata['userData']['id'],$collegename,$mobilenumber);
          redirect('user_authentication');
      }
      else if($checkvalueadditional == '1')//if additional data does exist
      {
          redirect('user_authentication');
      }
    }
    else {
          redirect('user_authentication');
      }
  }
}
