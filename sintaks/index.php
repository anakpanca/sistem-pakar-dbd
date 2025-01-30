<?php
session_start();
//koneksi database
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- datatables css -->
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <!-- Fnt Awesome css -->
    <link rel="stylesheet" href="assets/css/all.css">
    <!-- Chosen css -->
    <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
    
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Link Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Link Animate On Screen -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
</head>
<body class="bg-light">

    <!-- navbar -->
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark shadow">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>

            <!-- setting hak akses -->
            <?php
            if($_SESSION['role']=="Dokter"){
            ?>

                <li class="nav-item active">
                    <a class="nav-link" href="?page=users">Users</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="?page=aturan">Basis Aturan</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="?page=konsultasiadm">Konsultasi</a>
                </li>

            <?php
            }elseif($_SESSION['role']=="Admin"){
            ?>

                <li class="nav-item active">
                    <a class="nav-link" href="?page=gejala">Gejala</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="?page=penyakit">Penyakit</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="?page=aturan">Basis Aturan</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="?page=konsultasiadm">Konsultasi</a>
                </li>

            <?php
            }else{
            ?>

            <li class="nav-item active">
                <a class="nav-link" href="?page=konsultasi">Konsultasi</a>
            </li>

            <?php
            }
            ?>

            <li class="nav-item active">
                <a class="nav-link" href="?page=logout">Logout</a>
            </li>
        </ul>
    </nav>

    <!-- cek status -->
    <?php 
        if($_SESSION['status']!="y"){
            header("Location:login.php");
        }
    ?>

    <!-- container -->
    <div class="container-fluid mt-2 mb-2">

    <!-- setting menu -->
    <?php

    $page = isset($_GET['page']) ? $_GET['page'] : "";
    $action = isset($_GET['action']) ? $_GET['action'] : "";

    if ($page==""){
        include "welcome.php";
    }elseif ($page=="gejala"){
        if ($action==""){
            include "tampil_gejala.php";
        }elseif ($action=="tambah"){
            include "tambah_gejala.php";
        }elseif ($action=="update"){
            include "update_gejala.php";
        }else{
            include "hapus_gejala.php";
        }
    }elseif ($page=="penyakit"){
        if ($action==""){
            include "tampil_penyakit.php";
        }elseif ($action=="tambah"){
            include "tambah_penyakit.php";
        }elseif ($action=="update"){
            include "update_penyakit.php";
        }else{
            include "hapus_penyakit.php";
        }  
    }elseif ($page=="aturan"){
        if ($action==""){
            include "tampil_aturan.php";
        }elseif ($action=="tambah"){
            include "tambah_aturan.php";
        }elseif ($action=="detail"){
            include "detail_aturan.php";
        }elseif ($action=="update"){
            include "update_aturan.php";
        }elseif ($action=="hapus_gejala"){
            include "hapus_detail_aturan.php";
        }else{
            include "hapus_aturan.php";
        }  
    }elseif ($page=="konsultasi"){
        if ($action==""){
            include "tampil_konsultasi.php";
        }else {
            include "hasil_konsultasi.php";
        }
    }elseif ($page=="konsultasiadm"){
        if ($action==""){
            include "tampil_konsultasiadm.php";
        }else {
            include "detail_konsultasiadm.php";
        } 
    }elseif ($page=="users"){
        if ($action==""){
            include "tampil_users.php";
        }elseif ($action=="tambah"){
            include "tambah_users.php";
        }elseif ($action=="update"){
            include "update_users.php";
        }else{
            include "hapus_users.php";
        }
    }else{
        include "logout.php";
    }
    ?>
    </div>

<div class="my-5">


</div>


    <!-- jquery -->
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- datatables js -->
    <script src="assets/js/datatables.min.js"></script>
    <script>
      $(document).ready(function() {
            $('#myTable').DataTable();
      } );
    </script>
    <!-- Font Awesome js -->
    <script src="assets/js/all.js"></script>

    <!-- chosen js -->
    <script src="assets/js/chosen.jquery.min.js"></script>
    <script>
      $(function() {
        $('.chosen').chosen();
      });
    </script>

    <!-- Link Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Link Animate On Screen -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>