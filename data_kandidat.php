<?php

	$data_id = $_SESSION["ses_id"];

	$sql = $koneksi->query("select * from tb_pengguna where id_pengguna=$data_id");
	while ($data= $sql->fetch_assoc()) {

	$status=$data['status'];

}
?>

<?php if($status==1){ ?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-file"></i> Surat Suara</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No Urut</th>
						<th>
							<center>Kandidat</center>
						</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$sql = $koneksi->query("select * from tb_calon");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td>
							<h3>
								<?php echo $data['id_calon']; ?>
							</h3>
						</td>
						<td align="center">
							<img src="foto/<?php echo $data['foto_calon']; ?>" width="230px" />
							<br>
							<h2>
								<?php echo $data['nama_calon']; ?> <br>	
								<?php echo $data['nama_wakil']; ?>
							</h2>
							<br>
							<a href="?page=view-kandidat&kode=<?php echo $data['id_calon']; ?>" class="btn btn-success">
								<i class="fa fa-file"></i> Detail
							</a>
							<a href="?page=dpt-pilihkandidat&kode=<?php echo $data['id_calon']; ?>" class="btn btn-primary">
								<i class="fa fa-edit"></i> Pilih
							</a>
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

	<!-- /.card-body -->
	<?php }elseif ($status==0) { ?>

	<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4>
			<i class="icon fas fa-info"></i>Info</h4>
		<h3>Terima Kasih! Anda Sudah Menggunakan Hak Suara</h3>
	</div>

	<?php }  