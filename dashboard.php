<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.sidebar{
    height:100vh;
    background:#343a40;
    color:white;
    padding:20px;
}
.sidebar a{
    color:white;
    display:block;
    margin:10px 0;
    text-decoration:none;
}
.sidebar a:hover{
    background:#495057;
    padding-left:10px;
}
</style>

</head>

<body>

<div class="row">

<!-- Sidebar -->
<div class="col-md-2 sidebar">
    <h4>Admin Panel</h4>
    <a href="dashboard.php">Dashboard</a>
    <a href="add_student.php">Add Student</a>
    <a href="view_students.php">View Students</a>
    <a href="logout.php">Logout</a>
</div>

<!-- Main Content -->
<div class="col-md-10 p-4">

<h2>Welcome Admin 🎉</h2>

<?php
include("config/db.php");
$result = mysqli_query($conn,"SELECT * FROM students");
$total = mysqli_num_rows($result);
?>

<div class="card p-3 mt-3" style="width:300px;">
    <h4>Total Students</h4>
    <h2><?= $total ?></h2>
</div>

</div>

</div>

</body>
</html>