<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Loại nhân viên</title>
</head>
<body>
	<?php
		include_once('connect.php');
		if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
		$id=$_GET['id'];
		$sql = "DELETE FROM loainv WHERE MaLoaiNV='$id'";
		if ($abc->query($sql) === TRUE) {
		echo '<div class="alert alert-success"><strong>Thành công!</strong> Loại nhân viên đã được xóa.</div>';
		include('index_loainhanvien.php');
		} else {
		echo "Error updating record: " . $abc->error;
		}

		$abc->close();
		}
	?>
	<a href="javascript:window.history.back(-1);">Quay lại</a>
</body>
</html>