<?php   

echo
"<html>
<body>
<form action=\"http://127.0.0.1:8000/phpFiles/index.php\" method=\"POST\" enctype=\"multipart/form-data\">
    <!-- Car Details Input -->
    <label for=\"car-details\">Enter Car Details</label>
    <input id=\"car-details\" type=\"text\" name=\"car-details\" required>
    
    <br><br>
    
    <!-- File Upload Input -->
    <label for=\"yourImage\">Upload your image</label>
    <input type=\"file\" name=\"yourImage\" id=\"yourImage\" required>
    
    <br><br>

     <!-- File Identifier -->
    <label for=\"identifier\">identifier</label>
    <input type=\"text\" name=\"identifier\" id=\"identifier\" required>
    
    <br><br>
    
    <!-- Submit Button -->
    <button type=\"submit\">Submit</button>
</form>
<script>window.alert(\"Identifier should be number from 10 to 15\")</script>
</body>
</html>";


?>