<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tính dãy số</title>
</head>
<body>
	<?php
		if(isset($_POST['dayso'])){
			$dayso=trim($_POST['dayso']);
		}
		else{
			$dayso=0;
			$tongdayso=0;
		}
		if(isset($_POST['btntongdayso'])){
			if(empty($_POST['dayso'])){
				echo "Không để trống!";
				$tongdayso="Đầu vào không xác định";
			}
			else{
				$mang=$_POST['dayso'];
				$mang=explode(",", $mang);
				$tongdayso=array_sum($mang);
			}
		}
	?>
	<form method="post" action="">
		<table>
			<tr colspan="2">
				<th colspan="2">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
			</tr>
			<tr>
				<td>Nhập dãy số: </td>
				<td><input type="text" name="dayso" value="<?php echo "$dayso"; ?>" >(*)</td>
			</tr>
			<tr>
				<td></td>
			<td><input type="submit"name="btntongdayso" value="Tổng dãy số"></td>
			</tr>
			<tr>
				<td>Tổng dãy số: </td>
				<td><input type="text" name="tongdayso" disabled="disabled" value="<?php echo "$tongdayso"; ?>"></td>
			</tr>
		</table>
		<h4>(*) Các số nhập cách nhau bằng dấu ","</h4>
	</form>
</body>
</html>