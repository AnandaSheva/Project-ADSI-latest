<?php
    session_start();
    include "koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_user = mysqli_query($mysqli, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
    $cek_user = mysqli_num_rows($sql_user);

    if($cek_user > 0) {
        if(stripos($username, "admin") !== false) {
            header('Location: ../admin-dashboard.php');
            exit();
        } else if(stripos($username, "manajer") !== false) {
            header('Location: ../manajer-dashboard.php');
            exit();
        }
    } else {
        header('Location: ../login-page.php');
        exit();
    }