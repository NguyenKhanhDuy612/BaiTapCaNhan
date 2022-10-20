<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đổi lịch</title>
</head>
<body>


<form action="" method="post">

	<?php 

		$can = array("Canh","Tân","Nhâm","Quý","Giáp","Ất","Bính","Đinh","Mậu","Kỷ");
		$chi = array("Thân","Dậu","Tuất","Hợi","Tý'","Sửu","Dần","Mẹo","Thìn","Tỵ","Ngọ","Mùi");

		$linkanh = null;

		if (isset($_POST['xl'])) {
			if (isset($_POST['nam']) && is_numeric($_POST['nam']) && $_POST['nam'] > 0) {
				$i_can = $_POST['nam'] % 10;
				$i_chi = $_POST['nam'] % 12;
				echo "Năm " .$can[$i_can] ." " .$chi[$i_chi];
				$nam = $chi[$i_chi];
				switch ($nam) {
					case 'Thân':
						$linkanh = "./images/than.jpg";
						break;
					
					case 'Dậu':
						$linkanh = "./images/than.jpg";
						break;

					case 'Tuất':
						$linkanh = "./images/tuat.jpg";
						break;

					case 'Hợi':
						$linkanh = "./images/hoi.jpg";
						break;

					case 'Tý':
						$linkanh = "./images/chuot.jpg";
						break;

					case 'Sửu':
						$linkanh = "./images/suu.jpg";
						break;

					case 'Dần':
						$linkanh = "./images/dan.jpg";
						break;

					case 'Mẹo':
						$linkanh = "./images/meo.jpg";
						break;

					case 'Thìn':
						$linkanh = "./images/thin.jpg";
						break;

					case 'Tỵ':
						$linkanh = "./images/ty.jpg";
						break;

					case 'Ngọ':
						$linkanh = "./images/ngo.jpg";
						break;

					case 'Mùi':
						$linkanh = "./images/mui.jpg";
						break;

					default:
						echo "Error";
						break;
				}
			}
			else
				echo "Năm không hợp lệ!";
		}
	?>

	<table>
		<tr>
			<td>Nhập năm: </td>
			<td><input type="text" name="nam"></td>
			<td><input type="submit" name="xl"></td>
		</tr>
		<tr>
			<td colspan="3">
				<img src="<?php echo $linkanh;?>" alt = "Không có hình" style="width:304px;height:228px;">
			</td>
		</tr>
	</table>
</form>

</body>
</html>