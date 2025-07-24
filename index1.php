<?php

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Data Upload</title>
  <script>

       function showSuccessPopup() {
  document.getElementById("successPopup").style.visibility = "block";
}

function closePopup() {
  document.getElementById("successPopup").style.visibility = "none";
}
    </script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      background-color: #f9f9f9;
    }
    h2 {
      margin-top: 40px;
      color: #2c3e50;
    }
    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px #ccc;
      margin-bottom: 30px;
    }
    label {
      font-weight: bold;
      display: block;
      margin: 10px 0 5px;
    }
    input, select {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    button {
      padding: 10px 20px;
      border: none;
      background-color: #3498db;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #2980b9;
    }

    
  </style>
</head>
<body>
<form action="upload.php" method="POST" enctype="multipart/form-data" style="text-align:center; margin-top:30px;">
    <label>Select Excel File (.xls or .xlsx):</label><br><br>
    <input type="file" name="excel_file" accept=".xls,.xlsx" required><br><br>
    <button type="submit">Upload</button>
</form>


  <h1>🏗️ Master Data Upload</h1>

  <!-- Add Building -->
    <h2>➕ Add Building</h2>
  <div id="collapseBuildings" class="accordion-collapse collapse">
    <div class="accordion-body">

      <form action="save_building.php" method="post">
        <input type="text" name="building_code" placeholder="Building Code" class="form-control mb-2" required>
        <input type="text" name="building_name" placeholder="Building Name" class="form-control mb-2" required>
        <button type="submit" class="btn btn-success">Save Building</button>
      </form>

      <hr>

      <!-- Bulk Upload -->
      <h5>Bulk Upload Building</h5>
      <form action="upload_buildings.php" method="post" enctype="multipart/form-data">
        <input type="file" name="excelFile" accept=".xls,.xlsx" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Upload Buildings</button>
      </form>

<h2>➕ Add Level</h2>
<form action="save_level.php" method="post">
  <input type="text" name="level_code" placeholder="Level Code" required class="form-control mb-2">
  <input type="text" name="level_name" placeholder="Level Name" required class="form-control mb-2">
 
  <!-- Populate Building Options -->
  <select name="building_code" class="form-control mb-2" required>
    <option value="">Select Building</option>
    <?php

    $conn = new mysqli("localhost", "root", "", "admin");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $result = $conn->query("SELECT building_code, building_name FROM buildings");
    while ($row = $result->fetch_assoc()) {
      echo "<option value='{$row['building_code']}'>{$row['building_name']} ({$row['building_code']})</option>";
    }
    ?>
  </select>

  <button type="submit" class="btn btn-success">Save Level</button>
</form>

    </div>
  </div>
</div>

 <!-- Bulk Upload -->
      <h5>Bulk Upload Level</h5>
      <form action="upload_buildings.php" method="post" enctype="multipart/form-data">
        <input type="file" name="excelFile" accept=".xls,.xlsx" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Upload Buildings</button>
      </form>

  <!-- Add Activity -->
  <h2>➕ Add Activity</h2>
  <form action="upload_activity.php" method="post">
   <input type="text" name="activity_code" placeholder="Activity Code" required class="form-control mb-2">
  <input type="text" name="activity_name" placeholder="Activity Name" required class="form-control mb-2">
  <select name="level_code" class="form-control mb-2">
    <!-- Populate dynamically with building codes -->
    <option value="">Select Level</option>
    <?php

    $conn = new mysqli("localhost", "root", "", "admin");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $result = $conn->query("SELECT level_code, level_name FROM levels");
    while ($row = $result->fetch_assoc()) {
      echo "<option value='{$row['level_code']}'>{$row['level_name']} ({$row['level_code']})</option>";
    }
    ?>
  </select>
  <button type="submit" class="btn btn-success">Save Activity</button>
</form>

    </div>
  </div>
</div>

 <!-- Bulk Upload -->
      <h5>Bulk Upload Activity</h5>
      <form action="upload_buildings.php" method="post" enctype="multipart/form-data">
        <input type="file" name="excelFile" accept=".xls,.xlsx" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Upload Buildings</button>
      </form>

  <!-- Add Task -->
  <h2>➕ Add Task</h2>
  <form action="upload_task.php" method="post">
    <input type="text" name="task_code" placeholder="Task Code" required class="form-control mb-2">
  <input type="text" name="task_name" placeholder="Task Name" required class="form-control mb-2">
  <select name="activity_code" class="form-control mb-2">
    <!-- Populate dynamically with building codes -->
    <option value="">Select Activity</option>

    <?php

    $conn = new mysqli("localhost", "root", "", "admin");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $result = $conn->query("SELECT activity_code, activity_name FROM activites");
    while ($row = $result->fetch_assoc()) {
      echo "<option value='{$row['activity_code']}'>{$row['activity_name']} ({$row['activity_code']})</option>";
    }
    ?>
  </select>
  <button type="submit" class="btn btn-success">Save Task</button>
</form>

    </div>
  </div>
</div>

 <!-- Bulk Upload -->
      <h5>Bulk Upload Task</h5>
      <form action="upload_buildings.php" method="post" enctype="multipart/form-data">
        <input type="file" name="excelFile" accept=".xls,.xlsx" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Upload Buildings</button>
      </form>

  <!-- Add Sub-task -->
  <h2>➕ Add Sub-Task</h2>
  <form action="upload_subtask.php" method="post">
    <input type="text" name="subtask_code" placeholder="subtask Code" required class="form-control mb-2">
  <input type="text" name="subtask_name" placeholder="subtask Name" required class="form-control mb-2">
  <select name="task_code" class="form-control mb-2">
    <!-- Populate dynamically with building codes -->
    <option value="">Select Building</option>
    <?php

    $conn = new mysqli("localhost", "root", "", "admin");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $result = $conn->query("SELECT task_code, task_name FROM tasks");
    while ($row = $result->fetch_assoc()) {
      echo "<option value='{$row['task_code']}'>{$row['task_name']} ({$row['task_code']})</option>";
    }
    ?>
  </select>
  <label>Completion (%):</label>
    <input type="number" name="completion" min="0" max="100" value="0">
  <button type="submit" class="btn btn-success">Save Subtask</button>
</form>

    </div>
  </div>
</div>

 <!-- Bulk Upload -->
      <h5>Bulk Upload Subtask</h5>
      <form action="upload_buildings.php" method="post" enctype="multipart/form-data">
        <input type="file" name="excelFile" accept=".xls,.xlsx" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Upload Buildings</button>
      </form>



  <div id="successPopup" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
        background-color: rgba(0,0,0,0.5); z-index:1000;">

        <div style="background-color:white; padding:20px; border-radius:10px; width:300px; text-align:center;
            position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);">
            <p style="color: #00741fff;">Bulk upload successful!</p>
            <button onclick="closePopup()" style="padding: 8px 20px; background-color: #3498db;
            color: white; border: none; border-radius: 5px;">OK</button>
        </div>
    </div>

</body>
</html>