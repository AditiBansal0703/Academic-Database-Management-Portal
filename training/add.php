<?php include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $roll = $_POST['roll_no'];
  $name = $_POST['student_name'];
  $training = $_POST['training_name'];
  $details = $_POST['t_details'];
  $duration = $_POST['duration'];
  $year = $_POST['year'];
  $session = $_POST['session'];

  $stmt = $conn->prepare("INSERT INTO training (roll_no, student_name, training_name, t_details, duration, year, session)
                          VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssi", $roll, $name, $training, $details, $duration, $year, $session);
  $stmt->execute();
  $stmt->close();
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Training</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Add Training</h2>
  <form method="POST">
    <input class="form-control mb-2" name="roll_no" placeholder="Roll Number" required>
    <input class="form-control mb-2" name="student_name" placeholder="Student Name" required>
    <input class="form-control mb-2" name="training_name" placeholder="Training Name" required>
    <input class="form-control mb-2" name="t_details" placeholder="Training Details" required>
    <input class="form-control mb-2" name="duration" placeholder="Duration" required>
    <input class="form-control mb-2" name="year" placeholder="Year" required>
    <input class="form-control mb-2" name="session" type="number" placeholder="Session" required>
    <button class="btn btn-success" type="submit">Add</button>
  </form>
</div>
</body>
</html>
