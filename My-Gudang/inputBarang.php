<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyGudang!</title>
    <link rel="stylesheet" href="css-files/input.css">
    <link rel="icon" href="images/logo-Mygudang-vec.ico" />
    <link rel="stylesheet" href="css-files/scrollbar.css" />
    <link rel="stylesheet" href="css-files/logo.css" />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let waktuSekarang = new Date().toISOString().split('T')[0];
            let waktuOffsetMenit = (new Date()).getTimezoneOffset();
            let waktuOffsetHari = waktuOffsetMenit / (24 * 60); // Do Math!
            let localDate = new Date(new Date().getTime() - waktuOffsetHari * 24 * 60 * 60 * 1000).toISOString().split('T')[0];
            document.getElementById('inputTanggal').max = waktuSekarang;
        });
    </script>
</head>

<body>
    <header id="desktop-nav">
        <!-- Header  -->
        <a class="logo" href="index.html">MyGudang</a>
        <nav>
            <ul class="links">
                <li><a href="index.html">Menu</a></li>
                <li><a href="">Input</a></li>
                <li><a href="dataBarang.php">Table</a></li>
            </ul>
        </nav>
        <a class="any-btn" href="dataBarang.php">Table &#10148;</a>
    </header>
    <!-- End of Header  -->

    <!-- Content  -->
    <form action="" method="post">
        <h3>UPLOAD BARANG</h3>
        <table>
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="No_Item" class="input" placeholder="Unique Number"></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="Tanggal" class="input" id="inputTanggal"></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input placeholder="Nama Barang" type="text" name="Nama_barang" class="input"></td>
            </tr>
            <tr>
                <td>Harga Satuan</td>
                <td><input placeholder="100000" type="text" name="Harga_satuan" class="input"></td>
            </tr>
            <tr>
                <td>Jenis Barang</td>
                <td><input placeholder="Elektronik" type="text" name="Jenis_barang" class="input"></td>
            </tr>
            <tr>
                <div>
                    <td><a class="input" href="dataBarang.php">TABLE</a></td>
                </div>
                <td><input type="submit" value="SIMPAN" name="proses" class="input"></td>
            </tr>
            <tr>
                <td><span id="pesanTersimpan"></span></td>
            </tr>
        </table>

    </form>
    <!-- <div class="floating-button">
        <a class="kembali" href="index.php">Kembali</a>
    </div> -->
    <?php
    include "koneksi.php"; // Menyambungkan ke database

    if (isset($_POST['proses'])) {

        $noItem = isset($_POST['No_Item']) ? $_POST['No_Item'] : '';
        $tanggal = isset($_POST['Tanggal']) ? $_POST['Tanggal'] : '';
        $namaBarang = isset($_POST['Nama_barang']) ? $_POST['Nama_barang'] : '';
        $hargaSatuan = isset($_POST['Harga_satuan']) ? $_POST['Harga_satuan'] : '';
        $jenisBarang = isset($_POST['Jenis_barang']) ? $_POST['Jenis_barang'] : '';

        /* Tempat Pem-Verifikasian No Negatiif Int, No empty String */

        if (
            !is_numeric($noItem) || !is_numeric($hargaSatuan) || $hargaSatuan < 0
            ||  empty($noItem) || empty($tanggal) || empty($namaBarang) || empty($hargaSatuan) 
            || empty($jenisBarang)
        ) {
            if ($noItem == '') {
                echo "<script>
                document.getElementById('pesanTersimpan').style.color = 'red';
                document.getElementById('pesanTersimpan').innerText = 'Invalid Input';
                console.log('Tidak ada Value');
                </script>";
            } else {
                echo "<script> 
                document.getElementById('pesanTersimpan').style.color = 'red';
                document.getElementById('pesanTersimpan').innerText = 'Invalid Input';
                console.log('value : '+$noItem);
                </script>";
            }
        } else {

            // Check kalo ada data yang sama di Database 
            $checkQuery = "SELECT * FROM barang WHERE No_Item='$noItem'";
            $result = mysqli_query($koneksi, $checkQuery);

            if (mysqli_num_rows($result) > 0) {
                echo "<script> 
                document.getElementById('pesanTersimpan').style.color = 'red';
                document.getElementById('pesanTersimpan').innerText = 'Invalid Input';
                </script>";
            } else {
                // jika semua data Terisi maka data akan dimasukkan ke tablenya masing - masing 
                $query = "INSERT INTO barang SET
                No_Item='$noItem',
                Tanggal='$tanggal',
                Nama_Barang='$namaBarang',
                Harga_Satuan='$hargaSatuan',
                Jenis_Barang='$jenisBarang'";

                // dan akan menampilkan pesan Tersimpan 
                if (mysqli_query($koneksi, $query)) {
                    echo "<script>
                    document.getElementById('pesanTersimpan').style.color = 'green';
                    document.getElementById('pesanTersimpan').innerText = 'Tersimpan';
                </script>";
                }
            }
        }
    }
    ?>

    <script src="script.js"></script> <!-- untuk menyambungkan javaScript -->
</body>

</html>