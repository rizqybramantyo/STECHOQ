<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller {
	
	function index()
	{
		$this->load->model('manajemen/employeemodel','sm');
		$data['is_data']=$this->sm->getemployee();
		$this->load->view('manajemen/employeeview',$data);
		
	}
	
	function addemployee()
	{
		$this->load->library('secure_library');
		$this->secure_library->filter_post('nama','required');
		$this->secure_library->filter_post('alamat','required');
		$this->secure_library->filter_post('tanggal','required');
		$this->secure_library->filter_post('nomor','required');
		$this->secure_library->filter_post('jk','required');
		if($this->secure_library->start_post()==TRUE)
		{
			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$tanggal=$this->input->post('tanggal');
			$nomor=$this->input->post('nomor');
			$jk=$this->input->post('jk');
			$this->load->model('manajemen/employeemodel');
			if($this->employeemodel->add_employee($nama,$alamat,$tanggal,$nomor,$jk)==TRUE)
			{
				$data['isok']="Data sukses ditambahkan";
				$this->load->view('manajemen/addemployee',$data);
			}
		}else{
			$this->load->view('manajemen/addemployee');
		}
	}
	
	function updateview()
	{
		$id=$_GET['uid'];
		$this->load->model('manajemen/employeemodel');
		$data['nama']=$this->employeemodel->get_employee_by_id($id,"nama_employee");
		$data['alamat']=$this->employeemodel->get_employee_by_id($id,"alamat_karyawan");
		$data['tanggal']=$this->employeemodel->get_employee_by_id($id,"tanggal");
		$data['nomor']=$this->employeemodel->get_employee_by_id($id,"id_karyawan");
		$data['jk']=$this->employeemodel->get_employee_by_id($id,"jenis_kelamin");
		$data['id']=$id;
		if(!empty($data['nama']))
		{
			$this->load->view('manajemen/editemployeeview',$data);
		}else{
			redirect('manajemen/employee');
		}
	}
	
	function update()
	{
		$id=$_GET['uid'];
		$this->load->model('manajemen/employeemodel');
		$data=array(
				'nama_employee'=>$this->input->post('nama'),
				'alamat_karyawan'=>$this->input->post('alamat'),
				'tanggal'=>$this->input->post('tanggal'),
				'id_karyawan'=>$this->input->post('nomor'),			
				'jenis_kelamin'=>$this->input->post('jk'),										
			);
		if($this->employeemodel->update_employee($id,$data)==TRUE)
		{
			redirect('manajemen/employee');
		}else{
			redirect("manajemen/employee/updateview?uid=".$id."");
		}
	}
	
	function delete()
	{
		$id=$_GET['uid'];
		$this->load->model('manajemen/employeemodel');
		if($this->employeemodel->delete_employee($id)==TRUE)
		{
			redirect('manajemen/employee');
		}else{
			redirect('manajemen/employee');
		}
	}
}