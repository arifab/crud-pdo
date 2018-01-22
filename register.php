<?php
    // Lampirkan db dan User
    require_once "db.php";
    require_once "User.php";

    // Buat object user
    $user = new User($db);

    // Jika sudah login
    if($user->isLoggedIn()){
        header("location: index.php"); //Redirect ke index
    }

    //Jika ada data dikirim
    if(isset($_POST['kirim'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Registrasi user baru
        if($user->register($nama, $email, $password)){
            // Jika berhasil set variable success ke true
            $success = true;
        }else{
            // Jika gagal, ambil pesan error
            $error = $user->getLastError();
        }
    }
 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>

    </head>
    <body>
        <div class="login-page">
          <div class="form">
              <form class="register-form" method="post">
              <?php if (isset($error)): ?>
                  <div class="error">
                      <?php echo $error ?>
                  </div>
              <?php endif; ?>
              <?php if (isset($success)): ?>
                  <div class="success">
                      Berhasil mendaftar. Silakan <a href="login.php">masuk</a>
                  </div>
              <?php endif; ?>
			  <h1>Register...</h1>
              <hr>
               <input type="text" name="nama" placeholder="nama" required/><br>
               <input type="email" name="email" placeholder="email address" required/><br>
               <input type="password" name="password" placeholder="password" required/><br>
               <button type="submit" name="kirim">create</button>
               <p class="message">Already registered? <a href="login.php">Sign In</a></p>
             </form>
          </div>
        </div>
    </body>
</html>
