<?php include '../db.php';

$s_no = $_GET['s_no'];
$stmt = $conn->prepare("SELECT * FROM mentor WHERE s_no = ?");
$stmt->bind_param("i", $s_no);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $designation = $_POST['designation'];
  $email = $_POST['mentor_email'];
  $phone = $_POST['mentor_phone_no'];
  $room = $_POST['mentor_room_no'];

  $stmt = $conn->prepare("UPDATE mentor SET designation=?, mentor_email=?, mentor_phone_no=?, mentor_room_no=? WHERE s_no=?");
  $stmt->bind_param("ssssi", $designation, $email, $phone, $room, $s_no);
  $stmt->execute();
  $stmt->close();
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Mentor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Edit Mentor</h2>
  <form method="POST">
    <input class="form-control mb-2" name="designation" value="<?= $data['designation'] ?>" required>
    <input class="form-control mb-2" name="mentor_email" value="<?= $data['mentor_email'] ?>" required>
    <input class="form-control mb-2" name="mentor_phone_no" value="<?= $data['mentor_phone_no'] ?>" required>
    <input class="form-control mb-2" name="mentor_room_no" value="<?= $data['mentor_room_no'] ?>" required>
    <button class="btn btn-primary" type="submit">Update</button>
  </form>
</div>
</body>
</html>
