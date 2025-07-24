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
   <h2>⚡ Add Activity</h2>
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

</body>
</html>