<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tìm kiếm sữa</title>
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
	if(empty($_POST['ma_nv'])){
		$errors[]="Bạn chưa nhập mã nhân viên";
	}
	else{
		$ma_nv=trim($_POST['ma_nv']);
	}
	//kiểm tra tên sản phẩm
	if(empty($_POST['ho_nv'])){
		$errors[]="Bạn chưa nhập họ nhân viên";
	}
	else{
		$ho_nv=trim($_POST['ho_nv']);
	}
	if(empty($_POST['ten_nv'])){
		$errors[]="Bạn chưa nhập tên nhân viên";
	}
	else{
		$ten_nv=trim($_POST['ten_nv']);
	}
	if(empty($_POST['ngay_sinh'])){
		$errors[]="Bạn chưa nhập ngày sinh nhân viên";
	}
	else{
		$ngay_sinh=trim($_POST['ngay_sinh']);
	}
	if(empty($_POST['gioi_tinh'])){
		$errors[]="Bạn chưa nhập giới tính nhân viên";
	}
	else{
		$gioi_tinh=trim($_POST['gioi_tinh']);
	}
	if(empty($_POST['dia_chi'])){
		$errors[]="Bạn chưa nhập địa chỉ nhân viên";
	}
	else{
		$dia_chi=trim($_POST['dia_chi']);
	}
	if($_FILES['anh']['name']!=NULL)
	{
		move_uploaded_file($_FILES["anh"]["tmp_name"],"images/".$_FILES["anh"]["name"]);
		$anh=$_FILES['anh']['name'];
	}
	else echo "Vui lòng chọn file upload!";
	//cap nhat ma hang sua va ma loai sua
	$ma_loai_nhan_vien=$_POST['loai_nv'];
	$ma_phong_ban=$_POST['phong_ban'];

	if(empty($errors))//neu khong co loi xay ra
	{ 
		$query="INSERT INTO nhanvien VALUES ('$ma_nv','$ho_nv','$ten_nv','$ngay_sinh',
				'$gioi_tinh','$dia_chi','$ma_loai_nhan_vien','$ma_phong_ban','$anh')";
		$result=mysqli_query($abc,$query);
		if(mysqli_affected_rows($abc)==1){//neu them thanh cong
			echo '<div class="alert alert-success"><strong>Thành công!</strong> Một nhân viên mới đã được thêm.</div>';				
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
	<td colspan="2" align="center"><font color="blue"><h2>THÊM NHÂN VIÊN MỚI</h2></font></td>
</tr>
<tr>
	<td>Mã nhân viên: </td>
	<td><input type="text" name="ma_nv" size="20" value="<?php if(isset($_POST['ma_nv'])) echo $_POST['ma_nv'];?>" /></td>
</tr>
<tr>
	<td>Họ: </td>
	<td><input type="text" name="ho_nv" size="50" value="<?php if(isset($_POST['ho_nv'])) echo $_POST['ho_nv'];?>" /></td>
</tr>
<tr>
	<td>Tên: </td>
	<td><input type="text" name="ten_nv" size="50" value="<?php if(isset($_POST['ten_nv'])) echo $_POST['ten_nv'];?>" /></td>
</tr>
<tr>
	<td>Ngày sinh: </td>
	<td><input type="date" class="form-control" name="ngay_sinh"></td>
</tr>
<tr>
	<td>Giới tính: </td>
	<td><input type="radio" checked name="gioi_tinh" value="Nam">Nam
		<input type="radio" name="gioi_tinh" value="Nữ">Nữ
	</td>
</tr>
<tr>
	<td>Địa chỉ: </td>
	<td><input type="text" name="dia_chi" size="50" value="<?php if(isset($_POST['dia_chi'])) echo $_POST['dia_chi'];?>" /></td>
</tr>
<tr>
	<td>Ảnh: </td>
	<td><input type="FILE" name="anh" size="50"/></td>
</tr>
<tr>
	<td>Loại nhân viên:</td>
	<td><select name="loai_nv">
			<?php 
				$query="select * from loainv";	//Hiển thị tên các hãng sữa
				$result=mysqli_query($abc,$query);
				if(mysqli_num_rows($result)<>0){
					while($row=mysqli_fetch_array($result)){
						$ma_loai_nhan_vien=$row['MaLoaiNV'];
						$ten_loai_nhan_vien=$row['TenLoaiNV'];
						echo "<option value='$ma_loai_nhan_vien' "; 
								if(isset($_REQUEST['loai_nv']) && ($_REQUEST['loai_nv']==$ma_loai_nhan_vien)) echo "selected='selected'";
						echo ">$ten_loai_nhan_vien</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
	</td>
</tr>
<tr>
	<td>Phòng ban: </td>
	<td><select name="phong_ban">
			<?php 
				$query="select * from PhongBan";	//Hiển thị tên các loại sữa
				$result=mysqli_query($abc,$query);
				if(mysqli_num_rows($result)<>0){
					while($row=mysqli_fetch_array($result)){
						$ma_phong_ban=$row['MaPhongBan'];
						$ten_phong_ban=$row['TenPhongBan'];
						echo "<option value='".$ma_phong_ban."' "; 
							if(isset($_REQUEST['phong_ban']) && ($_REQUEST['phong_ban']==$ma_phong_ban)) echo "selected='selected'";
						echo ">".$ten_phong_ban."</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
	</td>
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
