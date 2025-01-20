<?php
// Memproses update
if (isset($_POST['update'])) {
    $nama_dospem = $_POST['nama_dospem'];

    // Ambil nama dosen dari URL
    $nama_dospem_url = $_GET['nama_dospem'];

    // Proses update berdasarkan nama_dospem dari URL
    $sql = "UPDATE dospem SET nama_dospem='$nama_dospem' WHERE nama_dospem='$nama_dospem_url'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=dospem");
    }
}

// Ambil data dosen berdasarkan nama dari URL
$nama_dospem = $_GET['nama_dospem'];
$sql = "SELECT * FROM dospem WHERE nama_dospem='$nama_dospem'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- Form update -->
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>UPDATE DATA DOSEN PEMBIMBING</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_dospem">Nama Dosen Pembimbing</label>
                            <!-- Menampilkan nama dosen yang akan diupdate -->
                            <input type="text" class="form-control" value="<?php echo $row['nama_dospem']; ?>" name="nama_dospem" maxlength="50" required>
                        </div>
                        <input class="btn btn-primary" type="submit" name="update" value="Update">
                        <a class="btn btn-danger" href="?page=dospem">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
