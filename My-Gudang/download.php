<head>
    <style>
        tr th {
            background-color: #8fbaf3;
            color: #fff;
            border: 1px solid #ddd;
        }
        tr td {
            border: 1px solid #ddd;
        }
    </style>
</head>
<?php
include "koneksi.php";
$output = '';
if (isset($_POST["export_excel"])) {
    $sql = "SELECT * FROM barang ORDER BY No_Item ASC";
    $result = mysqli_query($koneksi, $sql);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <table class ="table-download" style="border-collapse: collapse; width: 100%;">
            <thead>    
                <tr>
                    <th>NO</th>
                    <th>No Item</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Jenis Barang</th>
                </tr>
            </thead>
        ';

        $no = 1;
        while ($row = mysqli_fetch_array($result)) {
            $output .= "
                <tbody>
                    <tr>
                        <td style='text-align :center;'>$no</td>
                        <td>{$row['No_Item']}</td>
                        <td >{$row['Tanggal']}</td>
                        <td >{$row['Nama_barang']}</td>
                        <td style='text-align :left;'>{$row['Harga_satuan']}</td>
                        <td>{$row['Jenis_barang']}</td>
                    </tr>
                </tbody>
            "; 
            $no++;
        }

        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename= data-barang.xls");
        echo $output;
    }
}
