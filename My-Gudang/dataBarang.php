<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGudang!</title>
  <link rel="stylesheet" href="css-files/table.css">
  <link rel="icon" href="images/logo-Mygudang-vec.ico" />
  <link rel="stylesheet" href="css-files/scrollbar.css" />
  <link rel="stylesheet" href="css-files/logo.css">
</head>

<body>
  <header id="desktop-nav">
    <a class="logo" href="index.html">MyGudang</a>
    <nav>
      <ul class="links">
        <li><a href="index.html">Menu</a></li>
        <li><a href="inputBarang.php">Input</a></li>
        <li><a href="#table" onclick="">Table</a></li>
      </ul>
    </nav>
    <form method="post" action="download.php">
      <input class="download" type="submit" value="Download (.xls)" name="export_excel">
    </form>
  </header>
  <!-- Batas Header-->
  <table id="table" class="table">
    <!-- Membuat table dan mengambil data dari database untuk ditampilkan  -->
    <thead>
      <tr>
        <th>No</th>
        <th>No Item</th>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Harga Satuan</th>
        <th>Jenis Barang</th>
        <th style="text-align :center;" colspan="2">MODIFIKASI</th>
      </tr>
    </thead>
    <tbody>
    <!-- <div class="floating-button2">
      <p class="pesan-terhapus" id="terhapus"></p>
    </div> -->
    <?php
    include "koneksi.php"; // Untuk menyambungkan ke srver
    $no = 1; // Kasih nomer urut

    // untuk menampilkan data ke Table / mengambil data dari database dan ditampilkan di WEB 
    $ambilData = mysqli_query($koneksi, "SELECT * from barang"); // * = Semua | pilih semua barang dari database namanya barang
    while ($tampilData = mysqli_fetch_array($ambilData)) {
      echo "
            <tr>
                <td>$no</td>
                <td>$tampilData[No_Item]</td>
                <td>$tampilData[Tanggal]</td>
                <td>$tampilData[Nama_barang]</td>
                <td class='Harga-isi'>$tampilData[Harga_satuan]</td>
                <td>$tampilData[Jenis_barang]</td>
                <td class='delete'><a href='?kode=$tampilData[No_Item]'>HAPUS</a></td>
                <td class='edit'><a href='ubah-barang.php?kode=$tampilData[No_Item]'>EDIT</a></td>
            </tr>";
            
      $no++;
    }
    ?>
    </tbody>
    <hr>
  </table>

  <?php
  // Fungsi untuk menghapus Data 
  if (isset($_GET['kode'])) {
    mysqli_query($koneksi, "DELETE from barang where No_Item='$_GET[kode]'");
    echo "<script>
            document.getElementById('terhapus').innerText = 'Data Terhapus';
            </script>";
    echo "<meta http-equiv=refresh content=0.001;URL='dataBarang.php'>";
  }
  ?>
  <!-- button kembali dan button untuk download ke excel -->

  <!-- <div class="floating-button">
    <table>
        <tr>
            <td>
                 <a class="kembali" href="inputBarang.php">&#60;</a> 
            </td>
            <td>
                 <form method="post" action="download.php">
                    <input class="download" type="submit" value="Download (.xls)" name="export_excel">
                </form>
            </td>
        </tr>
    </table>
</div> -->

  <script src="script.js"></script>
</body>

</html>