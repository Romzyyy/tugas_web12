<?php
include "../koneksi.php";
$sql = mysqli_query($koneksi, "select * from mahasiswa where id='$_GET[kode]'");
$data = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid w-25 mt-5">
        <h1 class="text-center mt-5 mb-5">Ubah Data mahasiswa</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama'];?>">
            </div>
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim" value="<?php echo $data['nim'];?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <input type="text" class="form-control" name="jurusan" value="<?php echo $data['jurusan'];?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Fakultas</label>
                <input type="text" class="form-control" name="fakultas" value="<?php echo $data['fakultas'];?>">
            </div>
            <button type="submit" class="btn btn-primary" name="proses">simpan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
<?php
include "../koneksi.php";

if(isset($_POST['proses'])){
        mysqli_query($koneksi,"update mahasiswa set 
        nama = '$_POST[nama]',
        nim = '$_POST[nim]',
        jurusan = '$_POST[jurusan]',
        fakultas = '$_POST[fakultas]'
        where id = '$_GET[kode]'")or die (mysqli_error($koneksi));
        echo "<p class='width-100 text-center mt-5'>Data telah tersimpan</p>";
        header("location:halaman_admin.php");
}
?>