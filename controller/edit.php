<?php
$id = $_GET["edit_post"];
$edit = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id = '$id'");
$row_edit = mysqli_fetch_array($edit);
$query = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY id DESC");

if(isset($_POST["update"]) && isset($_FILES["foto"])){
    $nama=$_POST["nama"];
    $email=$_POST["email"];
    $kontak=$_POST["kontak"];

    $foto      = $_FILES["foto"]["name"];
    $tmp_name  = $_FILES["foto"]["tmp_name"];
    $tipe = $_FILES['foto']['type'];
    $ukuran = $_FILES['foto']['size'];
    $MAX_FILE_SIZE = 1000000;
    $path      = "controller/upload/".$foto;
  
  if($ukuran > $MAX_FILE_SIZE) {
        mysqli_query($koneksi,"UPDATE pegawai SET id = '$id', nama = '$nama', email = '$email', kontak = '$kontak' WHERE id = '$id'");
      ?>
        <script language="JavaScript">
          alert('"Maaf, ukuran maksimal foto 1mb untuk diupload.');
        document.location='index.php?edit_post';
        </script>
      <?php 
}
  elseif($foto=="" || empty($foto)){
        mysqli_query($koneksi,"UPDATE pegawai SET id = '$id', nama = '$nama', email = '$email', kontak = '$kontak'  WHERE id = '$id'");
        header("location:index.php?edit_post");
	}elseif(move_uploaded_file($tmp_name,$path)){
        mysqli_query($koneksi,"UPDATE pegawai SET id = '$id', nama = '$nama', email = '$email', kontak = '$kontak', foto = '$foto' WHERE id = '$id'");
        header("location:index.php?edit_post");
	}
  else{ echo "Maaf, foto gagal untuk diupload."; 
     }
}
?>
<form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row_edit["nama"]?>">
  </div>
  <div class="form-group">
    <label for="nama">Email</label>
    <input type="email" name="email" class="form-control" id="email" value="<?php echo $row_edit["email"]?>">
  </div>
  <div class="form-group">
    <label for="kontak">Phone</label>
    <input type="text" name="kontak" class="form-control" id="kontak" value="<?php echo $row_edit["kontak"]?>">
  </div>
  <?php if($row_edit["foto"]==""){ 
								echo "<p><img src='images/no-image.png' width='88' /></p>";}else {?>
                                <p><img src="controller/upload/<?php echo $row_edit["foto"]?>" width="88" /></p>
                                <?php } ?>
  <input type="file" name="foto">
  <button type="submit" name="update" class="btn btn-primary">Submit</button>
</form>
<hr>