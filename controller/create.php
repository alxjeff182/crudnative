<?php
if(isset($_POST["submit"]) && isset($_FILES["foto"])){
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
      ?>
        <script language="JavaScript">
          alert('"Maaf, ukuran maksimal foto 1mb untuk diupload.');
        document.location='index.php?create_post';
        </script>
      <?php 
}
  elseif(move_uploaded_file($tmp_name, $path)){
  mysqli_query($koneksi,"INSERT INTO pegawai 
                          VALUES('','$nama','$email','$kontak','$foto')");
  header("location:index.php?create_post");
  }else{ echo "Maaf, foto gagal untuk diupload."; 
	   }
} 
?>
<form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter Your Name">
  </div>
  <div class="form-group">
    <label for="nama">Email</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email">
  </div>
  <div class="form-group">
    <label for="kontak">Phone</label>
    <input type="text" name="kontak" class="form-control" id="kontak" placeholder="Enter Your Phone Number">
  </div>
  <input type="file" name="foto">
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<hr>