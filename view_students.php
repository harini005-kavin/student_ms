<form method="GET" class="mb-3">
<input type="text" name="search" placeholder="Search by name" class="form-control w-25">
</form>
<?php include("config/db.php"); ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
<h3 class="text-center">All Students</h3>

<table class="table table-bordered">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Course</th>
    <th>Action</th>
</tr>

<?php
if(isset($_GET['search'])){
    $search = $_GET['search'];

    $result = mysqli_query($conn,
        "SELECT * FROM students WHERE name LIKE '%$search%'");
}
else{
    $result = mysqli_query($conn,"SELECT * FROM students");
}

while($row = mysqli_fetch_assoc($result)){
?>

<tr>
<td><?= $row['id']; ?></td>
<td><?= $row['name']; ?></td>
<td><?= $row['email']; ?></td>
<td><?= $row['phone']; ?></td>
<td><?= $row['course']; ?></td>

<td>
    <a href="edit_student.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
    <a href="delete_student.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
</td>
</tr>

<?php } ?>

</table>
</div>