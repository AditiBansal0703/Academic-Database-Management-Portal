<?php include '../db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Project Records</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Project Table</h2>
  <a href="add.php" class="btn btn-success mb-3">Add Project</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>S. No</th>
        <th>Roll No</th>
        <th>Student Name</th>
        <th>Project No</th>
        <th>Database Name</th>
        <th>Year</th>
        <th>Session</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $conn->query("SELECT * FROM project");
      while($row = $result->fetch_assoc()):
      ?>
      <tr>
        <td><?= $row['s_no'] ?></td>
        <td><?= $row['roll_no'] ?></td>
        <td><?= $row['student_name'] ?></td>
        <td><?= $row['project_no'] ?></td>
        <td><?= $row['database_name'] ?></td>
        <td><?= $row['year'] ?></td>
        <td><?= $row['session'] ?></td>
        <td>
          <a href="edit.php?s_no=<?= $row['s_no'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="delete.php?s_no=<?= $row['s_no'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
