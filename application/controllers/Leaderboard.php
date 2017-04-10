<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Leaderboard extends CI_Controller
{
    function __construct() {
        parent::__construct();
        // Load user model
        $this->load->model('User');
    }

    public function index()
    {
      $data['userdetails'] = $this->User->show_all_for_leaderboard();
      $this->load->view('templates/header');
      $this->load->view('menu2');
      $this->load->view('leaderboard',$data);
      $this->load->view('templates/footer');
    }

    public function test()
    {
      $data['userdetails'] = $this->User->show_all_for_leaderboard();
      $this->load->view('templates/header');
      $this->load->view('menu2');
      $this->load->view('testleaderboard',$data);
      $this->load->view('templates/footer');
    }
  }
