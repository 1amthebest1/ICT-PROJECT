
<html>
<head>
  <style>
        body, h2, form, input, textarea, button {
      margin: 0;
      padding: 0;
    }

    body {
      background-image: url("static/horror-scene-with-eerie-hall_23-2150975360.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      font-family: Raleway;
      background-color: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      overflow: hidden; 
      position: relative;
    }

    .image-background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover; 
      z-index: -1; 
    }
    .form-container {
      background-color: rgba(46, 41, 41, 0.8); 
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 450px;
      text-align: center;
      box-sizing: border-box;
      z-index: 1; 
    }

    h2 {
      margin-bottom: 30px;
      color: #d3d2d0;
      font-size: 1.8em;
    }

    .form-group {
      margin-bottom: 20px;
      opacity: 90%;
      text-align: left;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #d1d0cf;
      font-size: 1.1em;
    }

    input[type="text"], input[type="email"], input[type="password"], textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
      font-size: 1em;
      font-family: Raleway;
      background-color: #444141;
      color: #d3d1c7;
      transition: border-color 0.3s ease;
    }

    input:focus, textarea:focus {
      border-color: #d4d2cc;
      outline: none;
    }

    textarea {
      resize: vertical;
      min-height: 120px;
    }

    button {
      padding: 12px 18px;
      background-color: #d3d1c7;
      font-family: Raleway;
      color: rgb(29, 22, 22);
      border: none;
      opacity: 90%;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.2s ease, transform 0.2s ease;
      width: 100%;
      font-size: 1.2em;
    }

    button:hover {
      background-color: #5ee4e4;
      transform: scale(1.05);
    }

    button:focus {
      outline: 2px solid #45a049;
      outline-offset: 2px;
    }
    #myP{
      margin-top: 17px;
      color:#ccc;
      font-weight: bold;
    }
    #myLink{
      font-size: 20px;
      text-decoration: none;
      background-color: #d1d0cf;
      border-radius: 10px;
      padding-top: 8px;
      padding-bottom: 8px;
      padding-left: 12px;
      padding-right: 12px;
    }
    #myLink:hover {
      background-color: #5ee4e4;
      transform: scale(1.05);
    }
    #myLink:focus {
      outline: 2px solid #45a049;
      outline-offset: 2px;
    }
  </style>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <!-- <link rel="stylesheet" href="static/style.css"> modify this path to static/style.css when run on server -->
  <title>Complain Page</title>
</head>
<body>
  <!-- <img class="image-background" src="https://img.freepik.com/free-photo/3d-rendering-hexagonal-texture-background_23-2150796421.jpg?semt=ais_hybrid&w=740&h=1000"> -->
  <div class="form-container">
    <h2>Submit Your Complain</h2>

    <form action="complain.php" method="GET">

      <div class="form-group">
        <label for="name">First-Name:</label>
        <input type="text" id="name" name="firstname" placeholder="Enter your first name" required>
      </div>

      <div class="form-group">
        <label for="last-name">Last-Name:</label>
        <input type="text" id="name" name="lastname" placeholder="Enter your last name" required>
      </div>

      <div class="form-group">
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" placeholder="Enter your country" required>
      </div>

      <div class="form-group">
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" placeholder="Enter your Subject" required>
      </div>

      <button class="buttons" type="submit">Submit</button>
      <br>

    </form>

  </div>

</body>
</html>

<!-- firstname=hi&lastname=ihi&country=australia&subject=hih -->
<?php
    if(isset($_GET["firstname"]) && isset($_GET["lastname"]) && isset($_GET["country"]) && isset($_GET["subject"])){

        insertComplains($_GET["firstname"],$_GET["lastname"],$_GET["country"],$_GET["subject"]);
    }
    function insertComplains($firstname,$lastname,$country,$subject){

        $server_name="127.0.0.1";
        $name="root";
        $password="root";
        $database_name="testDatabase";

        $conn=new mysqli($server_name,$name,$password,$database_name);

        $stmt=$conn->prepare("INSERT into complains (firstname, lastname, country, subject) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$firstname,$lastname,$country,$subject);

        $stmt->execute();

        $stmt->close();
        $conn->close();
    }
?>