<?php include('validate.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Validation</title>
    <link rel="stylesheet" href="style.css">   
</head>

<body>

    <center>

        <h1>Basic PHP Form Validation</h1>
        <form action="index.php" method="POST">
        <legend>*Please fill in the following fields</legend><br>
    <fieldset>
    Name:<br>
    <input type="text" name="name" class="input">
    <span class='error'>*<?=$nameError?></span><br><br>
    
    Email:<br>
    <input type="text" name="email" class="input">
    <span class='error'>*<?=$emailError?></span><br><br>
    
    Gender:
    <input type="radio" name="gender" class="radio" value="Female">Female
    <input type="radio" name="gender" class="radio" value="Male">Male &nbsp;
    <span class='error'>*<?=$genderError?></span><br><br>
    
    Website:<br>
    <input type="text" name="website" class="input">
    <span class='error'>*<?=$websiteError?></span><br><br>
    
    Comment:<br>
    <textarea name="comments" cols="25" rows="5"></textarea>
    <br><br>
    <input type="submit" name="submit" value="Submit Request">
    
    </fieldset>
        </form>

    </center>
<br><br>
<footer>designed by Ashton Naidoo &copy;</footer>
</body>
</html>