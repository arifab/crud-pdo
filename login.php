<?php
    // Lampirkan db dan User
    require_once "db.php";
    require_once "User.php";

    //Buat object user
    $user = new User($db);

    //Jika sudah login
    if($user->isLoggedIn()){
        header("location: index.php"); //redirect ke index
    }

    //jika ada data yg dikirim
    if(isset($_POST['kirim'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Proses login user
        if($user->login($email, $password)){
            header("location: index.php");
        }else{
            // Jika login gagal, ambil pesan error
            $error = $user->getLastError();
        }
    }
 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        
    </head>
    <body>
            <form class="login-form" method="post">
              <?php if (isset($error)): ?>
                  <div class="error">
                      <?php echo $error ?>
                  </div>
              <?php endif; ?>
              <h1>Sign In...</h1>
              <hr>
              <input type="email" name="email" placeholder="email" required/><br>
              <input type="password" name="password" placeholder="password" required/><br>
              <button type="submit" name="kirim">login</button>
              <p class="message">Don't have account? <a href="register.php">Register Here</a></p>
            </form>            
          </div>
        </div>
    </body>
</html>
