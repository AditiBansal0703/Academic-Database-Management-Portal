<?php include '../db.php';

if (isset($_GET['roll_no'])) {
  $roll = $_GET['roll_no'];
  $stmt = $conn->prepare("DELETE FROM student WHERE roll_no = ?");
  $stmt->bind_param("i", $roll);
  $stmt->execute();
  $stmt->close();
}

header("Location: index.php");
?>
