<?php include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $roll = $_POST['roll_no'];
  $name = $_POST['student_name'];
  $email = $_POST['student_email'];
  $phone = $_POST['student_phone_no'];
  $year = $_POST['year'];
  $session = $_POST['session'];

  $check = $conn->prepare("SELECT roll_no FROM student WHERE roll_no = ?");
  $check->bind_param("i", $roll);
  $check->execute();
  $check->store_result();

  if ($check->num_rows > 0) {
    echo "Roll number already exists.";
  } else {
    $stmt = $conn->prepare("INSERT INTO student (roll_no, student_name, student_email, student_phone_no, year, session) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssii", $roll, $name, $email, $phone, $year, $session);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
  }
  $check->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Add Student</h2>
  <form method="POST">
    <input class="form-control mb-2" name="roll_no" placeholder="Roll Number" type="number" required>
    <input class="form-control mb-2" name="student_name" placeholder="Name" required>
    <input class="form-control mb-2" name="student_email" placeholder="Email" type="email" required>
    <input class="form-control mb-2" name="student_phone_no" placeholder="Phone Number" required>
    <input class="form-control mb-2" name="year" placeholder="Year" type="number" required>
    <input class="form-control mb-2" name="session" placeholder="Session" type="number" required>
    <button class="btn btn-success" type="submit">Add</button>
  </form>
</div>
</body>
</html>
