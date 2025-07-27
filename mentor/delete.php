<?php include '../db.php';

if (isset($_GET['s_no'])) {
  $s_no = $_GET['s_no'];
  $stmt = $conn->prepare("DELETE FROM mentor WHERE s_no = ?");
  $stmt->bind_param("i", $s_no);
  $stmt->execute();
  $stmt->close();
}

header("Location: index.php");
?>
