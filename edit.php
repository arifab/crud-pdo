<?php
    require_once "db.php";
    require_once "User.php";
    
    // Buat object user
    $user = new User($db);
    // Jika belum login
    if(!$user->isLoggedIn()){
        header("location: login.php"); //Redirect ke halaman login
    }
    // Ambil data user saat ini
    $currentUser = $user->getUser();
    
    //===============

    if(!isset($_GET['id'])){
        die("Error: ID Tidak Dimasukkan");
    }

    //Ambil data
    $query = $db->prepare("SELECT * FROM `tbBiodata` WHERE id = :id");
    $query->bindParam(":id", $_GET['id']);
    // Jalankan perintah sql
    $query->execute();
    if($query->rowCount() == 0){
        // Tidak ada hasil
        die("Error: ID Tidak Ditemukan");
    }else{
        // ID Ditemukan, Ambil data
        $data = $query->fetch();
    }

    if(isset($_POST['submit'])){
        // Simpan data yang di inputkan ke POST ke masing-masing variable
        // dan convert semua tag HTML yang mungkin dimasukkan untuk mengindari XSS
        $nama = htmlentities($_POST['nama']);
        $alamat = htmlentities($_POST['alamat']);
        $hp = htmlentities($_POST['hp']);

        // Prepared statement untuk mengubah data
        $query = $db->prepare("UPDATE `tbBiodata` SET `nama`=:nama,`alamat`=:alamat,`hp`=:hp WHERE id=:id");
        $query->bindParam(":nama", $nama);
        $query->bindParam(":alamat", $alamat);
        $query->bindParam(":hp", $hp);
        $query->bindParam(":id", $_GET['id']);
        // Jalankan perintah SQL
        $query->execute();
        // Alihkan ke index.php
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tambah Biodata</title>
    </head>
    <body>
        <h3>Selamat datang <font color="red"><?php echo $currentUser['nama'] ?></font>, <a href="logout.php">Logout</a></h3>
        <h1>Tambah Data</h1>
        <a href="index.php"><button type="button">Home</button></a>
        <a href="create.php"><button type="button">Tambah Data</button></a>
        <a href="search.php"><button type="button">Pencarian Data</button></a>
        <hr />
        <form method="post">
            Nama:<br> <input required type="text" name="nama" placeholder="Nama" value="<?php echo $data['nama'] ?>"/> <br>
            Alamat:<br> <input required type="text" name="alamat" placeholder="Alamat" value="<?php echo $data['alamat'] ?>"/> <br>
            HP:<br> <input required type="text" name="hp" placeholder="No HP" value="<?php echo $data['hp'] ?>"/> <br>
            <input type="submit" name="submit" />
        </form>
    </body>
</html>
