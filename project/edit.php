<?php include '../db.php';

$s_no = $_GET['s_no'];
$stmt = $conn->prepare("SELECT * FROM second_year_database WHERE s_no = ?");
$stmt->bind_param("i", $s_no);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $roll_no = $_POST['roll_no'];
  $student_name = $_POST['student_name'];
  $title = $_POST['title'];
  $course = $_POST['course'];
  $mentor_name = $_POST['mentor_name'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $session = $_POST['session'];

  $stmt = $conn->prepare("UPDATE second_year_database SET roll_no=?, student_name=?, title=?, course=?, mentor_name=?, month=?, year=?, session=? WHERE s_no=?");
  $stmt->bind_param("sssssssii", $roll_no, $student_name, $title, $course, $mentor_name, $month, $year, $session, $s_no);
  $stmt->execute();
  $stmt->close();
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Entry</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Edit Project Entry</h2>
  <form method="POST">
    <input class="form-control mb-2" name="roll_no" value="<?= $data['roll_no'] ?>" required>
    <input class="form-control mb-2" name="student_name" value="<?= $data['student_name'] ?>" required>
    <input class="form-control mb-2" name="title" value="<?= $data['title'] ?>" required>
    <input class="form-control mb-2" name="course" value="<?= $data['course'] ?>" required>
    <input class="form-control mb-2" name="mentor_name" value="<?= $data['mentor_name'] ?>" required>
    <input class="form-control mb-2" name="month" value="<?= $data['month'] ?>" required>
    <input class="form-control mb-2" name="year" value="<?= $data['year'] ?>" required>
    <input class="form-control mb-2" name="session" type="number" value="<?= $data['session'] ?>" required>
    <button class="btn btn-primary" type="submit">Update</button>
  </form>
</div>
</body>
</html>
