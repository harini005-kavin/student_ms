<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
}
?>
<?php include("config/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3>Add Student</h3>

<form method="POST">
    <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
    <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
    <input type="text" name="phone" placeholder="Phone" class="form-control mb-2" required>
    <input type="text" name="course" placeholder="Course" class="form-control mb-2" required>

    <button name="submit" class="btn btn-primary">Save</button>
</form>

</body>
</html>

<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $query = "INSERT INTO students(name,email,phone,course)
              VALUES('$name','$email','$phone','$course')";

    mysqli_query($conn,$query);

    header("Location: view_students.php");
}
?>