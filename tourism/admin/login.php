<?php 
  session_start();

  if(isset($_SESSION["login"])){
    header("Location: dashboard.php");
    exit;
  }

  require '../helper/functions.php';


  if(isset($_POST["login"])){
    $username = $_POST['username'];
    $password = isset($_POST['password']) ? $_POST['password'] : ''; // check if password key is set
    $scann = koneksi();

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($scann, $query);
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            
            $_SESSION["login"] = true;

            header("Location: dashboard.php");
            exit;
        }
    }
    $error = true;
  }


    if(isset($_POST["signup"])){
      if( signup($_POST) > 0){
        echo "<script> 
            alert('User Baru Berhasil ditambahkan! ')
        </script>";
      }else{
        echo mysqli_error($scann);
      }
  }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/login.css" rel="stylesheet">
</head>


<body>
    <div class="wrapper">
        <div class="title-text">
          <div class="title login">Login Admin</div>
          <div class="title signup">Signup Admin</div>
        </div>
        <div class="form-container">
          <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">Login</label>
            <label for="signup" class="slide signup">Signup</label>
            <div class="slider-tab"></div>
          </div>
          <div class="form-inner">
            <form method="post" action="login.php" class="login">
            <div class="field">
              <input type="text" name="username" id="username" class="form-control" placeholder="Username">
            </div>
            <div class="field">
              <input class="form-control" type="password" name="password" id="password" placeholder="Password">
            </div>
              <div class="field btn">
                  <div class="btn-layer"></div>
                  
                  <input type="submit" name="login" value="Login">
                </div>
                <div class="signup-link">Username : admin / Password : 1234</a></div>
                <div class="signup-link"><a href="../../index.php">Back to Home</a></div>
                <?php if(isset($error)) : ?>
                  <div class="signup-link" style="color: red; font-style: italic;">Username / Password salah!</a></div>
                <?php endif; ?>
            </form>



            <form action="#" class="signup" method="post">
              <div class="field">
                <input type="text" name="username" id="username" placeholder="Username" required>
              </div>
              <div class="field">
                <input type="password" name="password" id="password" placeholder="Password" required>
              </div>
              <div class="field">
                <input type="password" name="password2" id="password2" placeholder="Confirm password" required>
              </div>
              <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" name="signup" value="Signup">
              </div>
            </form>
          </div>
        </div>
      </div>
</body>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- Template Javascript -->
    <script src="../assets/js/login.js"></script>

</html>