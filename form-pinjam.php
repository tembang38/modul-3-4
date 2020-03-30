<?php
include '../koneksi.php';
include 'fungsi-transaksi.php';

$buku 		= ambilBuku($koneksi);
$anggota 	= ambilAnggota($koneksi);

include '../aset/header1.php';
?>
<div class="container">
	<div class="row mt-4">
		<div class="col md-4">
			<div class="card">
				<div class="card-header">
					<h3>Form Tambah Peminjaman</h3>
				</div>
				<div class="card-body">
					<form action="proses-pinjam.php" method="post">
						<div class="form-group">
							<label for="anggota">Nama Anggota</label>
                    		<select name="id_anggota" class="form-control">
                    			<?php
                    			foreach ($anggota as $a) { 
                    			?>
                    				<option value="<?= $a['id_anggota'] ?>"><?= $a['nama']?></option>
                    			<?php
                    			}
                    			?>
                    		</select>
                		</div>
                		<div class="form-group">
                    		<label for="buku">Judul Buku</label>
                    		<select name="id_buku" class="form-control">
                    			<?php
                    			foreach ($buku as $b) {
                    			?>
                    				<option value="<?= $b['id_buku'] ?>"><?= $b['judul'] ?></option>
                    			<?php
                    			}
                    			?>
                    		</select>
                		</div>
                		<div class="form-group">
                			<label for="datepicker">Tanggal Pinjam</label>
                    		<input type="date" class="form-control" name="tgl_pinjam">
                		</div>
                		<div>
                			<button type="submit" class="btn btn-primary mr-auto" name="btnPinjam">Simpan</button>
                		</div>
                		


					</form>
				</div>
			</div>
		</div>
	</div>
</div>
 
<?php
include '../aset/footer1.php';
?>