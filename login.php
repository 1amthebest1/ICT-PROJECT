<?php
    // static files
    
    //dynamic files
    include("static/login.html");
    include("functions.php");

    if(isset($_POST["email"]) && isset($_POST["password"])){

        $email=$_POST["email"];
        $password=$_POST["password"];

        checkDB($email,$password);
    };
?>