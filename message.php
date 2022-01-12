<?php 
//let's get all form values
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if (!empty($email) && !empty($message)){ //if email and message field is not empty
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // if user entered email is valid
        $receiver = "delishsugarkaromah@gmail.com"; // email receiver email  address
        $subject = "From : $name <$email>"; // subject of the email. Subject looks like From : Fahmi <abc@gmail.coom>
        //merging concating all user values inside body variable. \n is used for new line
        $body = "Name : $name\nEmail: $email\nSubject: $subject\n\nMessage: $message\n\nRegards,\n$email";
        $sender = "From: $email"; //sender email
        if(mail($receiver, $subject, $body, $sender)){ //mail () is a inbuilt php function to send mail
            echo"Your message has been sent";
        } else{
            echo"Sorry, failed to send your message!";
        }
    } else{
        echo"Enter a valid email address!";
    }
} else{
    echo"Email and password field is required!";
}
?>