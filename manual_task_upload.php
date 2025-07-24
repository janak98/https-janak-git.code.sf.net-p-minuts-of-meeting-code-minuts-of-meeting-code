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
      text-align:center;
    }
    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px #ccc;
      margin-bottom: 30px;
      margin-left: 20%;
      margin-right: 20%;
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
    h1{
      text-align:center;
    }

    
  </style>
</head>
<body>

 <img src="images/azizi-logo-black.png" alt="Logo" width="200" height="60">
     <img src="images/Gardinia.png" style="float: right;" alt="Logo" width="200" height="60">

  <h1>🏗️ Master Data Upload</h1>

  <!-- Add Building -->
   <h2>✅ Add Task</h2>
  <form action="upload_activity.php" method="post">
   <input type="text" name="activity_code" placeholder="Activity Code" required class="form-control mb-2">
  <input type="text" name="activity_name" placeholder="Activity Name" required class="form-control mb-2">
  <select name="level_code" class="form-control mb-2">
    <!-- Populate dynamically with building codes -->
    <option value="">Select Activity</option>
    <?php

    $conn = new mysqli("localhost", "root", "", "admin");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $result = $conn->query("SELECT activity_code, activity_name FROM activities");
    while ($row = $result->fetch_assoc()) {
      echo "<option value='{$row['activity_code']}'>{$row['activity_name']} ({$row['activity_code']})</option>";
    }
    ?>
  </select>
   <label>Completion (%):</label>
    <input type="number" name="completion" min="0" max="100" value="0">
  <button type="submit" class="btn btn-success">Save Task</button>
</form>

    </div>
  </div>
</div>

</body>
</html>