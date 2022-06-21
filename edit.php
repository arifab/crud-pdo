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
    $query = $db->prepare("SELECT * FROM `Biodata` WHERE id = :id");
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
        $name = htmlentities($_POST['name']);
        $address = htmlentities($_POST['address']);
        $hp = htmlentities($_POST['hp']);

        // Prepared statement untuk mengubah data
        $query = $db->prepare("UPDATE `Biodata` SET `name`=:name,`address`=:address,`number`=:number WHERE id=:id");
        $query->bindParam(":name", $name);
        $query->bindParam(":address", $address);
        $query->bindParam(":number", $number);
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
        <h3>Good morning <font color="red"><?php echo $currentUser['name'] ?></font>, <a href="logout.php">Logout</a></h3>
        <h1>Tambah Data</h1>
        <a href="index.php"><button type="button">Home</button></a>
        <a href="create.php"><button type="button">Tambah Data</button></a>
        <a href="search.php"><button type="button">Pencarian Data</button></a>
        <hr />
        <form method="post">
            name:<br> <input required type="text" name="name" placeholder="name" value="<?php echo $data['name'] ?>"/> <br>
            address:<br> <input required type="text" name="address" placeholder="address" value="<?php echo $data['address'] ?>"/> <br>
            HP:<br> <input required type="text" name="number" placeholder="No number" value="<?php echo $data['number'] ?>"/> <br>
            <input type="submit" name="submit" />
        </form>
    </body>
</html>
