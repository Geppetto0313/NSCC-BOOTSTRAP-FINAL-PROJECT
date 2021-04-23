<?php

    //store error messages and data
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $email = test_input($_POST["email"]);

    //Error checking    
    $errors = 0;
    $errorMessage = "";

    if ($email == "") { $errors = 1; $errorMessage = "Email Is Required"; }
    if ($subject == "") { $errors = 2; $errorMessage = "Subject Is Required"; }
    if ($message == "") { $errors = 3; $errorMessage = "Message Is Required"; }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors = 4; $errorMessage = "Invalid Email Format"; }
    //send message if errors or Ok if not.
    if ($errors != 0){
        echo "errors detected: $errorMessage";
    }else {

        echo "OK";
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

?>