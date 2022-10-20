<?php
    include('layout.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa phòng ban</title>
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

    $maPB = $_GET['id'];
    $query = "SELECT * FROM phongban WHERE MaPhongBan = '$maPB'";
    $result = mysqli_query($abc, $query);
    $rows = mysqli_fetch_row($result);
    $phongBan = $result->fetch_assoc();
?>
<form action="" method="post" enctype="multipart/form-data">
<table bgcolor="#eeeeee" align="center" width="60%" border="0">
<tr bgcolor="#eeee10">
	<td colspan="2" align="center"><font color="blue"><h2>Sửa Thông Tin Phòng Ban</h2></font></td>
</tr>
<tr>
	<td>Mã phòng ban: </td>
	<td><input type="text" name="mapb" size="20" value="<?php echo $rows[0];?>" /></td>
</tr>
<tr>
	<td>Tên phòng ban: </td>
	<td><input type="text" name="tenpb" size="50" value="<?php echo $rows[1];?>" /></td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" name ="sua" size="10" value="Lưu thông tin" /></td>
</tr>
</table>
</form>
<?php
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $errors=array(); //khởi tạo 1 mảng chứa lỗi
        //kiem tra ma sua
        //kiểm tra tên sản phẩm
        if(empty($_POST['tenpb'])){
            $errors[]="Bạn chưa nhập họ nhân viên";
        }
        else{
            $tenpb=trim($_POST['tenpb']);
        }
        if(empty($_POST['mapb'])){
            $errors[]="Bạn chưa nhập họ nhân viên";
        }
        else{
            $mapb=trim($_POST['mapb']);
        }
        //cap nhat ma 
        //$mapb=$_POST['mapb'];
        //kiểm tra hình sản phẩm và thực hiện upload file
        if(empty($errors))//neu khong co loi xay ra
        { 
            $query =
            "UPDATE phongban
            SET TenPhongBan = '$tenpb', MaPhongBan = '$mapb'
            WHERE MaPhongBan = '$rows[0]'
            ";
            $result=mysqli_query($abc,$query);
            if(mysqli_affected_rows($abc)==1){//neu them thanh cong
                echo '<div class="alert alert-success"><strong>Thành công!</strong> Phòng ban đã được sửa.</div>'; 
                //header("Location: " . "index_nhanvien2.php");		
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