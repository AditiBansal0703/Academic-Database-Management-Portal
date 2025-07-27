<?php include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $roll = $_POST['roll_number'];
  $name = $_POST['student_name'];
  $email = $_POST['email_id'];
  $place = $_POST['training_place'];
  $faculty = $_POST['faculty_evaluator'];
  $mode = $_POST['mode'];
  $year = $_POST['year'];
  $session = $_POST['session'];

  $stmt = $conn->prepare("INSERT INTO internship (`Roll_number`, `Name of the Students`, `Email ID`, `Place of Training`, `Assigned Faculty Member for Evaluation`, `Mode`, `Year`, `session`)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssssd", $roll, $name, $email, $place, $faculty, $mode, $year, $session);
  $stmt->execute();
  $stmt->close();
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Internship</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Add Internship</h2>
  <form method="POST">
    <input class="form-control mb-2" name="roll_number" placeholder="Roll No" required>
    <input class="form-control mb-2" name="student_name" placeholder="Student Name" required>
    <input class="form-control mb-2" name="email_id" placeholder="Email ID" required>
    <input class="form-control mb-2" name="training_place" placeholder="Place of Training" required>
    <input class="form-control mb-2" name="faculty_evaluator" placeholder="Faculty Evaluator" required>
    <input class="form-control mb-2" name="mode" placeholder="Mode (Online/Offline)" required>
    <input class="form-control mb-2" name="year" placeholder="Year" required>
    <input class="form-control mb-2" name="session" type="number" step="any" placeholder="Session" required>
    <button class="btn btn-success" type="submit">Add</button>
  </form>
</div>
</body>
</html>
