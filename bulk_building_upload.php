<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload Building Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f8fb;
    }
    .upload-panel {
      background-color: #ffffff;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      transition: all 0.3s ease-in-out;
    }
    .upload-panel:hover {
      transform: translateY(-5px);
    }
    .upload-title {
      font-size: 1.4rem;
      font-weight: 600;
      margin-bottom: 15px;
    }
    .upload-desc {
      font-size: 0.95rem;
      color: #666;
      margin-bottom: 20px;
    }
    .upload-btn {
      padding: 10px 25px;
      font-weight: 500;
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


<div class="container py-5">
  <h2 class="text-center mb-4">🏢 Building Data Upload</h2>
  <div class="row justify-content-center g-4">

    <!-- Bulk Upload Section -->
    <div class="col-md-6">
      <div class="upload-panel text-center">
        <div class="upload-title">Bulk Upload</div>
        <div class="upload-desc">Use an Excel file to upload multiple buildings at once.</div>

      <form action="upload_buildings.php" method="post" enctype="multipart/form-data">
        <input type="file" name="excelFile" accept=".xls,.xlsx" class="form-control mb-2" required></br>
        <button type="submit" class="btn btn-primary upload-btn">Upload Buildings</button>
      </form>
    </div>

  </div>
</div>

</body>
</html>