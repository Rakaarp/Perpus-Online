<?php

$id_dospem=$_GET['id_dospem'];

$sql = "DELETE FROM dospem WHERE id_dospem='$id_dospem'";
if ($conn->query($sql) === TRUE) {
    header("Location:?page=dospem");
}
$conn->close();
?>