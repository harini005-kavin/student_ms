<?php
include("config/db.php");
$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
<h3>Edit Student</h3>

<form method="POST">

<input type="text" name="name" value="<?= $row['name']; ?>" class="form-control mb-2">
<input type="email" name="email" value="<?= $row['email']; ?>" class="form-control mb-2">
<input type="text" name="phone" value="<?= $row['phone']; ?>" class="form-control mb-2">
<input type="text" name="course" value="<?= $row['course']; ?>" class="form-control mb-2">

<button name="update" class="btn btn-primary">Update</button>

</form>
</div>

<?php
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    mysqli_query($conn,"UPDATE students SET
    name='$name',
    email='$email',
    phone='$phone',
    course='$course'
    WHERE id=$id");

    header("Location: view_students.php");
}
?>