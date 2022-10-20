<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh sách loại nhân viên</title>
</head>
<body>	
	<?php 
	include('connect.php');
	include('layout.php');
	?>
	<div class="container">
		<div>
			<h2 class="text-center" style="color: blue;">Danh sách loại nhân viên</h2>
            <button type="button" class="btn btn-default btn-lg"><a href="them_loainhanvien.php">Thêm loại nhân viên</a></button>
            <form action="index_loainhanvien.php" method="get">
                <input name="keyword" placeholder="" value="">
                <input type="submit" value="Tìm loại nhân viên">
            </form>
			<table class="table table-info table-striped">
				<thead>
					<tr>
						<th>Mã loại nhân viên</th>
						<th>Tên loại nhân viên</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php 
						$row_sql="SELECT MaLoaiNV,TenLoaiNV from loainv";
                        if (!empty($_GET['keyword']))
                        {
                            $search = $_GET['keyword'];
                            $row_sql="SELECT MaLoaiNV,TenLoaiNV from loainv WHERE TenLoaiNV like '%$search%'";                           
                        }
						$row_thuchien=mysqli_query($abc,$row_sql);
//                        var_dump(mysqli_fetch_array($row_thuchien));
						while($dulieu =mysqli_fetch_array($row_thuchien)){
							?>
							<td><?php echo $dulieu['MaLoaiNV']; ?></td>
							<td><?php echo $dulieu['TenLoaiNV']; ?> </td>
							<td>
								<a onclick=" return confirm('Bạn có chắc muốn sửa không')" href="sua_nhanvien.php?id=<?php echo $dulieu['MaLoaiNV'] ?>" title="sửa"><img src="images/sua.png" width="25px">
								</a>
							</td>
							<td>
								<a onclick=" return confirm('Bạn có chắc muốn xóa không') " href="xoa_loainhanvien.php?id=<?php echo $dulieu['MaLoaiNV']; ?>" ><img src='images/xoa.jpg' width='25px' >
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