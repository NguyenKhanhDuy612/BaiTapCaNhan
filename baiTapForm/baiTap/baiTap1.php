<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1: Tạo form nhập liệu với text field (dạng 1)</title>
</head>
<body>
    <form action=""  name="myform" method="post">
        Tên của bạn: 
        <input type="test" name="Name" size=20 value="<?php if(isset($_POST['Name'])) echo $_POST['Name'];?>" />
        <br>
        <input type="submit" name="" id="" value="Submit">
    </form>
    <?php
        if (isset($_POST["Name"])) {
            echo "Hello".$_POST["Name"];
        }
    ?>
</body>
</html>