<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1 - Tạo các lớp đơn giản</title>
    <style>

fieldset {

  background-color: #eeeeee;

}



legend {

  background-color: gray;

  color: white;

  padding: 5px 10px;

}



input {

  margin: 5px;

}

</style>
</head>
<body>

<?php
    abstract class Nguoi{

        protected $ten, $diaChi,$gioiTinh;
    
        public function setTen($ten){
    
            $this->ten=$ten;
    
        }
    
        public function getTen(){
    
            return $this->ten;
    
        }
    
        public function setDiaChi($diaChi){
    
            $this->diaChi=$diaChi;
    
        }
    
        public function getDiaChi(){
    
            return $this->diaChi;
    
        }

        public function setGT($gioiTinh){
    
            $this->gioiTinh=$gioiTinh;
    
        }
    
        public function getGT(){
    
            return $this->gioiTinh;
    
        }
    
        // abstract public function tinhDiemThuong();
    
        // abstract public function tinhLuongCB();
    
    }

    class SinhVien extends Nguoi{
    
        protected $lopHoc;
            protected $nganhHoc;
            function getlopHoc(){
                return $this->lopHoc;
            }
            function getnganhHoc(){
                return $this->nganhHoc;
            }
            public function setNganhHoc($nganhHoc){
                $this->nganhHoc=$nganhHoc;
            }
            //phuongthuc
            private function tinhDiemThuong(){
                if($this->nganhHoc==="CNTT")
                    return 1;
                else
                    if($this->nganhHoc==="KinhTe")
                        return 1.5;
                    else
                        return 0;
            }
    
    }

    class GiangVien extends Nguoi{
        protected $trinhDo; 
        function gettrinhDo(){
            return $this->trinhDo;
        }
        const luongcb = 1500000;
        public function setTrinhDo($trinhDo){
            $this->trinhDo=$trinhDo;
        }
        // phuong thuc
        private function tinhLuongCB(){
            if($this->trinhDo==="CuNhan")
                return self :: luongcb*2.34;
            else
                if($this->trinhDo==="ThacSi")
                    return self :: luongcb*3.67;
                else
                    return self :: luongcb*5.66;
        }
    }


    if(isset($_POST['ten']))
		$ten=trim($_POST['ten']);
	if(isset($_POST['diaChi']))
		$diachi=trim($_POST['diaChi']);
    // if((isset($gioiTinh) && $gioiTinh=="nu"))
	// 	$gioiTinh=trim($_POST['gioiTinh']);
    // if((isset($gioiTinh) && $gioiTinh=="nam"))
	// 	$gioiTinh=trim($_POST['gioiTinh']);

        if (isset($_POST['gioiTinh'])){
			echo "Gioi tinh : " . $_POST['gioiTinh'];
		}
        if (isset($_POST['doiTuong'])){
			echo "doiTuong : " . $_POST['doiTuong'];
		}
        
	
	
    
?>

<form action="" method="post">

<fieldset>

	<legend>Quản lý thông tin giáo viên - sinh viên</legend>

	<table border='0'>


		<tr>
            <td>Họ tên:</td>
            <td>
                <input type="text"  name="ten" 
                value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>"/>
            </td>
        </tr>

		<tr>
            <td>
                Địa chỉ:
            </td>
            <td>
                <input type="text"  name="diaChi" 
                value="<?php if(isset($_POST['diaChi'])) echo $_POST['diaChi'];?>"/>
            </td>
        </tr>
        <tr>
            <td>
                Giới tính:
            </td>
            <td>
                <input type="radio" name="gioiTinh" <?php if (isset($gioiTinh) && $gioiTinh=="nu") echo "checked";?> value="nu">Nữ
                <input type="radio" name="gioiTinh" <?php if (isset($gioiTinh) && $gioiTinh=="nam") echo "checked";?> value="nam">Nam
            </td>
        </tr>
        <tr>
            <td>
                Chọn đối tượng:
            </td>
            <td>
                <input type="radio" name="doiTuong" <?php if (isset($doiTuong) && $doiTuong=="gv") echo "checked";?> value="gv">Giáo viên
                <input type="radio" name="doiTuong" <?php if (isset($doiTuong) && $doiTuong=="sv") echo "checked";?> value="sv">Sinh viên
            </td>
        </tr>
        Giáo viên
        <tr>
            <td>
                Trình độ:
            </td>
            <td>
            
                <select name="trinhDo[]" size="3" multiple>
                    <option value="Giáo viên" selected>Giáo viên</option>
                    <option value="Thạc sĩ">Thạc sĩ</option>
                    <option value="Tiến sĩ">Tiến sĩ</option>
                    <option value="Giáo sư">Giáo sư</option>
                </select>
            
            
            </td>
        </tr>
        <tr>
            <td>
                Lương cơ bản:
            </td>
            <td>
            
                <input disabled type="text" value="15000" name="luongCB">
            </p>
            </td>
        </tr>

        Sinh viên
        <tr>
            <td>
                Lớp học:
            </td>
            <td>
            
                <input  type="text" value="" name="lopHoc">
            </p>
            </td>
        </tr>
        <tr>
            <td>
                Ngành học:
            </td>
            <td>
            
                <select name="nganhHoc[]" size="3" multiple>
                    <option value="cntt" selected>Công nghệ thông tin</option>
                    <option value="dulich">Du lịch</option>
                    <option value="Kinh tế">Kinh tế</option>
                </select>
            
            
            </td>
        </tr>
        


		<!-- <tr><td>Kết quả:</td>

			<td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td></tr> -->

		<tr>
            <td colspan="2" align="center">
                <input type="submit" name="tinh" value="Xử lý"/>
            </td>
        </tr>

	</table>

</fieldset>

</form>
    
</body>
</html>