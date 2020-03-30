<?php
include '../koneksi.php';

$sql = "SELECT*FROM peminjaman INNER JOIN anggota
		ON peminjaman.id_anggota = anggota.id_anggota
		INNER JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas
		INNER JOIN detail_pinjam  ON peminjaman.id_pinjam = detail_pinjam.id_pinjam
		ORDER BY peminjaman.tgl_pinjam";

		$res = mysqli_query($koneksi, $sql)

         $pinjam = array();

        while ($data = mysqli_fetch_assoc($res)) {
	    $pinjam[] = $data;
}


include '../aset/header1.php';
?>

<div class="container">
	<div class="row mt-4">
		<div class="col-md">
			
		</div>
	</div>
</div>
<div class="card">
  <div class="card-header">
  	<h2 class="card-title"> <i class="fas fa-edit"></i> Data Peminjaman</h2>
  </div>
  <div class="card-body">
  	<center><a href="form-pinjam.php"><i class="far fa-calendar-plus"></i>Tambah Data</a></center>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Peminjam</th>
      <th scope="col">Tanggal Pinjam</th>
      <th scope="col">Tanggal Jatuh Tempo</th>
      <th scope="col">Petugas</th>
      <th scope="col">Status </th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    	$no = 1;
    	foreach ($pinjam as $p ) { ?>
    		
    		<tr>
    			<th scope="row"><?= $no ?></th>
    			<td><?= $p['nama'] ?></td>
    			<td><?= date('d F Y', strtotime($p['tgl_pinjam'])) ?></td>
    			<td><?= date('d F Y', strtotime($p['tgl_jatuh_tempo'])) ?></td>
    			<td><?= $p['nama_petugas'] ?></td>
    			<td>
    				<?php
    					if($p['status'] == "dipinjam")
    					{
    						echo '<h5><span class="badge badge-info">Dipinjam</span></h5>';
    					}
    					else
    					{
    						echo '<h5><span class="badge badge-secondary">Kembali</span></h5>';
    					}
    				?>
    			</td>
    			<td>
				<a href="detail.php?id_pinjam=<?= $p['id_pinjam'] ?>&nama=<?= $p['nama'] ?>" class="badge badge-success">Detail</a>
    				<a href="form-edit.php?id_pinjam=<?= $p['id_pinjam']?>" class="badge badge-warning">Edit</a>
					<a href="hapus.php?id_pinjam=<?= $p['id_pinjam'] ?>" class="badge badge-danger">Hapus</a>
    			</td>
    		</tr>
    <?php
    	$no++;
    }
    ?>
  </tbody>
</table>
  </div>
</div>
<?php
include '../aset/footer1.php';
?>