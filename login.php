<?php    
    //dynamic files
    include("functions.php");
    
    if(isset($_POST["email"]) && isset($_POST["password"])){
        
        $email=$_POST["email"];
        $password=$_POST["password"];
        
        checkDB($email,$password);
    };
    include("static/login.html");
    ?>