<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f7f9fc;
    }
    .poster-card {
      border-radius: 40px;
      padding: 30px;
      background: linear-gradient(135deg, #ffffff, #e3f2fd);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .poster-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 25px rgba(0,0,0,0.2);
    }
    .poster-icon {
      font-size: 3rem;
      margin-bottom: 10px;
    }
    .poster-title {
      font-weight: bold;
      font-size: 1.5rem;
      margin-bottom: 5px;
    }
    .poster-description {
      color: #555;
      font-size: 1rem;
    }
    a:hover{
      transform: translateY(-5px);
       box-shadow: 0 15px 25px rgba(0,0,0,0.2);
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;

    }
  </style>
</head>
<body>

  </br>
    <img src="images/azizi-logo-black.png" alt="Logo" width="200" height="50">
     <img src="images/Gardinia.png" style="float: right;" alt="Logo" width="200" height="60">
  

<div class="container py-5">
  <h2 class="text-center mb-5">🛠️ Master Data Control Panel</h2>
  <div class="row justify-content-center g-4">
    <!-- Repeatable Poster Buttons -->
    <div class="col-md-4">
      <div class="poster-card text-center" onclick="goToPage('Buildings')">
        <div class="poster-icon">🏢</div>
        <div class="poster-title">Building Master</div>
        <a href="manual_building_upload.php" class="btn btn-success upload-btn">Add</a>
        <a href="bulk_building_upload.php" class="btn btn-success upload-btn">Upload</a>
        <a href="delete.php" class="btn btn-success upload-btn">Delete</a>
        <div class="poster-description">Manage Building Records</div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="poster-card text-center" onclick="goToPage('Levels')">
        <div class="poster-icon">📶</div>
        <div class="poster-title">Level Master</div>
        <a href="manual_level_upload.php" class="btn btn-success upload-btn">Add</a>
        <a href="bulk_level_upload.php" class="btn btn-success upload-btn">Upload</a>
        <a href="delete_level.php" class="btn btn-success upload-btn">Delete</a>
        <div class="poster-description">Organize Level Data</div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="poster-card text-center" onclick="goToPage('Activities')">
        <div class="poster-icon">⚡</div>
        <div class="poster-title">Activity Master</div>
        <a href="manual_activity_upload.php" class="btn btn-success upload-btn">Add</a>
        <a href="bulk_activity_upload.php" class="btn btn-success upload-btn">Upload</a>
        <a href="delete_activity.php" class="btn btn-success upload-btn">Delete</a>
        <div class="poster-description">Track Ongoing Activities</div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="poster-card text-center" onclick="goToPage('Tasks')">
        <div class="poster-icon">✅</div>
        <div class="poster-title">Task Master</div>
        <a href="manual_task_upload.php" class="btn btn-success upload-btn">Add</a>
        <a href="bulk_task_upload.php" class="btn btn-success upload-btn">Upload</a>
        <a href="delete_task.php" class="btn btn-success upload-btn">Delete</a>
        <div class="poster-description">View Assigned Tasks</div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="poster-card text-center" onclick="goToPage('Users')">
        <div class="poster-icon">👤➕🆕👤</div>
        <div class="poster-title">User Management</div>
        <a href="add_new_user.php" class="btn btn-success upload-btn">Add</a>
        <a href="bulk_user_upload.php" class="btn btn-success upload-btn">Upload</a>
        <a href="delete_user.php" class="btn btn-success upload-btn">Delete</a>
        <div class="poster-description">View Users Details</div>
      </div>
    </div>

<script>
  function goToPage(tableName) {
    switch (tableName) {
      case 'Buildings': window.location.href = 'building.php'; break;
      case 'Levels': window.location.href = 'level.php'; break;
      case 'Activities': window.location.href = 'activities.php'; break;
      case 'Tasks': window.location.href = 'tasks.php'; break;
      case 'Users': window.location.href = 'users.php'; break;
    }
  }
</script>
</body>
</html>