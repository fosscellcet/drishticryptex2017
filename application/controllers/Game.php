<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Game extends CI_Controller
{
    function __construct() {
        parent::__construct();
        // Load user model
        $this->load->model('User');
    }

    public function index()
    {
      $this->load->view('templates/header');
      $this->load->view('menu2');
      $this->load->view('game');
      $this->load->view('templates/footer');
    }
  }
