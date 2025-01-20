<div class="card">
  <div class="card-header bg-primary text-white border-dark"><strong>Data TUGAS AKHIR MAHASISWA</strong></div>
  <div class="card-body">
<a class="btn btn-primary mb-2" href="?page=mahasiswa&action=tambah">Tambah</a>
<table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="50px" >NPM</th>
        <th width="50px" >cover</th>
        <th width="50px" >Nama Mahasiswa</th>
        <th width="50px" >Nama Dospem</th>
        <th width="50px" >Judul</th>
        <th width="50px" >Tahun</th>
        <th width="50px" ></th>
      </tr>
    </thead>
    <tbody>
			<!-- letakkan proses menampilkan disini -->
    <?php
         $sql = "SELECT mahasiswa.npm, mahasiswa.cover, mahasiswa.nama_siswa, dospem.nama_dospem, mahasiswa.judul, mahasiswa.tahun 
         FROM mahasiswa
         INNER JOIN dospem ON dospem.id_dospem = mahasiswa.id_dospem ORDER BY nama_siswa ASC ";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
    ?>
     <tr>
     <td><?php echo $row['npm']; ?></td>
     <td>
                <img src="cover/<?php echo $row['cover']?>" width="100">
            </td>
        <td><?php echo $row['nama_siswa']; ?></td>
        <td><?php echo $row['nama_dospem']; ?></td>
        <td><?php echo $row['judul']; ?></td>
        <td><?php echo $row['tahun']; ?></td>
	    <td align="center" >
            <a class="btn btn-warning" href="?page=mahasiswa&action=update&npm=<?php echo $row['npm']; ?>">
            <span class="fas fa-edit"></span>
            </a>
            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=mahasiswa&action=hapus&npm=<?php echo $row['npm']; ?>">
            <span class="fas fa-times"></span>
            </a>
        </td>
     </tr>
 <?php
     }
     $conn->close();
 ?>
   </tbody>
</table>
</div>
</div>