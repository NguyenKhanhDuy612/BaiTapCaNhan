<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 7: Tạo form nhập liệu với danh sách dạng list box</title>
</head>
<body>
<form method="POST" action="">

<select name="lunch[]" multiple>

    <option value="pork"  selected>

        BBQ Pork Bun

    </option>

    <option value="chicken">

        Chicken Bun

    </option>

    <option value="lotus">

        Lotus Seed Bun

    </option>

</select>

<p>

<input type="submit" name="submit" value="Submit your order">

</form>
Selected buns:<br/>

<?php

	if (isset($_POST['lunch'])) {

		foreach ($_POST['lunch'] as $choice) {

	    	print "You want a $choice bun. <br/>";

		}

		

	}

?>
</body>
</html>