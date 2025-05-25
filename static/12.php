<!DOCTYPE html>
<html>
<head>
  <title>mytit</title>
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Raleway', sans-serif;
      color: #333;
    }

    .Background {
      background-size: cover;
      background-position: center;
      height: 100vh;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .box-text {
      background: rgba(0, 0, 0, 0.6);
      color: white;
      padding: 30px 60px;
      border-radius: 10px;
      font-size: 3em;
      text-align: center;
    }

    .content {
      max-width: 900px;
      margin-top: 40px;
      margin-left: 170px;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.95);
      border-radius: 8px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      line-height: 1.8;
      font-size: 1.1em;
      overflow: auto;
    }

    .icon-container {
      float: right;
      margin-left: 20px;
    }

    .icon-images {
      display: block;
      width: 50px;
      height: 50px;
      margin-bottom: 10px;
      margin-top: 5px;
      margin-right: 10px;
    }
  </style>
</head>
<body>

  <section class="Background">
    <div class="box-text">
        mytit
    </div>
  </section>

  <section class="content">
    <div class="icon-container">
      <img class="icon-images" src="https://cdn-icons-png.flaticon.com/128/2297/2297498.png">
      <img class="icon-images" src="https://cdn-icons-png.flaticon.com/128/1023/1023757.png">
      <img class="icon-images" src="https://cdn-icons-png.flaticon.com/512/17808/17808282.png">
    </div>
    <p>
        myCar
    </p>
  </section>
  <br>
  <?php
  if (isset($_GET["id"])) {
      $folder = basename($_GET["id"]); // Prevent directory traversal
      $file_location = "../uploads/" . $folder . "/";

      if (is_dir($file_location) && is_readable($file_location)) {
          $result = scandir($file_location);

          if (is_array($result)) {
              $result = array_diff($result, array('.', '..'));
              $filename = reset($result);

              if ($filename) {
                  echo "<script>document.body.style.backgroundImage = 'url(\"../uploads/$folder/$filename\")';</script>";
              } else {
                  echo "<p>No files found in the folder.</p>";
              }
          } else {
              echo "<p>Failed to read directory contents.</p>";
          }
      } else {
          echo "<p>Directory does not exist or is not readable.</p>";
      }
  }
?>

</body>
</html>