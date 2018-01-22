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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Daftar Biodata</title>
    </head>
    <body>
    	<h3>Selamat datang <font color="red"><?php echo $currentUser['nama'] ?></font>, <a href="logout.php">Logout</a></h3>
    	<h1>Pencarian Data</h1>    	
		<a href="index.php"><button type="button">Home</button></a>
		<a href="create.php"><button type="button">Tambah Data</button></a>
		<a href="search.php"><button type="button">Pencarian Data</button></a>
		<hr />
		<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="text" name="q" placeholder="Masukkan nama" value="<?php if (isset($_GET['q'])){ echo $_GET['q']; } ?>"/>	
		</form>
    </body>
</html>
<?php
 
 if (isset($_GET['q'])){
    $q = $_GET['q'];     
    $query = "SElECT * FROM tbBiodata WHERE nama LIKE :q OR hp LIKE :q";    
    $q = "%".$q."%"; ////tambahkan tanda persen pada variabel $q         
    $stmt = $db->prepare($query); //persiapkan query    
    $stmt->bindParam(':q', $q); //isi nilai :q dari $q               
    $stmt->execute(); //eksekusi query   
    $jml = $stmt->rowCount(); //cek jumlah data hasil query
     
	if ($jml>0){ //jika ada data tampilkan
	 	echo "<table border=\"1\">
	 			<tr>
	 			  <th>No</th>
	 			  <th>ID</th>
	 			  <th>NAMA</th>
	 			  <th>ALAMAT</th>
	 			  <th>HP</th>
	 			</tr>";
		$no=1;	
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         extract($row); //ganti $row['field'] menjadi {$field}
	 	 echo "<tr>
	 			  <td>$no</td>
	 			  <td>{$id}</td>
	 			  <td>{$nama}</td>
	 			  <td>{$alamat}</td>
	 			  <td>{$hp}</td>
	 			</tr>";	
		 $no++;	
		}
		echo "</table>"; 		
	} else {
		echo "Pencarian <b>$_GET[q]</b> tidak ditemukan";
	}
 }
?>
