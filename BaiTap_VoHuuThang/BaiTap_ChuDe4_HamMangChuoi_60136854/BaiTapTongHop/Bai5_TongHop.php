<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Insert title here</title>
</head>
<body>
<?php
    function build_table($array){
	    // start table
	    $html = '<table border="1">';
	    // header row
	    $html .= '<tr>';
	    foreach($array[0] as $key=>$value){
	            $html .= '<th>' . htmlspecialchars($key) . '</th>';
	        }
	    $html .= '</tr>';

	    // data rows
	    foreach( $array as $key=>$value){
	        $html .= '<tr>';
	        foreach($value as $key2=>$value2){
	            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
	        }
	        $html .= '</tr>';
	    }

	    // finish table and return it

	    $html .= '</table>';
	    return $html;
	}

	$array = array(
	    array('Mã mặt hàng'=>'A001', 'Tên mặt hàng'=>'Sữa tắm XMen', 'Đơn vị tính'=>'Chai 50ml', 'Số lượng'=>'50'),
	    array('Mã mặt hàng'=>'A002', 'Tên mặt hàng'=>'Dầu gội đầu Lifeboy', 'Đơn vị tính'=>'Chai 50ml', 'Số lượng'=>'20'),
	    array('Mã mặt hàng'=>'B001', 'Tên mặt hàng'=>'Dầu ăn Cái Lân', 'Đơn vị tính'=>'Chai 1 lít', 'Số lượng'=>'10'),
	    array('Mã mặt hàng'=>'B002', 'Tên mặt hàng'=>'Đường cát', 'Đơn vị tính'=>'Kg', 'Số lượng'=>'15'),
	    array('Mã mặt hàng'=>'C001', 'Tên mặt hàng'=>'Chén sứ Minh Long', 'Đơn vị tính'=>'Bộ 10 cái', 'Số lượng'=>'2'),
	);
	if(isset($_POST['them'])){
		$array[] = array('Mã mặt hàng'=>$_POST['maMH'], 'Tên mặt hàng'=>$_POST['tenMH'], 'Đơn vị tính'=>$_POST['dvt'], 'Số lượng'=>$_POST['sl']);
	}
echo build_table($array);
?>
<hr>
<form method="post" action="">
	<table>
		<th colspan="4">Thêm mặt hàng</th>
		<tr>
			<td>Mã mặt hàng: </td>
			<td><input type="text" name="maMH"></td>
		</tr>
		<tr>
			<td>Tên mặt hàng: </td>
			<td><input type="text" name="tenMH"></td>
		</tr>
		<tr>
			<td>Đơn vị tính: </td>
			<td><input type="text" name="dvt"></td>
		</tr>
		<tr>
			<td>Số lượng: </td>
			<td><input type="text" name="sl"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="them" value="Thêm"></td>
		</tr>
	</table>
</form>
</body>
</html>
