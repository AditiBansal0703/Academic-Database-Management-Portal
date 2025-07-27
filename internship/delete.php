<?php include '../db.php';

if (isset($_GET['sr_no'])) {
  $sr_no = $_GET['sr_no'];
  $stmt = $conn->prepare("DELETE FROM internship WHERE `Sr. No` = ?");
  $stmt->bind_param("d", $sr_no);
  $stmt->execute();
  $stmt->close();
}

header("Location: index.php");
?>
