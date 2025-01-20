<?php

$npm=$_GET['npm'];

$sql = "DELETE FROM mahasiswa WHERE npm='$npm'";
if ($conn->query($sql) === TRUE) {
    header("Location:?page=mahasiswa");
}
$conn->close();
?>