<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT tb_pengguna.npm, tb_pengguna.nama_pengguna, tb_pengguna.angkatan from tb_pengguna where jenis = 'PST'");

$html = '<hr><center><h3>Daftar Pemilih Tetap</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No.</th>
<th>NPM</th>
<th>Nama Pemilih</th>
<th>Angkatan</th>
</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
    <td>" . $no . "</td>
    <td>" . $row['nama_pengguna'] . "</td>
    <td>" . $row['npm'] . "</td>
    <td>" . $row['angkatan'] . "</td>

    </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A3', 'landscape');
// Rendering dari HTML ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Daftar Pemilih Tetap.pdf');
