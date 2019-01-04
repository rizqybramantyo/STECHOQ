<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
		
	function index()
	{
		if(getRole()!="manajemen")
		{
			redirect('login');
		}
		$this->load->model('manajemen/employeemodel','sm');
		$data['is_data']=$this->sm->getemployee();
		$this->load->view('manajemen/employeeview',$data);
	}
}