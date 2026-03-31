<?php
session_start();
include("include/config.php");
error_reporting(0);

if (isset($_POST['submit'])) {
    $docEmail = $_POST['docEmail'];
    $dpassword = md5($_POST['password']);  // Consider using password_hash() for better security
    
    // Prepare the SQL query to avoid SQL injection
    $stmt = $con->prepare("SELECT * FROM doctors WHERE docEmail=? AND password=?");
    $stmt->bind_param("ss", $docEmail, $dpassword);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $num = $result->fetch_array();
        $_SESSION['dlogin'] = $docEmail;
        $_SESSION['id'] = $num['id'];
        $uid = $num['id'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;

        // Insert log entry
        $logStmt = $con->prepare("INSERT INTO doctorslog (uid, docEmail, userip, status) VALUES (?, ?, ?, ?)");
        $logStmt->bind_param("issi", $uid, $docEmail, $uip, $status);
        $logStmt->execute();

        header("location:dashboard.php");
    } else {
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 0;

        // Log failed attempt
        $logFailStmt = $con->prepare("INSERT INTO doctorslog (docEmail, userip, status) VALUES (?, ?, ?)");
        $logFailStmt->bind_param("ssi", $docEmail, $uip, $status);
        $logFailStmt->execute();

        echo "<script>alert('Invalid Email or Password');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctor Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
    /* ===== Body Background ===== */
    body {
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
    }

    /* ===== Login Card ===== */
    .login-card {
      background: rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      padding: 40px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      color: #fff;
      animation: fadeIn 1s ease-in-out;
    }

    .login-card h2 {
      text-align: center;
      font-weight: 700;
      margin-bottom: 25px;
    }

    /* ===== Form Elements ===== */
    .form-control {
      background: rgba(255,255,255,0.1);
      border: none;
      color: #fff;
      padding: 12px;
      border-radius: 10px;
    }

    .form-control:focus {
      background: rgba(255,255,255,0.15);
      box-shadow: none;
      border: 1px solid #00c6ff;
    }

    .form-control::placeholder {
      color: #ddd;
    }

    .btn-primary {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      border-radius: 10px;
      background: linear-gradient(90deg, #00c6ff, #0072ff);
      border: none;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.3);
    }

    .error-msg {
      color: #ff6b6b;
      text-align: center;
      margin-bottom: 15px;
      font-weight: 500;
    }

    .links a {
      color: #00c6ff;
      text-decoration: none;
    }

    .links a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px);}
      to { opacity: 1; transform: translateY(0);}
    }
    </style>
</head>

<body>
<div class="login-card">
  <h2>Doctor Login</h2>

  <!-- Error Message -->
  <?php if(!empty($_SESSION['errmsg'])): ?>
    <div class="error-msg">
      <?php echo htmlentities($_SESSION['errmsg']); $_SESSION['errmsg']=""; ?>
    </div>
  <?php endif; ?>

  <!-- Login Form -->
  <form method="post">
    <div class="mb-3">
      <label for="docEmail" class="form-label">Email Address</label>
      <input type="email" class="form-control" id="docEmail" name="docEmail" placeholder="Enter your email" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
    </div>

    <button type="submit" class="btn btn-primary" name="submit">
      <i class="fa fa-sign-in-alt"></i> Login
    </button>
  </form>

  <!-- Footer -->
  <div class="mt-4 text-center">
    <small>&copy; 2025 Hospital Management System</small>
  </div>
</div>

<!-- Scripts (Unchanged) -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/login.js"></script>
<script>
    jQuery(document).ready(function() {
        Main.init();
        Login.init();
    });
</script>
</body>
</html>
