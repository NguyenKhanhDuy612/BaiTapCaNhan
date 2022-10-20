<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Phòng ban</title>
</head>
<body>
	<?php
		include_once('connect.php');
		if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
		$id=$_GET['id'];
		$sql = "DELETE FROM phongban WHERE MaPhongBan='$id'";
		if ($abc->query($sql) === TRUE) {
		echo '<div class="alert alert-success"><strong>Thành công!</strong> Một phòng ban đã được xóa.</div>';
		include('index_phongban.php');
		} else {
		echo "Error updating record: " . $abc->error;
		}

		$abc->close();
		}
	?>
	<a href="javascript:window.history.back(-1);">Quay lại</a>
</body>
</html>