<!-- letakkan proses tambah data disini -->
<?php

if(isset($_POST['simpan'])){

    $sql_max = "SELECT MAX(id_dospem) AS max_id FROM dospem";
    $result_max = $conn->query($sql_max);
    $row = $result_max->fetch_assoc();
    $max_id = $row['max_id'];

// Meningkatkan nilai $max_id
    $id_dospem = $max_id + 1;
    //ambil data dari inputan
    $nama_dospem=$_POST['nama_dospem'];
	
    // validasi
    $sql = "SELECT*FROM dospem WHERE nama_dospem='$nama_dospem'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Nama Dosen Pembimbing Sudah Ada!</strong>
            </div>
        <?php
    }else{
	//proses simpan
        $sql = "INSERT INTO dospem (id_dospem, nama_dospem) VALUES ('$id_dospem', '$nama_dospem')";
        if ($conn->query($sql) === TRUE) {
            header("Location:?page=dospem");
        }
    }
}
?>


<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>INPUT DATA DOSEN PEMBIMBING</strong></div>
	                    <div class="card-body">
	                        <div class="form-group">
                                <label for="">Nama Dosen Pembimbing</label>
                                <input type="text" class="form-control" name="nama_dospem" maxlength="" required>
                            </div>
                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                        <a class="btn btn-danger" href="?page=dospem">Batal</a>

                    </div>
                </div>
            </form>
        </div>
</div>