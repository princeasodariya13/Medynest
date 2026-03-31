<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
$email=$_POST['email'];
$upassword=$_POST['password'];

$ret=mysqli_query($con,"SELECT * FROM admin WHERE email='$email' and password='$upassword'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
header("location:dashboard.php");

}
else
{
$_SESSION['errmsg']="Invalid email or password";

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login</title>

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

.links a {
  color: #00c6ff;
  text-decoration: none;
}

.links a:hover {
  text-decoration: underline;
}

.error-msg {
  color: #ff6b6b;
  text-align: center;
  margin-bottom: 15px;
  font-weight: 500;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-20px);}
  to { opacity: 1; transform: translateY(0);}
}
</style>
</head>

<body>
<div class="login-card">
  <h2>Admin Login</h2>

  <!-- Error Message -->
  <?php if(!empty($_SESSION['errmsg'])): ?>
    <div class="error-msg">
      <?php echo htmlentities($_SESSION['errmsg']); $_SESSION['errmsg']=""; ?>
    </div>
  <?php endif; ?>

  <!-- Login Form -->
  <form method="POST">
    <div class="mb-3">
      <label for="email" class="form-label">Email Address</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
    </div>

    <button type="submit" class="btn btn-primary" name="submit">
      <i class="fa fa-sign-in-alt"></i> Login
    </button>
  </form>

  <!-- Other Login Links -->
  <div class="mt-4 text-center links">
    <p>Other Logins:</p>
    <a href="../doctor/index.php">Doctor Login</a> | 
    <a href="../user-login.php">Patient Login</a> |
  </div>

  <!-- Footer -->
  <div class="mt-4 text-center">
    <small>&copy; 2025 Hospital Management System</small>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
