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
        $nameRegex = "/^[a-zA-Z. ]*$/";
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
        $emailRegex = "/[a-zA-Z.-_]{3,}@[a-zA-Z-_.]{3,}[.]{1}[a-zA-Z_.-]{2,}/";
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
        echo "<h2>Your submitted information:</h2>";
        echo "Name          :   ".ucwords($_POST['name'])."<br>";
        echo "Email Address :   {$_POST['email']}<br>";
        echo "Gender        :   {$_POST['gender']}<br>";
        echo "Website       :   :{$_POST['website']}<br>";
        echo "Comments      :   {$_POST['comments']}<br>";
    }else{
        echo "Please correct your input and re-submit";
    }
}

}

function userInput($data){
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Validation</title>
</head>
<body>
    
    <form action="index.php" method="POST">
<fieldset>

<legend>Please fill in the following fields</legend>
Name:<br>
<input type="text" name="name" class="input">*
<?=$nameError?><br>

Email:<br>
<input type="text" name="email" class="input">*
<?=$emailError?><br>

Gender:<br>
<input type="radio" name="gender" class="radio" value="Female">Female
<input type="radio" name="gender" class="radio" value="Male">Male &nbsp;*
<?=$genderError?><br>

Website:<br>
<input type="text" name="website" class="input">*
<?=$websiteError?><br>

Comment:<br>
<textarea name="comments" cols="25" rows="5"></textarea>
<br><br>
<input type="submit" name="submit" value="submit your request">

</fieldset>
    </form>


</body>
</html>