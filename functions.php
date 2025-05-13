<?php

    //sign-up code

    function insertDB($name,$email,$password){
        $serverIP="127.0.0.1";
        $user="root";
        $PASSWORD="root";
        $dbName="testDatabase";
        
        $conn = new mysqli($serverIP,$user,$PASSWORD,$dbName); //creates a conn object of mysqli class => initializes connection to the DB

        if($conn->connect_error){
            die("Connection failed" . $conn->econnect_error);
        }
        $stmt = $conn->prepare("INSERT into testTable (username, email, password)  VALUES (?,?,?)");
        $stmt -> bind_param("sss",$name,$email,$password);
        $stmt -> execute();
        $stmt -> close();
        $conn -> close();
    }

    //login code

    function checkDB($email,$password){

        $serverIP="127.0.0.1";
        $user="root";
        $PASSWORD="root";
        $dbName="testDatabase";

        $conn=new mysqli($serverIP,$user,$PASSWORD,$dbName);

        $stmt=$conn->prepare("SELECT * FROM testTable WHERE email=? AND password=?");
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result && $result->num_rows > 0){
            header('Location:http://127.0.0.1:8000/phpFiles/index.php');
        }
        else{
            header('Location:http://127.0.0.1:8000/phpFiles/error_files/login_error.php');
        }
    }

    //upload-code

    function uploadFile($file,$identifier,$carDetails,$title){
        $newFolder=basename($identifier);
        $target_dir = "uploads/".$newFolder. "/";
        shell_exec("mkdir uploads/$newFolder");
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Check if image file is an actual image
        $check = getimagesize($file["tmp_name"]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".<br>";
        } else {
            // echo "File is not an image.<br>";
            $uploadOk = 0;
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            // echo "Sorry, file already exists.<br>";
            $uploadOk = 0;
        }
        
        // Check file size (500 KB limit)
        if ($file["size"] > 500000) {
            // echo "Sorry, your file is too large.<br>";
            $uploadOk = 0;
        }
        
        // Allow only certain file formats
        if(!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            // echo "Sorry, only JPG, JPEG, PNG files are allowed.<br>";
            $uploadOk = 0;
        }
        
        // Upload file if all checks passed
        if ($uploadOk == 1) {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                // echo "The file ". htmlspecialchars(basename($file["name"])) . " has been uploaded.<br>";
                createPage($identifier,$carDetails,$title);
                return $identifier;
            } else {
                // echo "Sorry, there was an error uploading your file.<br>";
            }
        } else {
            // echo "Sorry, your file was not uploaded.<br>";
        }
    }

    function readUploadedFiles($folder){
      $file_location="uploads/" . $folder . "/";  
    if(!is_dir($file_location)) {

    }
    else{
      $result=scandir($file_location);
      $result=array_diff($result,array('.','..'));
      if(!empty($result)){
        $fileName=reset($result);
        $Id=$folder-9;
        $targetId="img".$Id;


        return "<img id=\"$folder\" class=\"carImage\" src=\"$file_location$fileName\" hidden><script>
          newImage = document.getElementById(\"$folder\");
          oldElement = document.getElementById(\"$targetId\");
          if (newImage && oldElement) {
            newImage.removeAttribute(\"hidden\");
            oldElement.replaceWith(newImage);
          }
        </script>
        <script>
          oldLink=document.getElementsByClassName(\"$targetId\")[0];
          newLink=document.createElement(\"a\");
          newLink.className=\"$targetId\";
          newLink.href = `static/$folder.php?id=$folder`;
          newLink.textContent = \"View Details\";
          oldLink.replaceWith(newLink);
        </script>";
        
      }
    }
}

function createPage($identifier, $carDetails, $title) {
    $file = fopen("static/$identifier.php", "w");

    fwrite($file, "<!DOCTYPE html>
<html>
<head>
  <title>$title</title>
  <link href=\"https://fonts.googleapis.com/css?family=Raleway&display=swap\" rel=\"stylesheet\">
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

  <section class=\"Background\">
    <div class=\"box-text\">
        $title
    </div>
  </section>

  <section class=\"content\">
    <div class=\"icon-container\">
      <img class=\"icon-images\" src=\"https://cdn-icons-png.flaticon.com/128/2297/2297498.png\">
      <img class=\"icon-images\" src=\"https://cdn-icons-png.flaticon.com/128/1023/1023757.png\">
      <img class=\"icon-images\" src=\"https://cdn-icons-png.flaticon.com/512/17808/17808282.png\">
    </div>
    <p>
        $carDetails
    </p>
  </section>
  <br>
  <?php
  if (isset(\$_GET[\"id\"])) {
      \$folder = basename(\$_GET[\"id\"]); // Prevent directory traversal
      \$file_location = \"../uploads/\" . \$folder . \"/\";

      if (is_dir(\$file_location) && is_readable(\$file_location)) {
          \$result = scandir(\$file_location);

          if (is_array(\$result)) {
              \$result = array_diff(\$result, array('.', '..'));
              \$filename = reset(\$result);

              if (\$filename) {
                  echo \"<script>document.body.style.backgroundImage = 'url(\\\"../uploads/\$folder/\$filename\\\")';</script>\";
              } else {
                  echo \"<p>No files found in the folder.</p>\";
              }
          } else {
              echo \"<p>Failed to read directory contents.</p>\";
          }
      } else {
          echo \"<p>Directory does not exist or is not readable.</p>\";
      }
  }
?>

</body>
</html>");
}
?>