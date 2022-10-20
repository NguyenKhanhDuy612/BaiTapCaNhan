<?php
    include('layout.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa nhân viên</title>
</head>

<body>
    <?php
    require_once("connect.php");

    function buildDropDownList(mysqli_result $result, string $selectName, string $idName, string $idValue, string $selectedValue = null)
    {
        if (mysqli_num_rows($result) != 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='" . $row[$idName] . "' ";
                if (isset($_REQUEST[$selectName]) && $_REQUEST[$selectName] == $row[$idName]) {
                    echo "selected='selected'";
                } else if ($selectedValue == $row[$idName]) {
                    echo "selected='selected'";
                }
                echo ">" . $row[$idValue] . "</option>";
            }
        }
        mysqli_free_result($result);
    }

    $maNV = $_GET['id'];
    $query = "SELECT * FROM nhanvien WHERE MaNV = '$maNV'";
    $result = mysqli_query($abc, $query);
    $rows = mysqli_fetch_row($result);
    $nhanVien = $result->fetch_assoc();
?>
<form action="" method="post" enctype="multipart/form-data">
<table bgcolor="#eeeeee" align="center" width="60%" border="0">
<tr bgcolor="#eeee10">
	<td colspan="2" align="center"><font color="blue"><h2>Sửa Thông Tin Nhân Viên</h2></font></td>
</tr>
<tr>
	<td>Mã Nhân viên: </td>
	<td><input type="text" name="manv" size="20" disabled value="<?php echo $rows[0];?>" /></td>
</tr>
<tr>
	<td>Họ Nhân viên: </td>
	<td><input type="text" name="honv" size="50" value="<?php echo $rows[1];?>" /></td>
</tr>
<tr>
	<td>Tên Nhân viên: </td>
	<td><input type="text" name="tennv" size="50" value="<?php echo $rows[2];?>" /></td>
</tr>
<tr>
	<td>Ngày Sinh: </td>
	<td><input type="date" name="ngaysinh" size="50" value="<?php echo $rows[3];?>" /></td>
</tr>
<tr>
	<td>Giới tính: </td>
	<td>
        <?php 
            if($rows[4]=='Nam') 
            {
                ?>
                <input type="radio" checked name="gioi_tinh" value="Nam">Nam
                <input type="radio" name="gioi_tinh" value="Nữ">Nữ
            <?php
            }else
            {
                ?>
                <input type="radio" name="gioi_tinh" value="Nam">Nam
                <input type="radio"checked name="gioi_tinh" value="Nữ">Nữ
            <?php
            }
            ?>  
	</td>
</tr>
<tr>
	<td>Địa chỉ: </td>
	<td><input type="text" name="diachi" size="50" value="<?php echo $rows[5];?>" /></td>
</tr>
<tr>
	<td>Ảnh: </td>
	<td><input type="file" name="hinh" /></td>
</tr>
<tr>
	<td>Loại nhân viên:</td>
	<td><select name="loaiNV">
			<?php 
				$query="select * from loainv";	//Hiển thị tên các hãng sữa
				$result=mysqli_query($abc,$query);
				if(mysqli_num_rows($result)<>0){
					while($row=mysqli_fetch_array($result)){
						$malnv=$row['MaLoaiNV'];
						$tenlnv=$row['TenLoaiNV'];
						echo "<option value='$malnv' "; 
								if(isset($_REQUEST['loaiNV']) && ($_REQUEST['loaiNV']==$malnv)) echo "selected='selected'";
						echo ">$tenlnv</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
	</td>
</tr>
<tr>
	<td>Phòng Ban: </td>
	<td><select name="pb">
			<?php 
				$query="select * from phongban";	//Hiển thị tên các phòng ban
				$result=mysqli_query($abc,$query);
				if(mysqli_num_rows($result)<>0){
					while($row=mysqli_fetch_array($result)){
						$mapb=$row['MaPhongBan'];
						$tenpb=$row['TenPhongBan'];
						echo "<option value='".$mapb."' "; 
							if(isset($_REQUEST['pb']) && ($_REQUEST['pb']==$mapb)) echo "selected='selected'";
						echo ">".$tenpb."</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
	</td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" name ="sua" size="10" value="Lưu" /></td>
</tr>
</table>
</form>
<?php
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $errors=array(); //khởi tạo 1 mảng chứa lỗi
        //kiem tra ma sua
        //kiểm tra tên sản phẩm
        if(empty($_POST['honv'])){
            $errors[]="Bạn chưa nhập họ nhân viên";
        }
        else{
            $honv=trim($_POST['honv']);
        }
        if(empty($_POST['tennv'])){
            $errors[]="Bạn chưa nhập tên nhân viên";
        }
        else{
            $tennv=trim($_POST['tennv']);
        }
        if(empty($_POST['ngaysinh'])){
            $errors[]="Bạn chưa nhập ngày sinh";
        }
        else{
            $ns=trim($_POST['ngaysinh']);
        }
        if(($_POST['gioi_tinh']!=0)&&($_POST['gioi_tinh']!=1)){
            $errors[]="Bạn chưa nhập giới tính";
        }
        else{
            $gt=trim($_POST['gioi_tinh']);
        }
        if(empty($_POST['diachi'])){
            $errors[]="Bạn chưa nhập địa chỉ";
        }
        else{
            $diachi=trim($_POST['diachi']);
        }
        //cap nhat ma hang sua va ma loai sua
        $malnv=$_POST['loaiNV'];
        $mapb=$_POST['pb'];
        //kiểm tra hình sản phẩm và thực hiện upload file
        if($_FILES['hinh']['name']!=NULL)
        {
            move_uploaded_file($_FILES["hinh"]["tmp_name"],"images/".$_FILES["hinh"]["name"]);
            $anh=$_FILES['hinh']['name'];
        }
        else echo "Vui lòng chọn file upload!";
        if(empty($errors))//neu khong co loi xay ra
        { 
            $query =
            "UPDATE nhanvien
            SET Ho = '$honv', Ten = '$tennv', NgaySinh = '$ns', GioiTinh = '$gt',
                DiaChi = '$diachi', Anh = '$anh', MaLoaiNV = '$malnv', MaPhongBan = '$mapb'
            WHERE MaNV = '$rows[0]'
            ";
            $result=mysqli_query($abc,$query);
            if(mysqli_affected_rows($abc)==1){//neu them thanh cong
                echo "<div align='center'>Thêm mới thành công!</div>";
                header("Location: " . "index_nhanvien2.php");		
            }
            else //neu khong them duoc
            {
                echo "<p>Có lỗi, không thể thêm được</p>";
                echo "<p>".mysqli_error($abc)."<br/><br />Query: ".$query."</p>";	
            }
        }
        else
        {//neu co loi
            echo "<h2>Lá»—i</h2><p>Có lỗi xảy ra:<br/>";
            foreach($errors as $msg)
            {
                echo "- $msg<br /><\n>";
            }
            echo "</p><p>Hãy thử lại.</p>";
        }
    }
    mysqli_close($abc);
    ?>
</body>

</html>
<?php
    include('footer.php');
?>