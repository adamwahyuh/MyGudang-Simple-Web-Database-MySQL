<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyGudang!</title>
    <link rel="icon" href="images/logo-Mygudang-vec.ico" />
    <link rel="stylesheet" href="css-files/input-barang.css">
    <link rel="stylesheet" href="css-files/logo.css" />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //let waktuSekarang = new Date().toISOString().split('T')[0];
            let waktuOffsetMenit = (new Date()).getTimezoneOffset();
            let waktuOffsetHari = waktuOffsetMenit / (24 * 60);
            let localDate = new Date(new Date().getTime() - waktuOffsetHari * 24 * 60 * 60 * 1000).toISOString().split('T')[0];
            document.getElementById('inputTanggal').max = localDate;
        });
    </script>
</head>

<body>
    <header id="desktop-nav">
        <a class="logo" href="index.html">MyGudang</a>
        <nav>
            <ul class="links">
                <li><a href="index.html">Menu</a></li>
                <li><a href="">Input</a></li>
                <li><a href="dataBarang.php">Table</a></li>
            </ul>
        </nav>
        <a class="any-btn" href="inputBarang.php">INPUT &#10148;</a>
    </header>
    <?php
    include "koneksi.php";

    if (isset($_POST['proses'])) {
      
        $tanggal = isset($_POST['Tanggal']) ? $_POST['Tanggal'] : '';
        $namaBarang = isset($_POST['Nama_barang']) ? $_POST['Nama_barang'] : '';
        $hargaSatuan = isset($_POST['Harga_satuan']) ? $_POST['Harga_satuan'] : '';
        $jenisBarang = isset($_POST['Jenis_barang']) ? $_POST['Jenis_barang'] : '';

        if (
            !is_numeric($hargaSatuan) || $hargaSatuan < 0 || empty($tanggal) || empty($namaBarang) ||
            empty($hargaSatuan) || empty($jenisBarang)
        ) 
        {
        } else {
            // Kalo tidak ada empty sring update barang  
            mysqli_query($koneksi, "UPDATE barang SET
            Tanggal='$tanggal',
            Nama_Barang='$namaBarang',
            Harga_Satuan='$hargaSatuan',
            Jenis_Barang='$jenisBarang'
            WHERE No_Item='{$_GET['kode']}'");
            echo "<meta http-equiv=refresh content=0.5;URL='dataBarang.php'>";
        }
    }

    // mengambil data dari kode yang di tunjuk oleh user 
    $sql = mysqli_query($koneksi, "SELECT * FROM barang WHERE No_Item='$_GET[kode]'");
    $data = mysqli_fetch_array($sql);
    ?>


    <form action="" method="post">
        <h3>EDIT BARANG</h3>
        <table>
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="No_Item" class="input" placeholder="Unique Number" value="<?php echo $data['No_Item']; ?>"></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="Tanggal" class="input" id="inputTanggal" value="<?php echo $data['Tanggal']; ?>"></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input placeholder="Nama Barang" type="text" name="Nama_barang" class="input" value="<?php echo $data['Nama_barang']; ?>"></td>
            </tr>
            <tr>
                <td>Harga Satuan</td>
                <td><input placeholder="100000" type="text" name="Harga_satuan" class="input" value="<?php echo $data['Harga_satuan']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Barang</td>
                <td><input placeholder="Elektronik" type="text" name="Jenis_barang" class="input" value="<?php echo $data['Jenis_barang']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="SIMPAN" name="proses" class="input"></td>
            </tr>
        </table>
    </form>

    <script src="script.js"></script>
</body>

</html>
