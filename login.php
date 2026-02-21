<?php
session_start();
include("config/db.php");

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,"SELECT * FROM admin WHERE email='$email'");
$data = mysqli_fetch_assoc($result);

if($data && password_verify($password, $data['password'])){
    $_SESSION['admin'] = $email;
    header("Location: dashboard.php");
}
else{
    echo "<script>alert('Invalid Login')</script>";
}
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
<h3>Admin Login</h3>

<form method="POST">
<input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
<input type="password" name="password" placeholder="Password" class="form-control mb-2" required>

<button name="login" class="btn btn-primary">Login</button>
</form>
</div>