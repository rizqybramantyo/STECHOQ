<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Travel extends CI_Controller {
	
	function index()
	{
		$this->load->model('manajemen/travelmodel');
		$data['is_data']=$this->travelmodel->gettravel();
			$this->load->view('manajemen/travelview',$data);
		
		
	}
	
	function addtravel()
	{
		$this->load->library('secure_library');
		$this->secure_library->filter_post('nama','required');
		/*$this->secure_library->filter_post('stok','required');*/
		$this->secure_library->filter_post('beli','required');
		if($this->secure_library->start_post()==true)
		{
			$this->load->model('manajemen/travelmodel');
			$data=array(
				'nama_travel'=>$this->input->post('nama'),
				'id_kategori_travel'=>$this->input->post('kategori'),
				'id_satuan_travel'=>$this->input->post('satuan'),
				/*'stok_awal'=>$this->input->post('stok'),
				'stok_akhir'=>$this->input->post('stok'),*/
				'harga_beli'=>$this->input->post('beli'),
				/*'harga_jual'=>$this->input->post('jual'),*/
				/*'min_order'=>$this->input->post('order'),*/
				);
			if($this->travelmodel->tambah_travel($data)==true)
			{
				$data['isok']="Data sukses ditambahkan";
				$this->load->view('manajemen/addtravelview',$data);
			}else{
				redirect('manajemen/travel/addtravel','refresh');
			}
		}else{
			$this->load->view('manajemen/addtravelview');
		}
	}
	
	function delete()
	{
		$id=$_GET['uid'];
		$this->load->model('manajemen/travelmodel');
		if($this->travelmodel->delete_travel($id)==TRUE)
		{
			redirect('manajemen/travel');
		}else{
			redirect('manajemen/travel');
		}
	}
	
	function updateview()
	{
		$id=$_GET['uid'];
		$this->load->model('manajemen/travelmodel');
		$data['nama']=$this->travelmodel->get_travel_by_id($id,"nama_travel");
		$data['beli']=$this->travelmodel->get_travel_by_id($id,"harga_beli");
/*		$data['jual']=$this->travelmodel->get_travel_by_id($id,"harga_jual");*/
		/*$data['order']=$this->travelmodel->get_travel_by_id($id,"min_order");*/
		$data['id']=$id;
		if(!empty($data['nama']))
		{
			$this->load->view('manajemen/edittravelview',$data);
		}else{
			redirect('manajemen/travel');
		}
	}
	
	function update()
	{
		$id=$_GET['uid'];
		$this->load->model('manajemen/travelmodel');
		$data=array(
				'nama_travel'=>$this->input->post('nama'),
				'id_kategori_travel'=>$this->input->post('kategori'),
				'id_satuan_travel'=>$this->input->post('satuan'),			
				'harga_beli'=>$this->input->post('beli'),
				'harga_jual'=>$this->input->post('jual'),
				'min_order'=>$this->input->post('order'),
			);
		if($this->travelmodel->update_travel($id,$data)==TRUE)
		{
			redirect('manajemen/travel');
		}else{
			redirect("manajemen/travel/updateview?uid=".$id."");
		}
	}
}