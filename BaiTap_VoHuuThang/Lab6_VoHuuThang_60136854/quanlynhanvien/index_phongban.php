<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh sách phòng ban</title>
</head>
<body>
	

	<?php 
	include('connect.php');
	include('layout.php');
	//include('session.php'); //Trong layout có rồi nên sẽ không cần nữa
	?>



	<div class="container">
		<div>
			<h2 class="text-center" style="color: blue;">Danh sách nhân viên</h2>
            <button type="button" class="btn btn-default btn-lg"><a href="them_phongban.php">Thêm phòng ban</a></button>
            <form action="index_phongban.php" method="get">
                <input name="keyword" placeholder="" value="">
                <input type="submit" value="Tìm phòng ban">
            </form>
			<table class="table table-info table-striped">
				<thead>
					<tr>
						<th>Mã phòng ban</th>
						<th>Tên phòng ban</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php 
						$row_sql="SELECT MaPhongBan,TenPhongBan from phongban";
                        if (!empty($_GET['keyword']))
                        {
                            $search = $_GET['keyword'];
                            $row_sql="SELECT MaPhongBan,TenPhongBan from phongban WHERE TenPhongBan like '%$search%'";                           
                        }
						$row_thuchien=mysqli_query($abc,$row_sql);
//                        var_dump(mysqli_fetch_array($row_thuchien));
						while($dulieu =mysqli_fetch_array($row_thuchien)){
							?>
							<td><?php echo $dulieu['MaPhongBan']; ?></td>
							<td><?php echo $dulieu['TenPhongBan']; ?> </td>
							<td>
								<a onclick=" return confirm('bạn có chắc muốn sửa không')" href="sua_phongban.php?id=<?php echo $dulieu['MaPhongBan'] ?>" title="sửa"><img src="images/sua.png" width="25px">
								</a>
							</td>
							<td>
								<a onclick=" return confirm('bạn có chắc muốn xóa không') " href="xoa_phongban.php?id=<?php echo $dulieu['MaPhongBan']; ?>" ><img src='images/xoa.jpg' width='25px' >
								</a>
							</td>
						</tr>					
					<?php 	} ?>
				</tbody>
			</table>
		</div>
	</div>


</body>
</html>
<?php
	include('footer.php');
?>
