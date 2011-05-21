<?php

class User extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library("Github/Github_Autoloader");
		$this->github_autoloader->register();
		
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view("login");		
	}
	
	public function login()
	{
		$github = new Github_Client();
		$username = $this->input->post('username');
		$password = $this->input->post('password');		
		$t = $github->authenticate($username, $password, Github_Client::AUTH_HTTP_PASSWORD);
		print_r($t);

		$user = $github->getUserApi()->show($username);

		//checking if authenticated.
		if(isset($user['private_gist_count']))
			redirect('/user/getgist/' . $username);
		else redirect('/user/');
	}
	
	public function logout()
	{
		$github->deAuthenticate();
	}
	
	public function getgist($username)
	{
		$ch = curl_init("http://gist.github.com/api/v1/json/gists/" . $username);
		
		//curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$gists = curl_exec($ch);
		
		$gists_array = json_decode($gists, true);
		
		foreach($gists_array as $gist_list)
		{
			$data = array('list'=>$gist_list);
			$this->load->view('gitblog', $data);
		}
	}
}