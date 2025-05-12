<?php
   
    echo "
<html>
<head>
  <style>
        body, h2, form, input, textarea, button {
      margin: 0;
      padding: 0;
    }

    body {
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

    input[type=\"text\"], input[type=\"email\"], input[type=\"password\"], textarea {
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
      color: white;
      border: none;
      opacity: 90%;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.2s ease, transform 0.2s ease;
      width: 100%;
      font-size: 1.2em;
    }

    button:hover {
      background-color: #45a049;
      transform: scale(1.05);
    }

    button:focus {
      outline: 2px solid #45a049;
      outline-offset: 2px;
    }
  </style>

  <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Raleway\">
  <!-- <link rel=\"stylesheet\" href=\"static/style.css\"> modify this path to static/style.css when run on server -->
  <title> Sign Up Page </title>
</head>
<body>
  <!-- <img class=\"image-background\" src=\"https://img.freepik.com/free-photo/3d-rendering-hexagonal-texture-background_23-2150796421.jpg?semt=ais_hybrid&w=740&h=1000\"> -->
  <div class=\"form-container\">
    <h2>Login to Enter </h2>

    <form action=\"http://127.0.0.1:8000/phpFiles/login.php\" method=\"POST\">
      <div class=\"form-group\">
        <label for=\"email\">Email:</label>
        <input type=\"email\" id=\"email\" name=\"email\" placeholder=\"Enter your email address\" required>
      </div>

      <div class=\"form-group\">
        <label for=\"password\">Password:</label>
        <input type=\"password\" name=\"password\" id=\"password\" placeholder=\"Enter your Password\" required>
      </div>
      <button type=\"submit\">Submit</button>
    </form>

  </div>
  <script>window.alert(\"wrong password\")</script>

</body>
</html>
";
    include("functions.php");

    if(isset($_POST["email"]) && isset($_POST["password"])){

        $email=$_POST["email"];
        $password=$_POST["password"];

        checkDB($email,$password);
    };
?>