<?php

$nameRequired = "";
$emailRequired = "";
$genderRequired = "";
$websiteRequired = "";

//name
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    if(empty($name)){
        $nameRequired = "Name is required";
    }else{
        $name = userInput($name);
    }
}

//email
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    if(empty($email)){
        $emailRequired = "Email is required";
    }else{
        $email = userInput($email);
    }
}

//gender
if(isset($_POST['submit'])){
    $gender = $_POST['gender'];
    if(empty($gender)){
        $genderRequired = "Gender is required";
    }else{
        $gender = userInput($gender);
    }
}

//website
if(isset($_POST['submit'])){
    $website = $_POST['website'];
    if(empty($website)){
        $websiteRequired = "Website is required";
    }else{
        $website = userInput($website);
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
<?=$nameRequired?><br>

Email:<br>
<input type="text" name="email" class="input">*
<?=$emailRequired?><br>

Gender:<br>
<input type="radio" name="gender" class="radio">Female
<input type="radio" name="gender" class="radio">Male &nbsp;*
<?=$genderRequired?><br>

Website:<br>
<input type="text" name="website" class="input">*
<?=$websiteRequired?><br>

Comment:<br>
<textarea name="comments" cols="25" rows="5"></textarea>
<br><br>
<input type="submit" name="submit" value="submit your request">

</fieldset>
    </form>


</body>
</html>