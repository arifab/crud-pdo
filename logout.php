<?php
    // Lampirkan db dan User
    require_once "db.php";
    require_once "User.php";

    // Buat object user
    $user = new User($db);

    // Logout! hapus session user
    $user->logout();

    // Redirect ke login
    header('location: login.php');
 ?>
