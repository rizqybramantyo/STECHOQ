<!--
Author : Aguzrybudy
Created : Selasa, 19-April-2016
Title : Crud Menggunakan Modal Bootsrap
-->
<?php
    include "koneksi.php";
	$modal_id=$_GET['modal_id'];
	$modal=mysql_query("SELECT * FROM modal WHERE modal_id='$modal_id'");
	while($r=mysql_fetch_array($modal)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Karyawan</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="nama">Nama</label>
                    <input type="hidden" name="modal_id"  class="form-control" value="<?php echo $r['modal_id']; ?>" />
     				<input type="text" name="nama"  class="form-control" value="<?php echo $r['nama']; ?>"/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="alamat">Alamat</label>
     				<textarea name="alamat"  class="form-control"><?php echo $r['alamat']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="tanggal">Lahir</label>       
     				<input type="text" name="tanggal"  class="form-control" value="<?php echo $r['tanggal']; ?>" />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="id_karyawan">Nomor</label>       
                    <input type="text" name="id_karyawan"  class="form-control" value="<?php echo $r['id_karyawan']; ?>" />
                </div>
                
                 <div class="form-group" style="padding-bottom: 20px;">
                  <label for="jenis-kelamin">Jenis Kelamin</label>
                  <input type="radio" name="jenis_kelamin" id="radmale" value="laki-laki"> Laki-laki
                <input type="radio" name="jenis_kelamin" id="radfemale" value="perempuan"> Perempuan
                </div>
	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
	                    Confirm
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>

            	</form>

             <?php } ?>

            </div>

           
        </div>
    </div>