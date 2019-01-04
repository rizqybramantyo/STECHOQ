<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function bindingcombo($table,$name,$fValue,$fLabel,$class='',$atas='')
{
	$CI=& get_instance();
	$CI->load->library('database_library');
	$CI->database_library->pake_table($table);
	$isdata=$CI->database_library->ambil_data();
	echo '<select name="'.$name.'" class="'.$class.'">';
	echo $atas;
	foreach($isdata as $row)
	{
		$options[] = array(
                 $row->$fValue=>$row->$fLabel,
                );
		echo '<option value="'.$row->$fValue.'">'.$row->$fLabel.'</option>';
	}
	
	echo '</select>';
}

function getdata($table,$field)
{
	$CI=& get_instance();
	$CI->load->library('database_library');
	$CI->database_library->pake_table($table);
	$isdata=$CI->database_library->ambil_data();
	foreach($isdata as $row)
	{
		echo $row->$field;
	}
}

function get_beli($id)
{
	
}
function getInfotravel($kode) 
{ 
	$CI=& get_instance(); 
	$CI->load->library('database_library'); 
	$CI->database_library->pake_table('travel'); 
	$data=$CI->database_library->ambil_satu_data('id_travel',$kode,'nama_travel'); 
return $data; 
}
