<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-file"></i> Daftar Pemilih</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>NPM</th>
						<th>Nama Pemilih</th>
						<th>Angkatan</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>

			<?php
              $no = 1;
              $sql = $koneksi->query("select * from tb_pengguna where jenis='PST'");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['npm']; ?>
						</td>
						<td>
							<?php echo $data['nama_pengguna']; ?>
						</td>
						<td>
							<?php echo $data['angkatan']; ?>
						</td>
						<td>
							<?php $stt = $data['status']  ?>
							<?php if($stt == '1'){ ?>
							<span class="badge badge-warning">Belum memilih</span>
							<?php }elseif($stt == '0'){ ?>
							<span class="badge badge-primary">Sudah memilih</span>
						</td>
						<?php } ?>
						</td>
						
					</tr>
					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>

<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<button onclick="location.href='reportpdf.php';" id="reportpdf" type="button" class="btn btn-info">Cetak PDF</button> <br>
	<button onclick="location.href='reportexcel.php';" id="reportexcel" type="button" class="btn btn-info">Cetak Excel</button>
</body>
</html>