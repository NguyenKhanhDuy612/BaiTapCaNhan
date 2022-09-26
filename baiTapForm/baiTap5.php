<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5: Tạo form nhập liệu với hộp kiểm radio button</title>
</head>
<body>
    <form action="" name="myform" method="post">
        <input type="radio" name="radGT" value="Nam"
            <?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nam') 
            echo 'checked="checked"';?> checked/>		
            Nam<br>
        <input type="radio" name="radGT" value="Nu" <?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nu') 
        echo 'checked="checked"';?>/>
                Nữ<br>

        <input type="submit" value="Submit">
    </form>

    <?php
		if (isset($_POST['radGT'])){
			echo "Gioi tinh : " . $_POST['radGT'];
		}
	?>
</body>
</html>