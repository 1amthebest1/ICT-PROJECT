<?php
// static files

echo "<html>
<head>
  <meta charset=\"UTF-8\">
  <title>Buy Cars!</title>
  <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Raleway\">
  <link rel=\"stylesheet\" href=\"static/style.css\">
</head>
<body>
  <div class=\"titlebar\"> 
    <a class=\"NAV-PLEASE-WORK\" href=\"http://127.0.0.1:8000/phpFiles/upload.php\">Upload-Car</a>
    <a class=\"NAV-PLEASE-WORK\" href=\"http://127.0.0.1:8000/phpFiles/complain.php\">Contact Us</a>
    <a class=\"NAV-PLEASE-WORK\" href=\"http://127.0.0.1:8000/phpFiles/signup.php\">Sign-up</a>
    <a class=\"NAV-PLEASE-WORK\" href=\"http://127.0.0.1:8000/phpFiles/login.php\">Login</a>
  </div>
  <br>
  <table width=\"100%\">

    <!-- ROW 1 -->
    <tr>
      <td align=\"center\">
        <div class=\"imageContainer\">";

         $firstImage=" <img id=\"img1\" class=\"carImage\" src=\"static/Aston Martin.jpg\">";
         echo $firstImage;

        echo "</div>
        <button onclick=\"changeLocation('img1')\" class=\"butn\">Buy</button>
        <!--<button onclick=\"viewContent(document.getElementById('img1').src)\" class=\"butn\">View Details</button>-->
        <a class=\"img1\" class=\"butn\" href=\"static/aston-martin.html\" target=\"_blank\">View Details</a>
      </td>
      <td align=\"center\">
        <div class=\"imageContainer\">";
         $secondImage=" <img id=\"img2\" class=\"carImage\" src=\"static/bugatti.jpg\">";
        echo $secondImage;

        echo "</div>
        <button onclick=\"changeLocation('img2')\" class=\"butn\">Buy</button>
        <!--<button onclick=\"viewContent(document.getElementById('img2').src)\" class=\"butn\">View Details</button>-->
        <a class=\"img2\" class=\"butn\" href=\"static/bugatti.html\" target=\"_blank\">View Details</a>
      </td>
      <td align=\"center\">
        <div class=\"imageContainer\">";
         $thirdImage= "<img id=\"img3\" class=\"carImage\" src=\"static/ferrari.jpg\">";
         echo $thirdImage;
        echo "</div>
        <button onclick=\"changeLocation('img3')\" class=\"butn\">Buy</button>
        <!--<button onclick=\"viewContent(document.getElementById('img3').src)\" class=\"butn\">View Details</button>-->
        <a class=\"img3\" class=\"butn\" href=\"static/ferrari.html\" target=\"_blank\">View Details</a>
      </td>
    </tr>

    <!-- ROW 2 -->
    <tr>
      <td align=\"center\">
        <div class=\"imageContainer\">";
          $fourthImage="<img id=\"img4\" class=\"carImage\" src=\"static/jesko.jpg\">";
          echo $fourthImage;
        echo "</div>
        <button onclick=\"changeLocation('img4')\" class=\"butn\">Buy</button>
        <!--<button onclick=\"viewContent(document.getElementById('img4').src)\" class=\"butn\">View Details</button>-->
        <a class=\"img4\" class=\"butn\" href=\"static/jesko.html\" target=\"_blank\">View Details</a>
      </td>
      <td align=\"center\">
        <div class=\"imageContainer\">";
         $fifthImage="<img id=\"img5\" class=\"carImage\" src=\"static/lambo.jpg\">";
        echo $fifthImage;
        echo "</div>
        <button onclick=\"changeLocation('img5')\" class=\"butn\">Buy</button>
        <!--<button onclick=\"viewContent(document.getElementById('img5').src)\" class=\"butn\">View Details</button>-->
        <a class=\"img5\" class=\"butn\" href=\"static/lamborghini.html\" target=\"_blank\">View Details</a>
      </td>
      <td align=\"center\">
        <div class=\"imageContainer\">";
          $sixthImage="<img id=\"img6\" class=\"carImage\" src=\"static/mclaren.jpg\">";
          echo $sixthImage;
        echo "</div>
        <button onclick=\"changeLocation('img6')\" class=\"butn\">Buy</button>
        <!--<button onclick=\"viewContent(document.getElementById('img6').src)\" class=\"butn\">View Details</button>-->
        <a class=\"img6\" class=\"butn\" href=\"static/mclaren.html\" target=\"_blank\">View Details</a>
      </td>
    </tr>

    <!-- ROW 3 -->
    <tr>
      <td align=\"center\">
        <div class=\"imageContainer\">";
         $seventhImage= "<img id=\"img7\" class=\"carImage\" src=\"static/mg.jpg\">";
         echo $seventhImage;
        echo "</div>
        <button onclick=\"changeLocation('img7')\" class=\"butn\">Buy</button>
        <!--<button onclick=\"viewContent(document.getElementById('img7').src)\" class=\"butn\">View Details</button>-->
        <a class=\"img7\" class=\"butn\" href=\"static/MG.html\" target=\"_blank\">View Details</a>
      </td>
      <td align=\"center\">
        <div class=\"imageContainer\">";
          $eighthImage="<img id=\"img8\" class=\"carImage\" src=\"static/porsche.jpg\">";
          echo $eighthImage;
        echo "</div>
        <button onclick=\"changeLocation('img8')\" class=\"butn\">Buy</button>
        <!--<button onclick=\"viewContent(document.getElementById('img8').src)\" class=\"butn\">View Details</button>-->
        <a class=\"img8\" class=\"butn\" href=\"static/porsche.html\" target=\"_blank\">View Details</a>
      </td>
      <td align=\"center\">
        <div class=\"imageContainer\">";

          $ninthImage="<img id=\"img9\" class=\"carImage\" src=\"static/rolls.jpg\">";
          echo $ninthImage;
        echo "</div>
        <button onclick=\"changeLocation('img9')\" class=\"butn\">Buy</button>
        <!--<button onclick=\"viewContent(document.getElementById('img9').src)\" class=\"butn\">View Details</button>-->
        <a class=\"img9\" class=\"butn\" href=\"static/rolls.html\" target=\"_blank\">View Details</a>
      </td>
    </tr>
  </table>";


include("functions.php");

if(isset($_FILES["yourImage"]) && isset($_POST["car-details"]) && isset($_POST["identifier"])){
  $identifier=$_POST["identifier"];
  
  if($_POST["identifier"] > 9 && $_POST["identifier"] < 16){
    uploadFile($_FILES["yourImage"],$_POST["identifier"],$_POST["car-details"],$_POST["title"]);
  }
  else{
    echo "<script>window.location=\"http://127.0.0.1:8000/phpFiles/error_files/identifier_error.php\"</script>";
  } 
}

echo readUploadedFiles("10"); echo readUploadedFiles("11"); echo readUploadedFiles("12"); echo readUploadedFiles("13"); echo readUploadedFiles("14"); echo readUploadedFiles("15");
echo "
<br><br><br>
<script src=\"static/index.js\"></script>
<a href=\"http://127.0.0.1:8000/phpFiles/complain.php\" id=\"contact-us\">Contact Us</a>
<a href=\"http://127.0.0.1:8000/phpFiles/upload.php\" id=\"upload-car\">Upload Car</a>
</body>
</html>";
?>