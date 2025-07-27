<?php include '../db.php';

$roll_no = $_GET['roll_no'];
$result = $conn->query("SELECT * FROM student WHERE roll_no = $roll_no");
$student = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['student_name'];
  $email = $_POST['student_email'];
  $phone = $_POST['student_phone_no'];
  $year = $_POST['year'];
  $session = $_POST['session'];

  $stmt = $conn->prepare("UPDATE student SET student_name=?, student_email=?, student_phone_no=?, year=?, session=? WHERE roll_no=?");
  $stmt->bind_param("sssiii", $name, $email, $phone, $year, $session, $roll_no);
  $stmt->execute();
  $stmt->close();
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Student</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Edit Student</h2>
  <form method="POST">
    <input class="form-control mb-2" value="<?= $student['student_name'] ?>" name="student_name" required>
    <input class="form-control mb-2" value="<?= $student['student_email'] ?>" name="student_email" required>
    <input class="form-control mb-2" value="<?= $student['student_phone_no'] ?>" name="student_phone_no" required>
    <input class="form-control mb-2" value="<?= $student['year'] ?>" name="year" type="number" required>
    <input class="form-control mb-2" value="<?= $student['session'] ?>" name="session" type="number" required>
    <button class="btn btn-primary" type="submit">Update</button>
  </form>
</div>
</body>
</html>
