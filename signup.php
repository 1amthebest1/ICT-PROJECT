<?php
    // static files
    
    //dynamic files
    include("static/signup.html");
    include("functions.php");

    if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])){

        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=$_POST["password"];

        insertDB($name,$email,$password);
        header('Location:http://127.0.0.1:8000/phpFiles/index.php');
    };
?>
