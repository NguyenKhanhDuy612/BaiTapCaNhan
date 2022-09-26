<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bài 2: Tạo form nhập liệu với text field (dạng 2)</title>
</head>
<body>
<form action="" name="myform" method="post">
		First Name: <input type="text" name="Name[]" size=20 value="<?php if(isset($_POST['Name'])) echo $_POST['Name'][0];?>"/><br>
		Last Name: <input type="text" name="Name[]" size=20 value="<?php if(isset($_POST['Name'])) echo $_POST['Name'][1];?>"/><br>
		<input type="submit" value="Submit">
	</form>
	
	<?php
		if (isset($_POST['Name'])){
			echo "Chào bạn " . $_POST['Name'][0] . " " . $_POST['Name'][1];
		}
	?>
</body>
</html>