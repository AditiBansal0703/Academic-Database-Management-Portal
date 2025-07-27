<?php include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $roll_no = $_POST['roll_no'];
  $student_name = $_POST['student_name'];
  $title = $_POST['title'];
  $course = $_POST['course'];
  $mentor_name = $_POST['mentor_name'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $session = $_POST['session'];

  $stmt = $conn->prepare("INSERT INTO second_year_database (roll_no, student_name, title, course, mentor_name, month, year, session) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssssi", $roll_no, $student_name, $title, $course, $mentor_name, $month, $year, $session);
  $stmt->execute();
  $stmt->close();
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Entry</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Add Project Entry</h2>
  <form method="POST">
    <input class="form-control mb-2" name="roll_no" placeholder="Roll No" required>
    <input class="form-control mb-2" name="student_name" placeholder="Student Name" required>
    <input class="form-control mb-2" name="title" placeholder="Project Title" required>
    <input class="form-control mb-2" name="course" placeholder="Course" required>
    <input class="form-control mb-2" name="mentor_name" placeholder="Mentor Name" required>
    <input class="form-control mb-2" name="month" placeholder="Month" required>
    <input class="form-control mb-2" name="year" placeholder="Year" required>
    <input class="form-control mb-2" name="session" type="number" placeholder="Session" required>
    <button class="btn btn-success" type="submit">Add</button>
  </form>
</div>
</body>
</html>
