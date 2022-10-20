<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input/Ouput data</title>
</head>
<body>
    <form action="b1_input_xuly.php" name="myform" method="post">

    Your Name: <input type="test" name="Name" size=20 value="<?php if(isset($_POST['Name'])) echo $_POST['Name'];?>" />

    <br>

    <input type="submit" value="Submit">

    </form>

    <?php

    if (isset($_POST["Name"]))

        print "Hello " . $_POST["Name"];

    ?>
</body>
</html>