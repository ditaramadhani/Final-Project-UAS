<?php
$data_id = $_SESSION["ses_id"];

    if(isset($_GET['kode'])){
		$sql_simpan = "INSERT INTO tb_vote (id_calon, id_pemilih) VALUES (
            '".$_GET['kode']."',
            '".$data_id."');";
        $sql_simpan .= "UPDATE tb_pengguna set 
			status='0'
			WHERE id_pengguna='".$data_id."'";
        $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
		mysqli_close($koneksi);
		
		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Selamat, Anda Berhasil Memilih!',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=info';
				}
			})</script>";
			}else{
			echo "<script>
			Swal.fire({title: 'Mohon Maaf, Anda Gagal Memilih!',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=dpt_datakandidat';
				}
			})</script>";
		  }}
		   //selesai proses simpan data
	  