<?php include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $roll_no = $_POST['roll_no'];
  $student_name = $_POST['student_name'];
  $project_no = $_POST['project_no'];
  $database_name = $_POST['database_name'];
  $year = $_POST['year'];
  $session = $_POST['session'];

  $stmt = $conn->prepare("INSERT INTO project (roll_no, student_name, project_no, database_name, year, session) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssissi", $roll_no, $student_name, $project_no, $database_name, $year, $session);
  $stmt->execute();
  $stmt->close();
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Project</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Add Project</h2>
  <form method="POST">
    <input class="form-control mb-2" name="roll_no" placeholder="Roll No" required>
    <input class="form-control mb-2" name="student_name" placeholder="Student Name" required>
    <input class="form-control mb-2" name="project_no" type="number" placeholder="Project No" required>
    <input class="form-control mb-2" name="database_name" placeholder="Database Name" required>
    <input class="form-control mb-2" name="year" placeholder="Year" required>
    <input class="form-control mb-2" name="session" type="number" placeholder="Session" required>
    <button class="btn btn-success" type="submit">Add</button>
  </form>
</div>
</body>
</html>
