<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No. Urut</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="id_calon" name="id_calon" placeholder="Masukkan Nomor Urut..." required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NPM Ketua</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="npm_calon" name="npm_calon" placeholder="Masukkan NPM Ketua...">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Ketua</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_calon" name="nama_calon" placeholder="Masukkan Nama Ketua...">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Angkatan Ketua</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="angkatan_calon" name="angkatan_calon" placeholder="Masukkan Angkatan Ketua...">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NPM Wakil</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="npm_wakil" name="npm_wakil" placeholder="Masukkan NPM Wakil...">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Wakil</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_wakil" name="nama_wakil" placeholder="Masukkan Nama Wakil...">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Angkatan Wakil</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="angkatan_wakil" name="angkatan_wakil" placeholder="Masukkan Angkatan Wakil...">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Paslon</label>
				<div class="col-sm-6">
					<input type="file" id="foto_calon" name="foto_calon">
					<p class="help-block">
						<font color="red">"Format file Jpg"</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Visi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="visi_calon" name="visi_calon" placeholder="Masukkan Visi...">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Misi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="misi_calon" name="misi_calon" placeholder="Masukkan Misi...">
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-kandidat" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    $sumber = @$_FILES['foto_calon']['tmp_name'];
    $target = 'foto/';
    $nama_file = @$_FILES['foto_calon']['name'];
    $pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['Simpan'])){
           

		if(!empty($sumber)){
        $sql_simpan = "INSERT INTO tb_calon (id_calon, npm_calon, nama_calon, angkatan_calon, npm_wakil, nama_wakil, angkatan_wakil, foto_calon, visi_calon, misi_calon) VALUES (
        '".$_POST['id_calon']."',
        '".$_POST['npm_calon']."',
        '".$_POST['nama_calon']."',
        '".$_POST['angkatan_calon']."',
        '".$_POST['npm_wakil']."',
        '".$_POST['nama_wakil']."',
        '".$_POST['angkatan_wakil']."',
        '".$nama_file."',
        '".$_POST['visi_calon']."',
        '".$_POST['misi_calon']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-kandidat';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-kandidat';
          }
      })</script>";
	}
}elseif(empty($sumber)){
	echo "<script>
	Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?page=add-kandidat';
		}
	})</script>";
  }
}   
