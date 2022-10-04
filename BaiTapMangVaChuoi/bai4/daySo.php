<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bài 4: Tính dãy số</title>
    <style type="text/css">

    table{

        color: #ffff00;

        background-color: gray;     

    }

    table th{

        background-color: blue;

        font-style: vni-times;

        color: yellow;

    }

</style>
</head>
<body>
	<?php
function tong_mang($mang){
    $n = count($mang);
    $tong = 0;
    for($i = 0; $i < $n; $i++){
        $tong += $mang[$i];
    }
    return $tong;
}
		if(isset($_POST['dayso'])){
			$dayso=trim($_POST['dayso']);
		}
		else{
			$dayso=0;
			$tongdayso=0;
		}
		if(isset($_POST['btntongdayso'])){
			if(empty($_POST['dayso'])){
				echo "Không để trống!";
				$tongdayso="Đầu vào không xác định";
			}
			else{
				$mang=$_POST['dayso'];
				$mang=explode(",", $mang);
                // echo($mang);
				$tongdayso=tong_mang($mang);

			}
		}
        // $tong =0;
        // function tinhTong( $tong,$mang){

        //     for ($i=0; $i < $mang; $i++) { 
        //         $tong += $mang[$i];
        //     }
        //     echo($tong);
        // }
	?>
	<form method="post" action="">
		<table>
			<tr colspan="2">
				<th colspan="2">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
			</tr>
			<tr>
				<td>Nhập dãy số: </td>
				<td><input type="text" name="dayso" value="<?php echo "$dayso"; ?>" >(*)</td>
			</tr>
			<tr>
				<td></td>
			<td><input type="submit"name="btntongdayso" value="Tổng dãy số"></td>
			</tr>
			<tr>
				<td>Tổng dãy số: </td>
				<td><input type="text" name="tongdayso" disabled="disabled" value="<?php echo "$tongdayso"; ?>"></td>
			</tr>
            <tr>
                <td colspan="2">
                 <h4>(*) Các số nhập cách nhau bằng dấu ","</h4>
                </td>
            
			</tr>
           
		</table>
		
	</form>
</body>
</html>