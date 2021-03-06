<?php

$nameError = "";
$emailError = "";
$genderError = "";
$websiteError = "";

//name
if(isset($_POST['submit'])){    
    if(empty($_POST['name'])){
        $nameError = "Name is required";
    }else{
        $name = userInput($_POST['name']);
        $nameRegex = "/^[a-zA-Z\. ]*$/";
        if(!preg_match($nameRegex, $name)){
            $nameError = "only letters and whitespace allowed";
        }
    }

    //email
if(isset($_POST['submit'])){   
    if(empty($_POST['email'])){
        $emailError = "Email is required";
    }else{
        $email = userInput($_POST['email']);
        $emailRegex = "/[a-zA-Z\.\-\_]{3,}@[a-zA-Z-_.]{3,}[.]{1}[a-zA-Z_.-]{2,}/";
        if(!preg_match($emailRegex, $email)){
            $emailError = "Invalid Emial :(";
        }
    }
}

//gender
if(isset($_POST['submit'])){    
    if(empty($_POST['gender'])){
        $genderError = "Gender is required";
    }else{
        $gender = userInput($_POST['gender']);
    }
}

//website
if(isset($_POST['submit'])){   
    if(empty($_POST['website'])){
        $websiteError = "Website is required";
    }else{
        $website = userInput($_POST['website']);
        $websiteRegex = "/(https:|ftp)\/\/+[a-zA-Z0-9\-\*\$\~\&\!\+\.\`\/\@]+\.[a-zA-Z0-9\-\*\$\~\&\!\+\.\`\/]*/";
        if(!preg_match($websiteRegex, $website)){
            $websiteError = "Invalid Website :(";
        }
    }
}

if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['gender'])&& !empty($_POST['website'])){
    if((preg_match($nameRegex, $name)) && (preg_match($emailRegex, $email)) && (preg_match($websiteRegex, $website))){
        echo "<h1>Your information has been submitted successfully</h1>";
        echo "<h5>**Please check your inbox for confirmation</h5>";
        send_mail();
        /*echo "<h2>Your submitted information:</h2>";
        echo "Name          :   ".ucwords($_POST['name'])."<br>";
        echo "Email Address :   {$_POST['email']}<br>";
        echo "Gender        :   {$_POST['gender']}<br>";
        echo "Website       :   :{$_POST['website']}<br>";
        echo "Comments      :   {$_POST['comments']}<br>";*/
    }else{
        echo "<span class='error'>Please correct your input and re-submit</span>";
    }
}

}

function send_mail(){
//recipient
$to = $_POST['email'];

//subject
$subject = 'Registration Confirmation';

//message
$message = "<h1>Hi there, thank you for registering with us</h1>";
$message .= "<h3>Please find your submitted information below:</h3><br><br>";
$message .= "Name          :   ".ucwords($_POST['name'])."<br>";
$message .= "Email Address :   {$_POST['email']}<br>";
$message .= "Gender        :   {$_POST['gender']}<br>";
$message .= "Website       :   :{$_POST['website']}<br>";
$message .= "Comments      :   {$_POST['comments']}<br>";

//headers
$headers = "From: The Sender Name <ashtonrbay@gmail.com>\r\n";//sender header
$headers .= "Reply-To: ashtonrbay@gmail.com\r\n"; //reply to header
$headers .= "Content-type: text/html\r\n";

mail($to, $subject, $message, $headers);
}

function userInput($data){
    return $data;
}

?>