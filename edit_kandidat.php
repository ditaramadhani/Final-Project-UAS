<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_calon WHERE id_calon='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Urut</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_calon" name="id_calon" value="<?php echo $data_cek['id_calon']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NPM Ketua</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="npm_calon" name="npm_calon" value="<?php echo $data_cek['npm_calon']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Ketua</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_calon" name="nama_calon" value="<?php echo $data_cek['nama_calon']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Angkatan Ketua</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="angkatan_calon" name="angkatan_calon" value="<?php echo $data_cek['angkatan_calon']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NPM Wakil</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="npm_wakil" name="npm_wakil" value="<?php echo $data_cek['npm_wakil']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Wakil</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_wakil" name="nama_wakil" value="<?php echo $data_cek['nama_wakil']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Angkatan Wakil</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="angkatan_wakil" name="angkatan_wakil" value="<?php echo $data_cek['angkatan_wakil']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Paslon</label>
				<div class="col-sm-6">
					<input type="file" id="foto_calon" name="foto_calon">
					<p class="help-block">
						<font color="red">*Format file .jpg</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Visi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="visi_calon" name="visi_calon" value="<?php echo $data_cek['visi_calon']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Misi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="misi_calon" name="misi_calon" value="<?php echo $data_cek['misi_calon']; ?>"
					/>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-kandidat" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>


<?php

$sumber = @$_FILES['foto_calon']['tmp_name'];
$target = 'foto/';
$nama_file = @$_FILES['foto_calon']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $foto= $data_cek['foto_calon'];
            if (file_exists("foto/$foto")){
            unlink("foto/$foto");}

        $sql_ubah = "UPDATE tb_calon SET
            npm_calon='".$_POST['npm_calon']."',
            nama_calon='".$_POST['nama_calon']."',
            angkatan_calon='".$_POST['angkatan_calon']."',
            npm_wakil='".$_POST['npm_wakil']."',
            nama_wakil='".$_POST['nama_wakil']."',
            angkatan_wakil='".$_POST['angkatan_wakil']."',
            foto_calon='".$nama_file."',
            visi_calon='".$_POST['visi_calon']."',
           	misi_calon='".$_POST['misi_calon']."'
            WHERE id_calon='".$_POST['id_calon']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
        $sql_ubah = "UPDATE tb_calon SET
            npm_calon='".$_POST['npm_calon']."',
            misi_calon='".$_POST['misi_calon']."'
            WHERE id_calon='".$_POST['id_calon']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-kandidat';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-kandidat';
            }
        })</script>";
    }
}

