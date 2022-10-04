<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 6: Tạo form nhập liệu với danh sách dạng combo box</title>
</head>
<body>
    <form method="POST" action="">

    <select name="lunch">

        <option value="pork" <?php if(isset($_POST['lunch'])&& $_POST['lunch']=='pork') echo 'selected';?>>

            BBQ Pork Bun

        </option>

        <option value="chicken" <?php if(isset($_POST['lunch'])&& $_POST['lunch']=='chicken') echo 'selected';?>>

            Chicken Bun

        </option>

        <option value="lotus" <?php if(isset($_POST['lunch'])&& $_POST['lunch']=='lotus') echo 'selected';?>>

            Lotus Seed Bun

        </option>

    </select>

    <input type="submit" name="submit" value="Submit your order">

    </form>

Selected buns:<br/>

<?php

    if (isset($_POST['lunch'])){

        print 'You want a ' . $_POST["lunch"] . ' bun. <br/>';

    }

?>
</body>
</html>