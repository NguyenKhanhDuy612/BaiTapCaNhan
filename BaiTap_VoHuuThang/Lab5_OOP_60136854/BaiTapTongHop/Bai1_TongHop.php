<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tinh chu vi va dien tich</title>
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
		font{
			color: red;
		}
</style>
</head>
<body>
<?php 
	abstract class Hinh{
		protected $ten, $dodai;
		public function setTen($ten){
			$this->ten=$ten;
		}
		public function getTen(){
			return $this->ten;
		}
		public function setDodai($dodai){
			$this->dodai=$dodai;
		}
		public function getDodai(){
			return $this->dodai;
		}
		abstract public function tinh_CV();
		abstract public function tinh_DT();
	}
	class HinhTron extends Hinh{
		const PI=3.14;
		function tinh_CV(){
			return round($this->dodai[0]*2*self::PI,2);
		}
		function tinh_DT(){
			return round(pow($this->dodai[0],2)*self::PI,2);
		}
	}
	class HinhVuong extends Hinh{
		public function tinh_CV(){
			return round($this->dodai[0]*4,2);
		}
		public function tinh_DT(){
			return round(pow($this->dodai[0],2),2);
		}
	}
	class HinhTamGiacDeu extends Hinh{
		public function tinh_CV(){
			return round($this->dodai[0]*3,2);
		}
		public function tinh_DT(){
			return round(pow($this->dodai[0],2)*(sqrt(3)/4),2);
		}
	}
	class HinhTamGiacThuong extends Hinh{
		public function tinh_CV(){
			return round(array_sum($this->dodai),2);
		}
		public function tinh_DT(){
			$p=(1/2)*array_sum($this->dodai);
			return round(sqrt($p*($p-$this->dodai[0])*($p-$this->dodai[1])*($p-$this->dodai[2])),2);
		}
	}
	class HinhChuNhat extends Hinh{
		public function tinh_CV(){
			return round(($this->dodai[0])+($this->dodai[1])*2,2);
		}
		public function tinh_DT(){
			return round(($this->dodai[0])*($this->dodai[1]),2);
		}
	}
	$str=NULL;
	$errs=NULL;
	if(($_SERVER['REQUEST_METHOD']=='POST')){
		if(isset($_POST['tinh'])){
			$tinh=$_POST['tinh'];
			$ten=trim($_POST['ten']);
			$dodai=trim($_POST['dodai']);
			$arr=explode(',', $dodai);
			$fag=true;//C??i n??y l?? ki???m tra gi?? tr??? ????? d??i ????? ph?? h???p vi???c t??nh to??n
			foreach ($arr as $key) {
				if($key<=0){
					$fag=false;
					break;
				}
			}
			//N???u m?? kh??ng c?? th?? ti???p t???c x??? l??
			if($fag==true){
				if(isset($_POST['hinh']) && ($_POST['hinh'])=="hv"){
					if(count($arr)==1){
						$hv=new HinhVuong();
						$hv->setTen($ten);
						$hv->setDodai($arr);
						$str= "Di???n t??ch h??nh vu??ng ".$hv->getTen()." l????: ".$hv->tinh_DT()." \n".
						 		"Chu vi c???a h??nh vu??ng ".$hv->getTen()." l????: ".$hv->tinh_CV();
						}
					else{
							$errs= "Ph???i nh???p v??o m???t gi?? tr??? ?????i v???i h??nh vu??ng!";
						}
				}
				//H??nh tr??n
				if(isset($_POST['hinh']) && ($_POST['hinh'])=="ht"){
					if(count($arr)==1){
						$ht=new HinhTron();
						$ht->setTen($ten);
						$ht->setDodai($arr);
						$str= "Di???n t??ch c???a h??nh tr??n ".$ht->getTen()." l????: ".$ht->tinh_DT()." \n".
								"Chu vi c???a h??nh tr??n ".$ht->getTen()." l????: ".$ht->tinh_CV();
					}
					else{
							$errs="Ph???i nh???p v??o m???t gi?? tr??? ?????i v???i h??nh tr??n!";
					}
				}
				//H??nh tam gi??c ?????u
				if(isset($_POST['hinh']) && ($_POST['hinh'])=="htgd"){
					if(count($arr)==1){
						$htgd=new HinhTamGiacDeu();
						$htgd->setTen($ten);
						$htgd->setDodai($arr);
						$str= "Di???n t??ch c???a h??nh tam gi??c ?????u ".$htgd->getTen()." l????: ".$htgd->tinh_DT()." \n".
								"Chu vi c???a h??nh tam gi??c ?????u ".$htgd->getTen()." l????: ".$htgd->tinh_CV();
						}
					else{
							$errs= "Ph???i nh???p v??o m???t gi?? tr??? ?????i v???i h??nh tam gi??c ?????u!";
						}
				}
				//H??nh tam gi??c th?????ng
				if(isset($_POST['hinh']) && ($_POST['hinh'])=="htgt"){
					if(count($arr)==3){
						$htgt=new HinhTamGiacThuong();
						$htgt->setTen($ten);
						$htgt->setDodai($arr);
						$str= "Di???n t??ch c???a h??nh tam gi??c th?????ng ".$htgt->getTen()." l????: ".$htgt->tinh_DT()." \n".
								"Chu vi c???a h??nh tam gi??c th?????ng ".$htgt->getTen()." l????: ".$htgt->tinh_CV();
						}
					else{
							$errs="Ph???i nh???p v??o 3 gi?? tr??? ?????i v???i h??nh tam gi??c th?????ng!";
						}
				}				
				//H??nh ch??? nh???t
				if(isset($_POST['hinh']) && ($_POST['hinh'])=="hcn"){
					if(count($arr)==2){
						$hcn=new HinhChuNhat();
						$hcn->setTen($ten);
						$hcn->setDodai($arr);
						$str= "Di???n t??ch c???a h??nh ch??? nh???t ".$hcn->getTen()." l????: ".$hcn->tinh_DT()." \n".
								"Chu vi c???a h??nh ch??? nh???t ".$hcn->getTen()." l????: ".$hcn->tinh_CV();
						}
					else{
							$errs="Ph???i nh???p v??o 2 gi?? tr??? ?????i v???i h??nh ch??? nh???t";
						}
				}
			}					
		}
	}
?>
<form action="" method="post">
<fieldset>
	<legend>T??nh chu vi v?? di???n t??ch c??c h??nh ????n gi???n</legend>
	<table border='0'>
		<tr>
			<td>Ch???n h??nh</td>
			<td><input type="radio" name="hinh" value="hv" 
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="hv") echo 'checked'?>/>H??nh vu??ng
				<input type="radio" name="hinh" value="ht"
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="ht") echo 'checked'?>/>H??nh tr??n
				<input type="radio" name="hinh" value="htgd"
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="htgd") echo 'checked'?>/>H??nh tam gi??c ?????u
				<input type="radio" name="hinh" value="htgt"
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="htgt") echo 'checked'?>/>H??nh tam gi??c th?????ng
				<input type="radio" name="hinh" value="hcn"
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="hcn") echo 'checked'?>/>H??nh ch??? nh???t
			</td>
		</tr>
		<tr>
			<td>Nh???p t??n:</td>
			<td><input type="text"  name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>"/></td>
		</tr>
		<tr>
			<td>Nh???p ????? d??i:</td>
			<td><input type="text"  name="dodai" value="<?php if(isset($_POST['dodai'])) echo $_POST['dodai'];?>"/></td>
		</tr>
		<tr><td>K???t qu???:</td>
			<td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="tinh" value="T??NH"/></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo"<font>$errs</font>" ?></td>
		</tr>
	</table>
</fieldset>
</form>
</body>
</html>