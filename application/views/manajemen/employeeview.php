<?php
get_header();
?>
<h1>Manajemen employee</h1>
<div class="alert alert-success">Klik <i class="icon-plus"></i><a href="<?=base_url('manajemen/employee/addemployee');?>"> <strong>di sini</strong> </a>untuk tambah data</div>
<?php

$no=0;
if(!empty($is_data))
{
?>
<table class="table table-hover">
<thead>
<tr>
<td>No</td>	
<td>Nama</td>
<td>Alamat</td>
<td>Tanggal lahir</td>
<td>Jenis Kelamin</td>
<td>ID Karyawan</td>
<td>Aksi</td>
</tr>
</thead>
<tbody>
<?php
	foreach($is_data['results'] as $row)
	{
	$no=$no+1;	

?>
<tr>
<td><?= $row->id_employee;?></td>
<td><?= $row->nama_employee;?></td>
<td><?= $row->alamat_karyawan;?></td>
<td><?= $row->tanggal;?></td>
<td><?= $row->jenis_kelamin;?></td>
<td><?= $row->id_karyawan;?></td>
<td>
<a class="btn btn-small" onclick="window.location='<?=base_url();?>manajemen/employee/updateview?uid=<?=$row->id_employee;?>'" href="javascript:void(0)"><i class="icon-trash"></i> Edit</a>
<a class="btn btn-small" a href='<?=base_url();?>manajemen/employee/delete?uid=<?=$row->id_employee;?>'" href="javascript:void(0)"onclick="return confirm('Anda Yakin Akan Menghapus')"><i class="icon-trash"></i> Hapus</a>
</td>
</tr>
<?php }
?>
</tbody>
</table>
<?php }else{ ?>
<div class="alert alert-error"></div>
<?php } ?>

<?= $is_data['links']; ?>
<?php
get_footer();
?>