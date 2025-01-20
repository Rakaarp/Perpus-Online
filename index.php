<?php
date_default_timezone_set("Asia/Jakarta");
session_start();
require "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JUDUL</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
</head>
<body>

<nav class="navbar navbar-dark bg-primary border navbar-expand-sm fixed-top">
    <a class="navbar-brand" href="index.php">UNIVERSITAS GUNADARMA</a>
    <ul class="navbar-nav">
        <!-- <li class="nav-item active"><a class="nav-link" href="?page="><i class=""></i> Tentang Kami </a></li> -->
        <li class="nav-item active"><a class="nav-link" href="?page=users"><i class=""></i> Users </a></li>
        <li class="nav-item active"><a class="nav-link" href="?page=dospem"><i class=""></i> Dosen Pembimbing </a></li>
        <li class="nav-item active"><a class="nav-link" href="?page=mahasiswa"><i class=""></i> Mahasiswa </a></li>
        <li class="nav-item active"><a class="nav-link" href="?page=tugasakhir"><i class=""></i> Data Tugas Akhir </a></li>
        <li class="nav-item active"><a class="nav-link" href="?page=login"><i class=""></i> Login </a></li>
    </ul>
</nav>

<div class="container" style="margin-top:100px;margin-bottom:100px">
    <?php

        // pengaturan menu
        $page = isset($_GET['page']) ? $_GET['page'] : "";
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        if ($page==""){
            include "welcome.php";
        }elseif ($page=="dospem"){
            if ($action==""){
                include "tampil_dospem.php";
            }elseif($action=="tambah"){
                include "tambah_dospem.php";
            }elseif($action=="update"){
                include "update_dospem.php";
            }else{
                include "hapus_dospem.php";
            }
        }elseif ($page=="mahasiswa"){
            if ($action==""){
                include "tampil_mahasiswa.php";
            }elseif($action=="tambah"){
                include "tambah_mahasiswa.php";
            }elseif($action=="update"){
                include "update_mahasiswa.php";
            }else{
                include "hapus_mahasiswa.php";
            }
        }elseif ($page=="users"){
            if ($action==""){
                include "tampil_users.php";
            }elseif($action=="tambah"){
                include "tambah_users.php";
            }elseif($action=="update"){
                include "update_users.php";
            }else{
                include "hapus_users.php";
            }
        }elseif ($page=="tugasakhir"){
            if ($action==""){
                include "tampil_tugasakhir.php";
            }elseif($action=="lihat"){
                include "lihat_tugasakhir.php";
            }
        }elseif ($page=="login"){
            if ($action==""){
                include "login.php";
            }
        }else{
          
        }
    ?>
</div>

    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/all.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script>
       $(document).ready(function () {
           $('#myTable').dataTable();
       });
    </script>

    <script src="assets/js/chosen.jquery.min.js"></script>
    <script>
     $(function() {
       $('.chosen').chosen();
     });
    </script>

</body>
</html>