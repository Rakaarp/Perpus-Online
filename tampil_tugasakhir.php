<?php
// Your database connection establishment and $conn assignment

if (isset($_POST['proses'])) {
    $selectedYear = $_POST['tahun'];

    $sql = "SELECT mahasiswa.npm, mahasiswa.cover, mahasiswa.nama_siswa, dospem.nama_dospem, mahasiswa.judul, mahasiswa.tahun 
        FROM mahasiswa
        INNER JOIN dospem ON dospem.id_dospem = mahasiswa.id_dospem
        WHERE mahasiswa.tahun = '$selectedYear'
        ORDER BY nama_siswa ASC";

    $result = $conn->query($sql);
} else {
    $result = null; // Assigning null so that initially, no data is displayed
}
?>

<!-- Your HTML -->
<html>
<head>
    <!-- Include necessary CSS/JS files -->
</head>
<body>

<div class="card">
    <div class="card-header bg-primary text-white border-dark">
        <strong>Data TUGAS AKHIR MAHASISWA</strong>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Tahun</label>
                <select class="form-control chosen" data-placeholder="Pilih Tahun" name="tahun">
                    <?php
                    for ($x = date("Y"); $x >= 2017; $x--) {
                        ?>
                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <input class="btn btn-primary mb-2" type="submit" name="proses" value="Proses">
        </form>

        <table class="table table-bordered" id="myTable">
            <thead>
            <tr>
                <th width="50px">NPM</th>
                <th width="50px">cover</th>
                <th width="50px">Nama Mahasiswa</th>
                <th width="50px">Nama Dospem</th>
                <th width="50px">Judul</th>
                <th width="50px">Tahun</th>
                <th width="50px"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['npm']; ?></td>
                        <td>
                            <img src="cover/<?php echo $row['cover'] ?>" width="100">
                        </td>
                        <td><?php echo $row['nama_siswa']; ?></td>
                        <td><?php echo $row['nama_dospem']; ?></td>
                        <td><?php echo $row['judul']; ?></td>
                        <td><?php echo $row['tahun']; ?></td>
                        <td align="center">
                            <a class="btn btn-warning"
                               href="?page=mahasiswa&action=update&npm=<?php echo $row['npm']; ?>">
                                <span class="fas fa-edit"></span>
                            </a>
                            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger"
                               href="?page=mahasiswa&action=hapus&npm=<?php echo $row['npm']; ?>">
                                <span class="fas fa-times"></span>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<p>No data available for the selected year.</p>";
            }
            $conn->close();
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
