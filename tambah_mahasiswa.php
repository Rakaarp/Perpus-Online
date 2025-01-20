<!-- letakkan proses tambah data disini -->
<?php
if(isset($_POST['simpan'])) {
    $npm = $_POST['npm'];
    $nama_siswa = $_POST['nama_siswa'];
    $nama_dospem = $_POST['nama_dospem'];
    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];

    $cover = $_FILES['file_cover']['name']; 
$cover_tmp = $_FILES['file_cover']['tmp_name']; 

// Generate unique name using timestamp
$timestamp = time(); // Get current timestamp
$cover_extension = pathinfo($_FILES['file_cover']['name'], PATHINFO_EXTENSION); // Get the file extension
$cover = $timestamp . '.' . $cover_extension; // Concatenate timestamp with the original file extension
$cover_destination = "cover/" . $cover;

// Move the uploaded file to the destination
move_uploaded_file($cover_tmp, $cover_destination); 

    // Perform validation and database operations
    $sql = "SELECT * FROM mahasiswa WHERE tahun='$tahun' AND npm='$npm'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Data already exists, show an alert or handle as needed
        // ...
    } else {
        // Insert data into the database
        $sql = "INSERT INTO mahasiswa (npm, cover, nama_siswa, id_dospem, judul, tahun) VALUES ('$npm', '$cover', '$nama_siswa', '$nama_dospem', '$judul', '$tahun')";

        if ($conn->query($sql) === TRUE) {
            header("Location:?page=mahasiswa");
        }
    }
}
?>



<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>INPUT DATA TUGAS AKHIR</strong></div>
	                    <div class="card-body">
	                        <div class="form-group">
                                <label for="">NPM</label>
                                <input type="text" class="form-control" name="npm" required>
                            </div>
                            <div class="form-group">
                                <label for="">Cover (.jpg / .png only)</label>
                                <input type="file" class="form-control-file" name="file_cover" accept=".jpg, .png">
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
                            <br>
                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                        <a class="btn btn-danger" href="?page=mahasiswa">Batal</a>

                    </div>
                </div>
            </form>
        </div>
</div>