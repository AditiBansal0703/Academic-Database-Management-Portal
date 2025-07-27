<?php include '../db.php';

$s_no = $_GET['s_no'];
$stmt = $conn->prepare("SELECT * FROM training WHERE s_no = ?");
$stmt->bind_param("i", $s_no);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $roll = $_POST['roll_no'];
  $name = $_POST['student_name'];
  $training = $_POST['training_name'];
  $details = $_POST['t_details'];
  $duration = $_POST['duration'];
  $year = $_POST['year'];
  $session = $_POST['session'];

  $stmt = $conn->prepare("UPDATE training SET roll_no=?, student_name=?, training_name=?, t_details=?, duration=?, year=?, session=? WHERE s_no=?");
  $stmt->bind_param("ssssssii", $roll, $name, $training, $details, $duration, $year, $session, $s_no);
  $stmt->execute();
  $stmt->close();
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Training</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Edit Training</h2>
  <form method="POST">
    <input class="form-control mb-2" name="roll_no" value="<?= $data['roll_no'] ?>" required>
    <input class="form-control mb-2" name="student_name" value="<?= $data['student_name'] ?>" required>
    <input class="form-control mb-2" name="training_name" value="<?= $data['training_name'] ?>" required>
    <input class="form-control mb-2" name="t_details" value="<?= $data['t_details'] ?>" required>
    <input class="form-control mb-2" name="duration" value="<?= $data['duration'] ?>" required>
    <input class="form-control mb-2" name="year" value="<?= $data['year'] ?>" required>
    <input class="form-control mb-2" name="session" type="number" value="<?= $data['session'] ?>" required>
    <button class="btn btn-primary" type="submit">Update</button>
  </form>
</div>
</body>
</html>
