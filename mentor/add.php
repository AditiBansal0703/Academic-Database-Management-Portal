<?php include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['mentor_name'];
  $designation = $_POST['designation'];
  $email = $_POST['mentor_email'];
  $phone = $_POST['mentor_phone_no'];
  $room = $_POST['mentor_room_no'];

  // Check for duplicate name
  $check = $conn->prepare("SELECT mentor_name FROM mentor WHERE mentor_name = ?");
  $check->bind_param("s", $name);
  $check->execute();
  $check->store_result();

  if ($check->num_rows > 0) {
    echo "Mentor with this name already exists.";
  } else {
    $stmt = $conn->prepare("INSERT INTO mentor (mentor_name, designation, mentor_email, mentor_phone_no, mentor_room_no) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $designation, $email, $phone, $room);
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
  <title>Add Mentor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="p-4">
<div class="container">
  <h2>Add Mentor</h2>
  <form method="POST">
    <input class="form-control mb-2" name="mentor_name" placeholder="Name" required>
    <input class="form-control mb-2" name="designation" placeholder="Designation" required>
    <input class="form-control mb-2" name="mentor_email" placeholder="Email" required>
    <input class="form-control mb-2" name="mentor_phone_no" placeholder="Phone Number" required>
    <input class="form-control mb-2" name="mentor_room_no" placeholder="Room Number" required>
    <button class="btn btn-success" type="submit">Add</button>
  </form>
</div>
</body>
</html>
