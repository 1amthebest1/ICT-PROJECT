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

    function uploadFile($file,$identifier,$carDetails){
        $newFolder=basename($identifier);
        $target_dir = "uploads/".$newFolder. "/";
        shell_exec("mkdir uploads/$newFolder");
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        // Check if image file is an actual image
        $check = getimagesize($file["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".<br>";
        } else {
            //echo "File is not an image.<br>";
            $uploadOk = 0;
        }
    
        // Check if file already exists
        if (file_exists($target_file)) {
            //echo "Sorry, file already exists.<br>";
            $uploadOk = 0;
        }
    
        // Check file size (500 KB limit)
        if ($file["size"] > 500000) {
            //echo "Sorry, your file is too large.<br>";
            $uploadOk = 0;
        }
    
        // Allow only certain file formats
        if(!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            //echo "Sorry, only JPG, JPEG, PNG files are allowed.<br>";
            $uploadOk = 0;
        }
    
        // Upload file if all checks passed
        if ($uploadOk == 1) {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                //echo "The file ". htmlspecialchars(basename($file["name"])) . " has been uploaded.<br>";
                return $identifier;
            } else {
                //echo "Sorry, there was an error uploading your file.<br>";
            }
        } else {
            //echo "Sorry, your file was not uploaded.<br>";
        }
    }

    function readUploadedFiles($folder){
        
      $file_location="uploads/" . $folder . "/";  

      if (!is_dir($file_location)) {

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
        </script>";

      }
    }
}
?>