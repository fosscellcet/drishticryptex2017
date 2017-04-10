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
				1 => 'yourbrain',
				2 => 'drishti17',
				3 => 'winteriscoming',
				4 => 'themap',
				5 => 'love',
				6 => 'murder',
				7 => 'fakesubtitles',
				8 => 'whistlersmother',
				9 => 'timedout',
				10 => 'muirfield',
				11 => 'india',
				12 => 'khuljasimsim',
				13 => 'hitconfirmed',
				14 => 'enigma',
				15 => 'idiot',
				16 => 'RoyalSocietyofArts',
				17 => 'kungfupanda',
				18 => 'rajdhani',
				19 => 'frederickrussellburnham',
				20 => 'bushfires',
				21 => 'prime',
				22 => 'vilhjalmureinarsson',
				23 => 'goandfindher',
				24 => 'sparta',
				25 => '142108',
				26 => 'alansbombe'
			 //key3 => value3,
		);

		$viewsmatchbox = array(
			//0 => 'gameyettostart',//changed from start -- real one						
			0 => 'level_0',
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
			18 => 'level_18',
			19 => 'level_19',
			20 => 'level_20',
			21 => 'level_21',
			22 => 'level_22',
			23 => 'stegan',
			24 => 'level_penlast',
			25 => 'level_last',
			26 => 'theend'
		);

		$totalnumberoflevels = 26;//important -- update here always.

		$json = file_get_contents('https://cryptex.drishticet.org/timersetting.php');
		//var_dump(json_decode($json, true));
		$obj = json_decode($json);
		//if else ladder -- start
		if (date("Y-m-d H:i:s") < $obj->starttime)
		{
			if($this->session->userdata('userData')){
				if($this->uri->segment(1) == "welcometocryptex")
				{
					$this->load->view('templates/header');
					$this->load->view('menu2');
					$this->load->view('levels/gameyettostart');
					$this->load->view('templates/footer');
				}else {
					redirect(base_url().welcometocryptex);
				}
			}
			else {
				if($this->uri->segment(1) == "")
				{
					$this->load->view('main');
				}else {
					redirect(base_url());
				}
			}
		}
		else if(date("Y-m-d H:i:s")>=$obj->starttime&&date("Y-m-d H:i:s")<=$obj->endtime)
		{
			//if in game state -- start
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
			//if in game state -- end
		}
		else {
		if($this->session->userdata('userData')){
			if($this->uri->segment(1) == "theend")
			{
				$this->load->view('templates/header');
				$this->load->view('menu2');
				$this->load->view('endofgame');
				$this->load->view('templates/footer');
			}else {
				redirect(base_url().theend);
			}
		}
		else {
			if($this->uri->segment(1) == "")
			{
				$this->load->view('main');
			}else {
				redirect(base_url());
			}
		}
		}
		//if else ladder -- end
		//$arr = array('setting' => $setting, 'time' => $time);
		//echo json_encode($arr);
	}
}
