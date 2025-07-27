<?php include '../db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Internship Records</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- ✅ Optional: Custom CSS -->
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Internship Table</h2>
  <a href="add.php" class="btn btn-success mb-3">Add Internship</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Sr. No</th>
        <th>Roll No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Training Place</th>
        <th>Faculty Evaluator</th>
        <th>Mode</th>
        <th>Year</th>
        <th>Session</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $conn->query("SELECT `Sr. No` AS sr_no, `Roll_number` AS roll_number, 
                                     `Name of the Students` AS student_name,
                                     `Email ID` AS email_id,
                                     `Place of Training` AS training_place,
                                     `Assigned Faculty Member for Evaluation` AS faculty_evaluator,
                                     `Mode` AS mode,
                                     `Year` AS year,
                                     `session` AS session
                              FROM internship");

      while($row = $result->fetch_assoc()):
      ?>
      <tr>
        <td><?= $row['sr_no'] ?></td>
        <td><?= $row['roll_number'] ?></td>
        <td><?= $row['student_name'] ?></td>
        <td><?= $row['email_id'] ?></td>
        <td><?= $row['training_place'] ?></td>
        <td><?= $row['faculty_evaluator'] ?></td>
        <td><?= $row['mode'] ?></td>
        <td><?= $row['year'] ?></td>
        <td><?= $row['session'] ?></td>
        <td>
          <a href="edit.php?sr_no=<?= $row['sr_no'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="delete.php?sr_no=<?= $row['sr_no'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
