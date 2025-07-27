<?php include '../db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Records</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Student Table</h2>
  <a href="add.php" class="btn btn-success mb-3">Add Student</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Roll No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>Year</th>
        <th>Session</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $conn->query("SELECT * FROM student");
      while($row = $result->fetch_assoc()):
      ?>
      <tr>
        <td><?= $row['roll_no'] ?></td>
        <td><?= $row['student_name'] ?></td>
        <td><?= $row['student_email'] ?></td>
        <td><?= $row['student_phone_no'] ?></td>
        <td><?= $row['year'] ?></td>
        <td><?= $row['session'] ?></td>
        <td>
          <a href="edit.php?roll_no=<?= $row['roll_no'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="delete.php?roll_no=<?= $row['roll_no'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
