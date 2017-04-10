<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Useother extends CI_Controller
{
    function __construct() {
        parent::__construct();
        // Load user model
        $this->load->model('User');//model for facebook login
    }

    public function index(){
      redirect(user_authentication);
    }

    public function google(){
      $this->load->view('google');
    }

    public function facebook(){
      $this->load->view('facebook');
    }

    public function email(){
      $this->load->view('templates/header');
      $this->load->view('menu2');
      $this->load->view('needemail');
      $this->load->view('templates/footer');
    }
}
