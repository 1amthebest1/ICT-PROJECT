<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
/* * {box-sizing: border-box;} */

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<h3>Contact Form</h3>

<div class="container">
  <form action="complain.php" method=" method="POST">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
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