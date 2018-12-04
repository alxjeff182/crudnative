<?php
if(isset($_GET["delete_post"])){
    $id=$_GET["delete_post"];
    mysqli_query($koneksi, "DELETE FROM pegawai WHERE id = '$id' ");
    header("location:index.php");

}
?>