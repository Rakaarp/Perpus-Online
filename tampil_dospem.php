<div class="card">
  <div class="card-header bg-primary text-white border-dark"><strong>INPUT DATA DOSEN PEMBIMBING</strong></div>
  <div class="card-body">
<a class="btn btn-primary mb-2" href="?page=dospem&action=tambah">Tambah</a>
<table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="100px" >No. </th>
        <th width="300px" >Nama Dosen Pembiming</th>
        <th width="200px" ></th>
      </tr>
    </thead>
    <tbody>
			<!-- letakkan proses menampilkan disini -->
    <?php
        $i=1;
        $sql = "SELECT * FROM dospem ORDER BY id_dospem ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
    ?>
     <tr>
        <td><?php echo $i++; ?></td>
	    <td><?php echo $row['nama_dospem']; ?></td>
	    <td align="center" >
            <a class="btn btn-warning" href="?page=dospem&action=update&nama_dospem=<?php echo $row['nama_dospem']; ?>">
            <span class="fas fa-edit"></span>
            </a>
            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=dospem&action=hapus&id_dospem=<?php echo $row['id_dospem']; ?>">
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