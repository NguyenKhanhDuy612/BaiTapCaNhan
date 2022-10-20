<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUản lý thông tin nhân viên</title>
    <style>
        @charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:#A7A1AE;
  background-color:#1F2739;
}

h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
    font-weight: bold;
    font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
    font-weight: normal;
    font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
     -moz-box-shadow: 0 2px 2px -2px #0E1119;
          box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
    text-align: left;
    overflow: hidden;
    width: 80%;
    margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
    padding-bottom: 2%;
    padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
    background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
    background-color: #2C3446;
}

.container th {
    background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
     -moz-box-shadow: 0 6px 6px -6px #0E1119;
          box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
    transition-duration: 0.4s;
    transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}
    </style>
</head>
<body>



<?php


$tienLuong =0;
$troCap =0;
$tienThuong =0;
$tienPhat =0;
$thucTien =0;


    abstract class NhanVien  {
        protected $ten,$gioiTinh,$ngaySinh,
        $ngayLam,$heSoLuong,$soCon;
        // $luongCB;

        const luongCB = 2000;
        // abstract public function tinhTienLuong();
        // abstract public function tinhTroCap();
        // abstract public function tinhTienThuong();

        public function setTen($ten){
            $this->ten=$ten;
        }
        
        public function getTen(){
            return $this->ten;
        }

        public function setGT($gioiTinh){
            $this->gioiTinh=$gioiTinh;
        }
        
        public function getGT(){
            return $this->gioiTinh;
        }

        public function setNS($ngaySinh){
            $this->ngaySinh=$ngaySinh;
        }
        
        public function getNS(){
            return $this->ngaySinh;
        }

        public function setNL($ngayLam){
            $this->ngayLam=(int)($ngayLam);
        }
        
        public function getNL(){
            return $this->ngayLam;
        }

        public function setHSL($heSoLuong){
            $this->heSoLuong=$heSoLuong;
        }
        
        public function getHSL(){
            return $this->heSoLuong;
        }

        public function setSoCon($soCon){
            $this->soCon=$soCon;
        }
        
        public function getSoCon(){
            return $this->soCon;
        }

        public function setLuongCB($luongCB){
            $this->luongCB=$luongCB;
        }
        
        public function getLuongCB(){
            return $this->luongCB;
        }


        public function tinhTienThuong(){
            $today = (int)(date('Y'));
            return 1000*(($today)- ($this->ngayLam) );
        }
        
    }
    

    class NhanVienVanPhong extends NhanVien 
    {
        protected $soNgayVang, $donGiaPhat;
        protected $tienPhat =0;
        const dinhMuc = 4;
        const dinhMucVang = 20;

        public function setSNV($soNgayVang){
            $this->soNgayVang=$soNgayVang;
        }
        
        public function getSNV(){
            return $this->soNgayVang;
        }

        // tính tiền phạt: nếu số ngày vắng lớn hơn định mức vắng thì tiền phạt=số ngày vắng*định mức phạt;
        public function tinhTienPhat(){
            if($this->soNgayVang > self::dinhMuc){
                $this->tienPhat = $this->soNgayVang*self::dinhMucVang;
            }
            return $this->tienPhat;
        }
        // tính trợ cấp: nếu là nhân viên nữ thì tiền trợ cấp = 200.000đồng * số con *1.5; ngược lại thì tiền trợ cấp = 200.000đồng * số con;
        public function tinhTroCap(){
            if(isset($_POST['radGT'])&&$_POST['radGT']=='Nữ'){
                return 200*$this->soCon*1.5;
            }
            else{
                return 200*$this->soCon;
            }
        }
// tính tiền lương: tiền lương= lương cơ bản* hệ số lương – tiền phạt.
        public function tinhTienLuong(){
            return self::luongCB*$this->heSoLuong- $this->tinhTienPhat();
            // trừ tiền phạt
        }


    }
    //  Nhân viên sản xuất
    class NhanVienSanXuat extends NhanVien
    {
        protected $soSP;
        protected $tienThuong =0 ;
        const dinhMucSanPham =10;
        const donGiaSP =10;

        public function setSoSP($soSP){
            $this->soSP=$soSP;
        }
        
        public function getSoSP(){
            return $this->soSP;
        }

        public function tinhTienThuong()
        {
            if ($this->soSP >= self::dinhMucSanPham) {
                $this->tienThuong = ($this->soSP - self::dinhMucSanPham)*self::donGiaSP*0.03;            
            }
            return $this->tienThuong;
            
        }

        public function tinhTroCap(){
            return $this->soCon * 120.000;
        }

        public function tinhTienLuong(){
            return ($this->soSP*self::donGiaSP)+$this->tienThuong;
        }
        
    }

    if(isset($_POST['tinh'])){
        if(isset($_POST['loaiNV'])&& ($_POST['loaiNV']=='vp')){
            $vp = new NhanVienVanPhong();
            $vp->setSoCon($_POST['countCon']);
            $vp->setHSL($_POST['soLuong']);
            $vp->setSNV($_POST['soVang']);
            $vp->setNS($_POST['ngaySinh']);
            $vp->setNL($_POST['ngayLam']);
            $tienPhat = $vp->tinhTienPhat()."VND";
            $tienLuong = $vp->tinhTienLuong()."VND";
            $troCap =$vp->tinhTroCap()."VND";
            $tienThuong =$vp->tinhTienThuong();
            $thucTien =$vp->tinhTienLuong()
                        + $vp->tinhTroCap()."VND";
        }

        if(isset($_POST['loaiNV'])&& ($_POST['loaiNV']=='sx')){
            $sx = new NhanVienSanXuat();
            $sx->setSoCon($_POST['countCon']);
            $sx->setHSL($_POST['soLuong']);
            $sx->setSoSP($_POST['soSP']);
            $tienLuong =$sx->tinhTienLuong()."VND";
            $troCap = $sx->tinhTroCap()."VND";
            $tienThuong =$sx->tinhTienThuong()."VND";
            // $tienPhat ="hahaha";
            $thucTien =$sx->tinhTienLuong() + $sx->tinhTienThuong() + $sx->tinhTroCap()."VND";
        }
    }
    
    
    
?>
<!-- /////////////////////////////////////// -->
<form action="" method="post" >

<fieldset>

	<legend>Quản lý thông tin giáo viên - sinh viên</legend>

	<table>
		<tr>
            <td>Họ và tên:</td>
            <td>
                <input required type="text"  name="ten" 
                value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>"/>
            </td>

            <td>Số con:</td>
            <td>
                <input required type="text"  name="countCon" 
                value="<?php if(isset($_POST['countCon'])) echo $_POST['countCon'];?>"/>
            </td>
        </tr>

		<tr>
            <td>
                Ngày sinh:
            </td>
            <td>
                <input required type="date"  name="ngaySinh" 
                value="<?php if(isset($_POST['ngaySinh'])) echo $_POST['ngaySinh'];?>"/>
            </td>

            <td>
                Ngày vào làm:
            </td>
            <td>
                <input required type="date"  name="ngayLam" 
                value="<?php if(isset($_POST['ngayLam'])) echo $_POST['ngayLam'];?>"/>
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
            <td>Hệ số lương:</td>
            <td>
                <input required type="text"  name="soLuong" 
                value="<?php if(isset($_POST['soLuong'])) echo $_POST['soLuong'];?>"/>
            </td>
        </tr>
        <tr>
            <td>
                Loại nhân viên:
            </td>
            <td>
                <input type="radio" name="loaiNV" value="vp"
                    <?php if(isset($_POST['loaiNV'])&&$_POST['loaiNV']=='vp') 
                    echo 'checked="checked"';
                ?> checked/>		
                Văn phòng
            </td>
            <td>
                <input type="radio" name="loaiNV" value="sx" 
                        <?php if(isset($_POST['loaiNV'])&&$_POST['loaiNV']=='sx') 
                        echo 'checked="checked"';
                        ?>
                    />
                    Sản xuất
            </td>
        </tr>
        
        <tr>
            <td>
                
            </td>
            <td>
            Số ngày vắng:
                <input required type="text"  name="soVang" 
                value="<?php if(isset($_POST['soVang'])) echo $_POST['soVang'];?>"/>
            </td>
            
            <td>
            Số sản phẩm:
                <input required type="text"  name="soSP" 
                value="<?php if(isset($_POST['soSP'])) echo $_POST['soSP'];?>"/>
            </td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="tinh" value="Tính lương"/>
            </td>
        </tr>


        <tr>
            <td>Tiền lương:</td>
            <td>
                <input disabled type="text"  name="tienLuong" 
                value=" <?php echo($tienLuong); ?> "/>
            </td>

            <td>Trợ cấp:</td>
            <td>
                <input disabled type="text"  name="troCap" 
                value=" <?php echo($troCap); ?> "/>
            </td>
        </tr>

        <tr>
            <td>Tiền thưởng:</td>
            <td>
                <input disabled type="text"  name="tienThuong" 
                value=" <?php echo($tienThuong); ?> "/>
            </td>

            <td>Tiền phạt:</td>
            <td>
                <input disabled type="text"  name="tienPhat" 
                value=" <?php echo($tienPhat); ?> "/>
            </td>
        </tr>
        <tr align="center">
            <td>
                Thực lĩnh:
                <input disabled type="text"  name="thucTien" 
                value=" <?php echo($thucTien); ?> "/>

            </td>

            
        </tr>


	</table>

</fieldset>

</form>
</body>
</html>