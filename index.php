<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Database Management Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      transition: 0.3s ease-in-out;
    }

    .card:hover {
      transform: scale(1.02);
    }

    footer {
      margin-top: 50px;
      padding: 20px 0;
      background-color: #343a40;
      color: white;
    }
  </style>
</head>
<body>

<!-- ✅ Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">📚 DB Admin Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="student/index.php">Student</a></li>
        <li class="nav-item"><a class="nav-link" href="mentor/index.php">Mentor</a></li>
        <li class="nav-item"><a class="nav-link" href="internship/index.php">Internship</a></li>
        <li class="nav-item"><a class="nav-link" href="project/index.php">Project</a></li>
        <li class="nav-item"><a class="nav-link" href="second_year_database/index.php">Second Year DB</a></li>
        <li class="nav-item"><a class="nav-link" href="data/index.php">Data</a></li>
        <li class="nav-item"><a class="nav-link" href="training/index.php">Training</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- ✅ Main Content -->
<div class="container mt-5">
  <h2 class="text-center mb-4">📋 Welcome to the Database Management Portal</h2>
  <div class="row row-cols-1 row-cols-md-3 g-4">

    <!-- Card for each table -->
    <?php
    $tables = [
      "Student" => "student/index.php",
      "Mentor" => "mentor/index.php",
      "Internship" => "internship/index.php",
      "Project" => "project/index.php",
      "Second Year DB" => "second_year_database/index.php",
      "Data" => "data/index.php",
      "Training" => "training/index.php",
    ];
    foreach ($tables as $name => $link) {
      echo "
      <div class='col'>
        <div class='card shadow-sm h-100'>
          <div class='card-body text-center'>
            <h5 class='card-title'>$name Table</h5>
            <p class='card-text'>Manage records in the $name table.</p>
            <a href='$link' class='btn btn-primary w-100'>Go to $name</a>
          </div>
        </div>
      </div>";
    }
    ?>
  </div>
</div>

<!-- ✅ Footer -->
<footer class="text-center">
  <div class="container">
    <p class="mb-1">© 2025 Aditi's Database Portal</p>
    <p class="mb-0">This web-based admin panel helps you perform CRUD operations on multiple academic-related tables using PHP and MySQL.</p>
  </div>
</footer>

<!-- Bootstrap JS (optional for navbar toggle) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
