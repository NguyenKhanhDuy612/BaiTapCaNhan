<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh sách nhân viên</title>
</head>
<body>
	

	<?php 
	include('connect.php');
	include('layout.php');
	?>



	<div class="container">
		<div>
			<h2 class="text-center" style="color: blue;">Danh sách nhân viên</h2>
            <button type="button" class="btn btn-default btn-lg"><a href="them_nhanvien.php">Thêm nhân viên</a></button>
            <form action="index_nhanvien.php" method="get">
                <input name="keyword" placeholder="" value="">
                <input type="submit" value="Tìm nhân viên">
            </form>
			<table class="table table-info table-striped">
				<thead>
					<tr>
						<th>Mã nhân viên</th>
						<th>Họ</th>
						<th>Tên</th>
						<th>Ngày sinh</th>
						<th>Giới tính</th>
						<th>Địa chỉ</th>
						<th>Ảnh</th>
						<th>Loại nhân viên</th>
						<th>Phòng ban</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						$url="images/";
						$row_sql="SELECT MaNV,Ho,Ten,NgaySinh,GioiTinh,DiaChi,Anh,loainv.TenLoaiNV,phongban.TenPhongBan from nhanvien JOIN loainv JOIN phongban WHERE nhanvien.MaLoaiNV = loainv.MaLoaiNV and nhanvien.MaPhongBan = phongban.MaPhongBan";
						
                        if (!empty($_GET['keyword']))
                        {
                            $search = $_GET['keyword'];
                            $row_sql="SELECT MaNV,Ho,Ten,NgaySinh,GioiTinh,DiaChi,Anh,loainv.TenLoaiNV,phongban.TenPhongBan from nhanvien JOIN loainv JOIN phongban WHERE nhanvien.MaLoaiNV = loainv.MaLoaiNV and nhanvien.MaPhongBan = phongban.MaPhongBan and Ten like '%$search%'";                           
                        }
						$row_thuchien=mysqli_query($abc,$row_sql);
//                        var_dump(mysqli_fetch_array($row_thuchien));
						while($dulieu =mysqli_fetch_array($row_thuchien)){
							?>
							<td><?php echo $dulieu['MaNV']; ?></td>
							<td><?php echo $dulieu['Ho']; ?> </td>
							<td><?php echo $dulieu['Ten']; ?> </td>
							<td><?php echo $dulieu['NgaySinh']; ?></td>
							<td><?php echo $dulieu['GioiTinh']; ?></td>
							<td><?php echo $dulieu['DiaChi']; ?></td>
							<td><?php echo '<img width="30px" src="images/'.$dulieu['Anh'].'">'; ?></td>
							<td><?php echo $dulieu['TenLoaiNV']; ?></td>
							<td><?php echo $dulieu['TenPhongBan']; ?></td>
							<td>
								<a onclick=" return confirm('bạn có chắc muốn sửa không')" href="sua_nhanvien.php?id=<?php echo $dulieu['MaNV'] ?>" title="sửa"><img src="images/sua.png" width="25px">
								</a>
							</td>
							<td>
								<a onclick=" return confirm('bạn có chắc muốn xóa không') " href="xoa_nhanvien.php?id=<?php echo $dulieu['MaNV']; ?>" ><img src='images/xoa.jpg' width='25px' >
								</a>
							</td>
						</tr>					
					<?php 	} ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php
		include('footer.php');
	?>
</body>
</html>