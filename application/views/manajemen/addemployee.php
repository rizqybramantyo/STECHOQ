<?php
get_header();
?>
<script type="text/javascript" src="<?=base_url();?>assets/themes/js/jquery-ui.js"></script>
<link rel="stylesheet" href="<?=base_url();?>assets/themes/css/jquery-autocomplete.css">
<script>
$(function() {
$("#datepicker2").datepicker({        
		 dateFormat: "yy-mm-dd",
		 showAnim:"slide", 
    });
});

</script>
<h1>Tambah employee</h1>

<?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>
<?php
if(!empty($isok))
{
	echo '<div class="alert alert-success">'.$isok.'</div>';
}

$att=array(
	'class'=>'form-horizontal',
	'role'=>'form',
	);
echo form_open('',$att);
?>
<div class="control-group">
<label class="control-label" for="inputEmail">Nama</label>
<div class="controls">
<input type="text" id="inputEmail" name="nama" placeholder="Nama karyawan" data-validation="length" data-validation-length="min3">
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputEmail">Alamat</label>
<div class="controls">
<input type="text" id="inputEmail" name="alamat" placeholder="Alamat Karyawan" data-validation="length" data-validation-length="min3">
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputEmail">Tanggal Lahir</label>
<div class="controls">
<input type="text"  id="datepicker2" name="tanggal" placeholder="Tanggal" title="Klik dan pilih Tanggal">
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputEmail">Nomor</label>
<div class="controls">
<input type="text" id="inputEmail" name="nomor" placeholder="ID Karyawan" data-validation="length" data-validation-length="min3">
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputEmail">Jenis Kelamin</label>
<div class="controls">
<input type="radio" name="jk" id="radmale" value="male"> Male
<input type="radio" name="jk" id="radfemale" value="female"> Female
</div>
</div>
<div class="control-group">
<div class="controls">
<button type="submit" class="btn btn-success">Simpan</button>
</div>
</div>
</form>
<?php
get_footer();
?>