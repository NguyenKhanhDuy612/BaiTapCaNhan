<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thêm phòng ban</title>
</head>
<body>
<?php 
	require('connect.php');
	include('layout.php');
?>
<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
	$errors=array(); //khởi tạo 1 mảng chứa lỗi
	//kiem tra ma sua
	if(empty($_POST['ma_pb'])){
		$errors[]="Bạn chưa nhập mã phòng ban";
	}
	else{
		$ma_pb=trim($_POST['ma_pb']);
	}
	//kiểm tra tên sản phẩm
	if(empty($_POST['ten_pb'])){
		$errors[]="Bạn chưa nhập tên phòng ban";
	}
	else{
		$ten_pb=trim($_POST['ten_pb']);
	}
	if(empty($errors))//neu khong co loi xay ra
	{ 
		$query="INSERT INTO phongban VALUES ('$ma_pb','$ten_pb')";
		$result=mysqli_query($abc,$query);
		if(mysqli_affected_rows($abc)==1){//neu them thanh cong
			echo '<div class="alert alert-success"><strong>Thành công!</strong> Một phòng ban mới đã được thêm.</div>';				
		}
		else //neu khong them duoc
		{
			echo "<p>Có lỗi, không thể thêm được</p>";
			echo "<p>".mysqli_error($abc)."<br/><br />Query: ".$query."</p>";	
		}
	}
	else
	{//neu co loi
		echo "<h2></h2><p>Có lỗi xảy ra:<br/>";
		foreach($errors as $msg)
		{
			echo "- $msg<br /><\n>";
		}
		echo "</p><p>Hãy thử lại.</p>";
	}
}
mysqli_close($abc);
?>
<form action="" method="post" enctype="multipart/form-data">
<table bgcolor="#eeeeee" align="center" width="60%" border="0">
<tr bgcolor="#eeee10">
	<td colspan="2" align="center"><font color="blue"><h2>THÊM PHÒNG BAN MỚI</h2></font></td>
</tr>
<tr>
	<td>Mã phòng ban: </td>
	<td><input type="text" name="ma_pb" size="30" value="<?php if(isset($_POST['ma_pb'])) echo $_POST['ma_pb'];?>" /></td>
</tr>
<tr>
	<td>Tên phòng ban: </td>
	<td><input type="text" name="ten_pb" size="30" value="<?php if(isset($_POST['ten_pb'])) echo $_POST['ten_pb'];?>" /></td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" name ="them" size="10" value="Thêm mới" /></td>
</tr>
</table>
</form>
</body>
</html>
<?php
	include('footer.php');
?>
