<?php include '../db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Mentor Records</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Mentor Table</h2>
  <a href="add.php" class="btn btn-success mb-3">Add Mentor</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>S. No</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>Room No</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $conn->query("SELECT * FROM mentor");
      while($row = $result->fetch_assoc()):
      ?>
      <tr>
        <td><?= $row['s_no'] ?></td>
        <td><?= $row['mentor_name'] ?></td>
        <td><?= $row['designation'] ?></td>
        <td><?= $row['mentor_email'] ?></td>
        <td><?= $row['mentor_phone_no'] ?></td>
        <td><?= $row['mentor_room_no'] ?></td>
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
