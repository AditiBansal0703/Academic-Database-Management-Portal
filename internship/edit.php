<?php include '../db.php';

$sr_no = $_GET['sr_no'];
$stmt = $conn->prepare("SELECT * FROM internship WHERE `Sr. No` = ?");
$stmt->bind_param("d", $sr_no);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $roll = $_POST['roll_number'];
  $name = $_POST['student_name'];
  $email = $_POST['email_id'];
  $place = $_POST['training_place'];
  $faculty = $_POST['faculty_evaluator'];
  $mode = $_POST['mode'];
  $year = $_POST['year'];
  $session = $_POST['session'];

  $stmt = $conn->prepare("UPDATE internship SET `Roll_number`=?, `Name of the Students`=?, `Email ID`=?, `Place of Training`=?, `Assigned Faculty Member for Evaluation`=?, `Mode`=?, `Year`=?, `session`=? WHERE `Sr. No`=?");
  $stmt->bind_param("sssssssdd", $roll, $name, $email, $place, $faculty, $mode, $year, $session, $sr_no);
  $stmt->execute();
  $stmt->close();
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Internship</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Edit Internship</h2>
  <form method="POST">
    <input class="form-control mb-2" name="roll_number" value="<?= $data['Roll_number'] ?>" required>
    <input class="form-control mb-2" name="student_name" value="<?= $data['Name of the Students'] ?>" required>
    <input class="form-control mb-2" name="email_id" value="<?= $data['Email ID'] ?>" required>
    <input class="form-control mb-2" name="training_place" value="<?= $data['Place of Training'] ?>" required>
    <input class="form-control mb-2" name="faculty_evaluator" value="<?= $data['Assigned Faculty Member for Evaluation'] ?>" required>
    <input class="form-control mb-2" name="mode" value="<?= $data['Mode'] ?>" required>
    <input class="form-control mb-2" name="year" value="<?= $data['Year'] ?>" required>
    <input class="form-control mb-2" name="session" type="number" step="any" value="<?= $data['session'] ?>" required>
    <button class="btn btn-primary" type="submit">Update</button>
  </form>
</div>
</body>
</html>
