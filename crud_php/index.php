<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "crud_php";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$nama       = "";
$alamat     = "";
$no_hp      = "";
$pesanan    = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from table_pemesanan where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus pesanan";
    }else{
        $error  = "Gagal melakukan menghapus pesanan";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from table_pemesanan where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nama       = $r1['nama'];
    $alamat     = $r1['alamat'];
    $no_hp      = $r1['no_hp'];
    $pesanan    = $r1['pesanan'];

    if ($nama == '') {
        $error = "Pesanan tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $no_hp      = $_POST['no_hp'];
    $pesanan    = $_POST['pesanan'];

    if ($nama && $alamat && $no_hp && $pesanan) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update table_pemesanan set nama = '$nama',alamat = '$alamat',no_hp = '$no_hp',pesanan = '$pesanan' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Pesanan berhasil diubah";
            } else {
                $error  = "Pesanan gagal diubah";
            }
        } else { //untuk insert
            $sql1   = "insert into table_pemesanan(nama,alamat,no_hp,pesanan) values ('$nama','$alamat','$no_hp','$pesanan')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan pesanan baru";
            } else {
                $error      = "Gagal memasukkan pesanan";
            }
        }
    } else {
        $error = "Silakan masukkan semua pesanan";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }
        .card {
            margin-top: 10px;
        }
        .tombol{
            transform: translateX(20em);
        }
    </style>
</head>
<body>
    <div class="mx-auto">
        <h1 class="mt-3"><center>Data Pemesanan Paket Liburan</center></h1>
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                <center>Create / Edit Data</center>
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:3;url=index.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:3;url=index.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pesanan" class="col-sm-2 col-form-label">Pesanan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="pesanan" name="pesanan"  rows="3"><?php echo $pesanan ?></textarea> 
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Pesanan" class="btn btn-primary tombol" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data/ menampilkan table -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                <center>Table Data Pesanan</center>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Pesanan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from table_pemesanan order by id asc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $nama       = $r2['nama'];
                            $alamat     = $r2['alamat'];
                            $no_hp      = $r2['no_hp'];
                            $tanggal    = $r2['tanggal'];
                            $pesanan    = $r2['pesanan'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $alamat ?></td>
                                <td scope="row"><?php echo $no_hp ?></td>
                                <td scope="row"><?php echo $tanggal ?></td>
                                <td scope="row"><?php echo $pesanan ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
