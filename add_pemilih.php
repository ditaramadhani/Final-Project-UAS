<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">NPM</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="username" name="npm" placeholder="Masukkan NPM...">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Pemilih</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Masukkan Nama Pemilih..." required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Angkatan</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="Masukkan Tahun Angkatan..." required>
        </div>
      </div>

       <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kode Akses</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="kode_akses" name="kode_akses" placeholder="Buat Kode Akses..." required>
        </div>
      </div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pemilih" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_pengguna (npm,nama_pengguna,angkatan,kode_akses,level,status,jenis) VALUES (
        '".$_POST['npm']."',
        '".$_POST['nama_pengguna']."',
        '".$_POST['angkatan']."',
        '".$_POST['kode_akses']."',
        'Pemilih',
        '1',
        'PST')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pemilih';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pemilih';
          }
      })</script>";
    }}
     //selesai proses simpan data
