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

$str=NULL;
    abstract class Nguoi{

        protected $ten, $diachi,$gioiTinh;
    
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
    
        // abstract public function tinh_CV();

	    // abstract public function tinh_DT();
        // abstract public function tinhDiemThuong();
    
        // abstract public function tinhLuongCB();
    
    }

    class SinhVien extends Nguoi{
    
        protected $lopHoc;
        protected $nganhHoc;

            public function setLopHoc($lopHoc){
                $this->lopHoc=$lopHoc;
            }

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
            public function tinhDiemThuong(){
                if($this->nganhHoc==="Công nghệ thông tin")
                    return 1;
                else
                    if($this->nganhHoc==="Kinh Tế")
                        return 1.5;
                    else
                        return 0;
            }
    
    }

    class GiangVien extends Nguoi{
        protected $trinhDo; 
        const luongcb = 1500000;

        function gettrinhDo(){
            return $this->trinhDo;
        }

        public function setTrinhDo($trinhDo){
            $this->trinhDo=$trinhDo;
        }

        // phuong thuc
        public function tinhLuongCB(){
            if($this->trinhDo==="Cử nhân")
                return self :: luongcb*2.34;
            else
                if($this->trinhDo==="Thạc sĩ")
                    return self :: luongcb*3.67;
                else
                    return self :: luongcb*5.66;
        }
    }

    if (isset($_POST['tinh'])) {
        if (($_POST['doiTuong']) && ($_POST['doiTuong']=="sv")) {
            $sv = new SinhVien();
            $sv -> setTen($_POST['ten']);
            $sv -> setDiaChi($_POST['diaChi']);
            $sv -> setGT($_POST['radGT']);
            $sv ->setLopHoc($_POST['lopHoc']);
            $sv ->setNganhHoc($_POST['nganhHoc']);
            $str= "Họ và tên: "
                .$sv->getTen()
                ." \n"
                ."Địa chỉ: "
                .$sv->getDiaChi()
                ." \n"
                ."Giới tính: "
                .$sv->getGT()
                ." \n"
                ."Lớp học: "
                .$sv->getlopHoc()
                ." \n"
                ."Ngành học: "
                .$sv->getnganhHoc()
                ." \n"
                ."Điểm thưởng là: "
                .$sv->tinhDiemThuong()
                ." \n";

		 		
        }

        if (($_POST['doiTuong']) && ($_POST['doiTuong']=="gv")) {
            $sv = new GiangVien();
            $sv -> setTen($_POST['ten']);
            $sv -> setDiaChi($_POST['diaChi']);
            $sv -> setGT($_POST['radGT']);
            $sv ->setTrinhDo($_POST['trinhDo']);
            $str= "Họ và tên: "
                .$sv->getTen()
                ." \n"
                ."Địa chỉ: "
                .$sv->getDiaChi()
                ." \n"
                ."Giới tính: "
                .$sv->getGT()
                ." \n"
                ."Trình độ: "
                .$sv->gettrinhDo()
                ." \n"
                ."Lương là:  "
                .$sv-> tinhLuongCB()
                ." \n";
        }


    }

    // if (isset($_POST['nganhHoc'])) {

	// 	foreach ($_POST['nganhHoc'] as $choice) {

	//     	print "You want a $choice bun. <br/>";

	// 	}

		

	// }
    // if(isset($_POST['ten']))
	// 	$ten=trim($_POST['ten']);
	// if(isset($_POST['diaChi']))
	// 	$diachi=trim($_POST['diaChi']);
    // // if((isset($gioiTinh) && $gioiTinh=="nu"))
	// // 	$gioiTinh=trim($_POST['gioiTinh']);
    // // if((isset($gioiTinh) && $gioiTinh=="nam"))
	// // 	$gioiTinh=trim($_POST['gioiTinh']);

    //     if (isset($_POST['gioiTinh'])){
	// 		echo "Gioi tinh : " . $_POST['gioiTinh'];
	// 	}
    //     if (isset($_POST['doiTuong'])){
	// 		echo "DoiTuong : " . $_POST['doiTuong'];
	// 	}
        
	// 	if (isset($_POST['gioiTinh'])){
	// 		echo "Gioi tinh : " . $_POST['gioiTinh'];
	// 	}

	
	
    
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
                <input type="radio" name="radGT" value="Nam"
                    <?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nam') 
                    echo 'checked="checked"';
                ?> checked/>		
                Nam

                <input type="radio" name="radGT" value="Nữ" 
                    <?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nữ') 
                    echo 'checked="checked"';
                    ?>
                />
                Nữ

       
            </td>
        </tr>
        <tr>
            <td>
                Chọn đối tượng:
            </td>
            <td>
                <input type="radio" name="doiTuong" 
                    <?php if(isset($_POST['doiTuong'])&& $_POST['doiTuong']=='gv')
                    echo ('checked="checked"');
                    ?> value="gv" checked>
                    Giáo viên

                <input type="radio" name="doiTuong" 
                <?php if(isset($_POST['doiTuong'])&&$_POST['doiTuong']=='sv')
                    echo ('checked="checked"');
                    ?> value="sv" >
                    Sinh viên
            </td>
        </tr>
        <tr>
            <td colspan="1">
            <fieldset>
                        <legend>Giáo viên</legend>
                    <table>
                        <tr>
                        <td>
                            Trình độ:
                        </td>
                        <td>
                            
                            <select name="trinhDo" >
                                <option value="Cử nhân" selected
                                    <?php
                                        if((isset($_POST['trinhDo']) 
                                        && 
                                        ($_POST['trinhDo']=='Cử nhân')))
                                        {
                                            echo('selected');
                                        }
                                    ?>
                                >
                                    Cử nhân
                                </option>
                                <option value="Thạc sĩ"
                                    <?php
                                        if((isset($_POST['trinhDo']) 
                                        && 
                                        ($_POST['trinhDo']=='Thạc sĩ')))
                                        {
                                            echo('selected');
                                        }
                                    ?>
                                >
                                    Thạc sĩ
                                </option>
                                <option value="Tiến sĩ"
                                    <?php
                                        if((isset($_POST['trinhDo']) 
                                        && 
                                        ($_POST['trinhDo']=='Tiến sĩ')))
                                        {
                                            echo('selected');
                                        }
                                    ?>
                                >
                                    Tiến sĩ
                                </option>
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
                    </table>
                </fieldset>
            </td>
            <td colspan="1">
            <fieldset>
                        <legend>Sinh viên</legend>
                    <table>
                    <tr>
                        <td>
                            Lớp học:
                        </td>
                        <td>
                        
                            <input  type="text" name="lopHoc"
                                value="<?php if(isset($_POST['lopHoc'])) echo $_POST['lopHoc'];?>"
                                " 
                            >
                        </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ngành học:
                        </td>
                        <td>
                            <select name="nganhHoc">
                                <option value="Công nghệ thông tin" name="" 
                                    <?php
                                        if((isset($_POST['nganhHoc']) && ($_POST['nganhHoc']=='Công nghệ thông tin')))
                                        {
                                            echo('selected');
                                        }
                                    ?>
                                >
                                    Công nghệ thông tin
                                </option>
                                <option value="Khát" name=""
                                    <?php
                                        if((isset($_POST['nganhHoc']) 
                                        && 
                                        ($_POST['nganhHoc']=='Khát')))
                                        {
                                            echo('selected');
                                        }
                                    ?>
                                >
                                Khát</option>
                                <option value="Kinh Tế"
                                    <?php
                                        if((isset($_POST['nganhHoc']) 
                                        && 
                                        ($_POST['nganhHoc']=='Kinh Tế')))
                                        {
                                            echo('selected');
                                        }
                                    ?>
                                >Kinh tế</option>
                                
                            </select>
                        </td>
                    </tr>
                    </table>
                </fieldset>
            </td>
        </tr>

		<!-- <tr><td>Kết quả:</td>

			<td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td></tr> -->


        <tr>
			<td >Kết quả:</td>

			<td >
                <textarea name="ketqua" cols="70" rows="7" disabled="disabled">
				    <?php echo $str;?>
                </textarea>
			</td>
		</tr>

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