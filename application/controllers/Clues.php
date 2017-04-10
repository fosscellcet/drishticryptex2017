<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Clues extends CI_Controller
{
    function __construct() {
        parent::__construct();
        // Load user model
        $this->load->model('User');
    }

    public function index()
    {
      redirect("https://www.facebook.com/drishticryptex");
    }
  }
