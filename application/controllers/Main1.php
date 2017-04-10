<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct() {
			parent::__construct();
			// Load user model
			$this->load->model('User');//model for facebook login
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
			$answersmatchbox = array(
				0 => 'welcometocryptex',//changed from start -- real one
				1 => 'yettostart2',//changed from yourbrain -- real one
			  2 => 'drishtilogobinarytext',
				/*1 => 'yourbrain',
				2 => 'drishti17',
				3 => 'winteriscoming',
				4 => 'themap',
				5 => 'murder',
				6 => 'fakesubtitles',
				7 => 'whistlersmother',
				8 => 'timedout',
				9 => 'muirfield',
				10 => 'india',
				11 => 'khuljasimsim',
				12 => 'hitconfirmed',
				13 => 'enigma',
				14 => 'idiot',
				15 => 'RoyalSocietyofArts',
				16 => 'kungfupanda',
				17 => 'rajadhani',
				18 =>
			 */
			 //key3 => value3,
		);

		$viewsmatchbox = array(
			0 => 'gameyettostart',//changed from start -- real one
			1 => 'yettostart2',//changed from yourbrain -- real one
		  2 => 'drishtilogobinarytext',
			/*0 => 'level_0',
			1 => 'level_1',
			2 => 'level_2',
			3 => 'level_3',
			4 => 'level_4',
			5 => 'level_5',
			6 => 'level_6',
			7 => 'level_7',
			8 => 'level_8',
			9 => 'level_9',
			10 => 'level_10',
			11 => 'level_11',
			12 => 'level_12',
			13 => 'level_13',
			14 => 'level_14',
			15 => 'level_15',
			16 => 'level_16',
			17 => 'level_17',
		*/
		);

		$totalnumberoflevels = 2;//important -- update here always.

				if($this->session->userdata('userData')){
						if($this->User->returnLevel($this->session->userdata['userData']['id']) == $totalnumberoflevels){
							$this->load->view('templates/header');
							$this->load->view('menu2');
							$this->load->view('/levels/theend');
							$this->load->view('templates/footer');
						}
						else if($answersmatchbox[$this->User->returnLevel($this->session->userdata['userData']['id'])] == $this->uri->segment(1)){
							$this->load->view('templates/header');
							$this->load->view('menu2');
					  	$this->load->view('/levels/'.$viewsmatchbox[$this->User->returnLevel($this->session->userdata['userData']['id'])]);
							$this->load->view('templates/footer');
					}
						else if($answersmatchbox[$this->User->returnLevel($this->session->userdata['userData']['id'])+1] == $this->uri->segment(1)){
							$this->load->view('templates/header');
							$this->load->view('menu2');
							$this->load->view('/levels/'.$viewsmatchbox[$this->User->returnLevel($this->session->userdata['userData']['id'])+1]);
							$this->User->addLevel($this->session->userdata['userData']['id']);
							if($this->User->returnLevel($this->session->userdata['userData']['id']) == $totalnumberoflevels){
								$this->load->view('levels/theend');
							}
							$this->load->view('templates/footer');
				}else{
				    //$this->load->view('main');

						redirect(base_url().$answersmatchbox[$this->User->returnLevel($this->session->userdata['userData']['id'])]);
				}}
				else {
					if($this->uri->segment(1) == "")
					{
						$this->load->view('main');
					}else {
						redirect(base_url());
					}
				}
	}
}
