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

    // Buat prepared statement untuk mengambil semua data dari tbBiodata
    $query = $db->prepare("SELECT * FROM tbBiodata");
    // Jalankan perintah SQL
    $query->execute();
    // Ambil semua data dan masukkan ke variable $data
    $data = $query->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Daftar Biodata</title>
    </head>
    <body>
		<h3>Selamat datang <font color="red"><?php echo $currentUser['nama'] ?></font>, <a href="logout.php">Logout</a></h3>
        <h1>Daftar Biodata</h1>        
        <a href="index.php"><button type="button">Home</button></a>
        <a href="create.php"><button type="button">Tambah Data</button></a>
        <a href="search.php"><button type="button">Pencarian Data</button></a>
        <hr />
        <table border="1">
            <tr>
                <th>
                	No
                </th>
                <th>
                    #ID
                </th>
                <th>
                    Nama
                </th>
                <th>
                    Alamat
                </th>
                <th>
                    No HP
                </th>
                <th>
                    Aksi
                </th>
            </tr>
            <?php $no=1; ?>
            <!-- Perulangan Untuk Menampilkan Semua Data yang ada di Variable Data -->
            <?php foreach ($data as $value): ?>                
                <tr>
                    <td>
                    	<?php echo $no ?>
                    </td>
                    <td>
                        <?php echo $value['id'] ?>
                    </td>
                    <td>
                        <?php echo $value['nama'] ?>
                    </td>
                    <td>
                        <?php echo $value['alamat'] ?>
                    </td>
                    <td>
                        <?php echo $value['hp'] ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $value['id']?>"><button type="button">Edit</button></a>                        
                        <a href="delete.php?id=<?php echo $value['id']?>" onclick="return confirm('Sure to delete data !'); " ><button type="button">Delete</button></a>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </table>
    </body>
</html>
