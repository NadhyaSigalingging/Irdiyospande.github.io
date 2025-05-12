<?php
// Cegah duplikat session_start()
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ganti username dan password di sini
$valid_username = 'admin';
$valid_password = '123';

$errMsg = '';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username === $valid_username && $password === $valid_password) {
    $_SESSION['username'] = $username;
    header('Location: index.php');
    exit;
  } else {
    $errMsg = 'Username atau password salah!';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <!-- Bootstrap -->
  <link href="template/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #e6dfc9;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-box {
      width: 360px;
      margin: 7% auto;
    }

    .login-logo img {
      width: 120px;
      margin-bottom: 20px;
    }

    .login-box-body {
      background-color: #94af9f;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.2);
    }

    .form-control {
      border-radius: 20px;
      background-color: #fef6e4;
      border: none;
      padding-left: 40px;
      height: 45px;
    }

    .form-group {
      position: relative;
      margin-bottom: 20px;
    }

    .icon-input {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #666;
      font-size: 16px;
    }

    .btn-primary {
      background-color: #f3eed4;
      color: #333;
      font-weight: bold;
      border-radius: 10px;
      border: none;
      width: 100%;
      height: 40px;
    }

    .btn-primary:hover {
      background-color: #ddd5b8;
    }

    .checkbox label {
      color: #fff;
      font-weight: normal;
    }

    .login-box-body p {
      margin-top: 20px;
      font-size: 14px;
      color: #fff;
    }

    .alert {
      border-radius: 10px;
      text-align: center;
      padding: 10px;
      font-size: 14px;
    }

    @media (max-width: 400px) {
      .login-box {
        width: 90%;
        margin-top: 15%;
      }
    }
  </style>
</head>
<body>

  <div class="login-box">
    <div class="login-logo text-center">
      <img src="template/images/logo.png" alt="Logo">
    </div>

    <div class="login-box-body">
      <?php if (!empty($errMsg)) { ?>
        <div class="alert alert-danger"><?php echo $errMsg; ?></div>
      <?php } ?>

      <form method="post">
        <!-- Username -->
        <div class="form-group">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <span class="fa fa-user icon-input"></span>
        </div>

        <!-- Password -->
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <span class="fa fa-lock icon-input"></span>
        </div>

        <!-- Remember Me + Button -->
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>

          <div class="col-xs-4">
            <button name="login" type="submit" class="btn btn-primary">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Scripts -->
  <script src="template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="template/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
