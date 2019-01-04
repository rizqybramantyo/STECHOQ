<!--
Author : Aguzrybudy
Created : Selasa, 19-April-2016
Title : Crud Menggunakan Modal Bootsrap
-->
<!doctype html>
<html lang="en">
<head>
<title>STECHOQ</title>
<meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
<meta content="Aguzrybudy" name="author"/>
<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
  <h2>Karyawan</h2>
  <p><a href="#" class="btn btn-primary" data-target="#ModalAdd" data-toggle="modal">Add Data</a></p>      

<table id="mytable" class="table table-bordered">
    <thead>
      <th>No</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Tanggal Lahir</th>
      <th>Jenis Kelamin</th>
      <th>ID Karyawan</th>
      <th>Action</th>
    </thead>
<?php 
  //menampilkan data mysqli
  include "koneksi.php";
  $no = 0;
  $modal=mysql_query("SELECT * FROM modal");
  while($r=mysql_fetch_array($modal)){
  $no++;
       
?>
  <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo  $r['nama']; ?></td>
      <td><?php echo  $r['alamat']; ?></td>
      <td><?php echo  $r['tanggal']; ?></td>
      <td><?php echo  $r['jenis_kelamin']; ?></td>
      <td><?php echo  $r['id_karyawan']; ?></td>
      <td>
         <a href="#" class='open_modal' id='<?php echo  $r['modal_id']; ?>'>Edit</a>
         <a href="#" onclick="confirm_modal('proses_delete.php?&modal_id=<?php echo  $r['modal_id']; ?>');">Delete</a>
      </td>
  </tr>
 

<?php } ?>
</table>
</div>

<!-- Modal Popup untuk Add--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Tambah Data </h4>
        </div>

        <div class="modal-body">
          <form action="proses_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama"  class="form-control" placeholder="Nama" required/>
                </div>

        
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="alamat">Alamat</label>
                   <textarea name="alamat"  class="form-control" placeholder="Alamat" required/></textarea>
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                  <label for="tanggal">Lahir</label>
                  <input type="text" name="tanggal"  class="form-control" placeholder="Tanggal" required/>
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                  <label for="id_karyawan">Nomor</label>
                  <input type="text" name="id_karyawan"  class="form-control" placeholder="ID Karyawan" required/>
                </div>
				<div class="form-group" style="padding-bottom: 20px;">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                 <input type="radio" name="jenis_kelamin" id="radmale" value="Laki-Laki"> Laki-laki
				<input type="radio" name="jenis_kelamin" id="radfemale" value="Perempuan"> Perempuan
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

           

            </div>

           
        </div>
    </div>
</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Hapus ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">YA</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">TIDAK</button>
      </div>
    </div>
  </div>
</div>



<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "modal_edit.php",
    			   type: "GET",
    			   data : {modal_id: m,},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>

<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

</body>
</html>

  



