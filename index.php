<?php include('include/header.php')?>
<?php include('include/config.php')?>
<body>
<hr>
<?php 
if(isset($_GET["create_post"])){include "controller/create.php";}
elseif(isset($_GET["edit_post"])){include "controller/edit.php";}
elseif(isset($_GET["delete_post"])){include "controller/delete.php";}
?>
<?php 
$dataPegawai=mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY id ASC");
?>
        <a class="btn btn-primary" href="index.php?create_post">add new</a>
        <table class="table table-dark">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Kontak</th>
            <th scope="col">Foto</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <?php $no=1; ?>
        <?php 
        while($data=mysqli_fetch_array($dataPegawai)){
        ?>
        <tbody>
            <tr>
            <td><?php echo $data["id"]?></td>
            <td><?php echo $data["nama"]?></td>
            <td><?php echo $data["email"]?></td>
            <td><?php echo $data["kontak"]?></td>
            <td><?php echo $data["foto"]?></td>
            <td>
            <a class="btn btn-warning" href="index.php?edit_post=<?php echo $data["id"]?>">edit</a> 
            <a class="btn btn-danger" href="index.php?delete_post=<?php echo $data["id"]?>">delete</a></td>
            </tr>
        </tbody>
        <?php $no++; }?>
        </table>
<hr>
</body>
<?php include('include/footer.php')?>