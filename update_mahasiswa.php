<?php

// Memproses update
if (isset($_POST['update'])) {
   // Get the file extension
$file_extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

// Generate a unique filename (you can modify this logic as needed)
$unique_filename = uniqid() . '_' . time() . '.' . $file_extension;

$lokasifoto = $_FILES['foto']['tmp_name'];

move_uploaded_file($lokasifoto, "cover/$unique_filename");

// Update the query with the new unique filename
$updateQuery = "UPDATE mahasiswa SET npm='{$_POST['npm']}', cover='$unique_filename', nama_siswa='{$_POST['nama_siswa']}', id_dospem='{$_POST['nama_dospem']}', judul='{$_POST['judul']}', tahun='{$_POST['tahun']}' WHERE npm='{$_GET['npm']}'";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: ?page=mahasiswa");
        exit(); // Ensure that code stops executing after the redirect
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Ambil data dosen berdasarkan npm dari URL
$npm = $_GET['npm'];
$sql = "SELECT mahasiswa.npm, mahasiswa.cover, mahasiswa.nama_siswa, dospem.nama_dospem, mahasiswa.judul, mahasiswa.tahun 
         FROM mahasiswa
         INNER JOIN dospem ON dospem.id_dospem = mahasiswa.id_dospem
         WHERE npm='$npm'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- Form update -->
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>UPDATE DATA DOSEN PEMBIMBING</strong></div>
                    <div class="card-body">
                    <div class="form-group">
                                <label for="">NPM</label>
                                <input type="text" class="form-control" name="npm" required>
                            </div>
                            <div class="form-group">
                                <img src="cover/<?php echo $row['cover']; ?>" width="500px" align="center">
                                    </div>    
                                        <div class="form-group">
                                        <label>Ganti Foto</label>
                                        <input type="file" name="foto" class="form-control">
                                    </div>
                            <div class="form-group">
                                <label for="">Nama Mahasiswa</label>
                                <input type="text" class="form-control" name="nama_siswa"  required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Dosen Pembimbing</label>
                                <select class="form-control chosen" data-placeholder="Pilih Nama Dosen Pembimbing" name="nama_dospem">
                                    <option value=""></option>
                                        <?php
                                            $sql = "SELECT * FROM dospem ORDER BY nama_dospem ASC";
                                            $result = $conn->query($sql);
                                            while($row = $result->fetch_assoc()) {
                                        ?>
                                    <option value="<?php echo $row['id_dospem']; ?>"><?php echo $row['nama_dospem']; ?></option>
                                        <?php
                                            }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" class="form-control" name="judul"  required>
                            </div>
                            <div class="form-group">
                                <label for="">Tahun</label>
                                <select class="form-control chosen" data-placeholder="Pilih Tahun" name="tahun">
                                    <?php 
                                        for($x=date("Y"); $x>=2017;$x--){
                                    ?>
                                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        <input class="btn btn-primary" type="submit" name="update" value="Update">
                        <a class="btn btn-danger" href="?page=dospem">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
