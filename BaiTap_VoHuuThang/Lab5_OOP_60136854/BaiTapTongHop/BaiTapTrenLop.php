<!DOCTYPE html>
<head>

</head>
<body>
    <?php
        class Nguoi{
            protected $hoTen;
            protected $diaChi;
            protected $gioiTinh;
            function __contruct($hoTen,$diaChi,$gioiTinh){
                $this->hoTen = $hoTen;
                $this->diaChi = $diaChi;
                $this->gioiTinh = $gioiTinh;
            }
            function gethoTen(){
                return $this->hoTen;
            }
            function getlopHoc(){
                return $this->lopHoc;
            }
            function getgioiTinh(){
                if($this->gioiTinh ==true)
                    return "Nam";
                
                else return "Nữ";
            }
        }
        class HocSinh extends Nguoi{
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
            function gettranhDo(){
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
    ?>


<form action="" method="post">
<fieldset>
	<legend>NHẬP THÔNG TIN</legend>
	<table border='0'>

		<tr>
            <td>Nhập tên:</td>
            <td><input type="text"  name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>"/></td>     
		</tr>
		<tr>
			<td>Địa chỉ:</td>
			<td><input type="text"  name="diachi" value="<?php if(isset($_POST['diachi'])) echo $_POST['diachi'];?>"/></td>
		</tr>
		<tr>
			<td>Giới tính</td>
			<td>
                <input type="radio" name="gt" value="nam" 
				    <?php if(isset($_POST['gt'])&&($_POST['gt'])=="nam") echo 'checked'?>/>Nam
			    <input type="radio" name="gt" value="nu"
				    <?php if(isset($_POST['gt'])&&($_POST['gt'])=="nu") echo 'checked'?>/> Nữ
            </td>
		</tr>
        <tr>
        <td>
            <input type="radio" name="hs" value="hv" 
				<?php if(isset($_POST['hs'])&&($_POST['hs'])=="hs") echo 'checked'?>/>Học Sinh
			<input type="radio" name="hs" value="ht"
				<?php if(isset($_POST['gv'])&&($_POST['gv'])=="gv") echo 'checked'?>/> Giảng viên
			</td>
        </tr>
		
		<tr>
			<td colspan="2" align="center"><input type="submit" name="show" value="Show thông tin"/></td>
		</tr>
	</table>
</fieldset>
</form>
<?php
	if(isset($_POST['ten']))
		$ten=trim($_POST['ten']);
	if(isset($_POST['diachi']))
		$diachi=trim($_POST['diachi']);
	if(isset($_POST['show'])){
		$n=new Nguoi();
		$n->setTen=$_POST['ten'];
		$n->getTen();
		echo $n;
	}
?>
</body>
</html>