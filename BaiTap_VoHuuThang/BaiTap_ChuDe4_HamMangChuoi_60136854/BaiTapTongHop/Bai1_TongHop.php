<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 1: Tổng hợp</title>
</head>
<body>
	<?php
		if(isset($_POST['n']))
			$n=trim($_POST['n']);
		else
			$n=0;
		if(isset($_POST['chen']))
			$chen=trim($_POST['chen']);
		else
			$chen=0;
		$ketqua="";
		if(isset($_POST['hienthi'])){
			if(empty($_POST['n'])){
				echo "Không được để trống!";
			}
			elseif(empty($_POST['chen'])){
				echo "Không được để trống";
			}
			elseif($_POST['n']<0){
				echo "Phải nhập số lớn hơn 0";
			}
			elseif($_POST['chen']<0){
				echo "Phải nhập số lớn hơn 0";
			}
			elseif((!is_numeric($_POST['n'])) || (!is_numeric($_POST['chen']))){
				echo "Không được chèn chữ";
			}
			else{
				$arr=array();
				for($i=0;$i<$n;$i++)
				{
					$x=rand(-200,200);
					$arr[$i]=$x;
				}
				//----------------------------------------
				//in mạng vừa tạo
				$ketqua="\na) Mảng được tạo có độ dài $n là:" .implode(" ",$arr)."&#13;&#10;";
				sort($arr);
				$ketqua.="\nb) Sắp xếp tăng dần là: ".implode(" ",$arr)."&#13;&#10;";
				function themSo(&$chen,$x,&$arr,&$ketqua){
					array_splice($arr, $chen,0,$x);
					$vitri=$chen;
					$themso="\nc) Mảng sau khi thêm số $x vào vị trí $vitri: ".implode(" ",$arr)."\n";
					$ketqua.=$themso;
				}
				themSo($chen,4,$arr,$ketqua);
				function sapXepTangGiam(&$chen,$x,&$arr,&$ketqua,&$n){
					$arr1=array();
					for($i=0;$i<$chen;$i++){
						$arr1[$i]=$arr[$i];
					}
					asort($arr1);
					//
					$arr2=array();
					for ($i=$n; $i >$chen ; $i--) {//Cái này duyệt từ cuối thôi 
						$arr2[$i]=$arr[$i];
					}
					arsort($arr2);
					//
					array_push($arr1, $x);
					$arr=$arr1+$arr2;
					$caud="\nd) Mảng sau khi sắp xếp: ".implode(" ",$arr);
					$ketqua.=$caud;
				}
				sapXepTangGiam($chen,4,$arr,$ketqua,$n);
			}
		}
	?>
	<form action="" method="post">
	Nhập n: <input type="text" name="n" value="<?php echo $n?>"/>
	<input type="submit" name="hienthi" value="Hiển thị"/>
	<br/>Vị trí cần chèn:<input type="text" name="chen" value="<?php echo $chen?>" />
	<br/>Kết quả: <br/>
	<textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua?></textarea>
</form>
</body>
</html>