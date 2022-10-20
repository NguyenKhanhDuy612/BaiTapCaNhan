<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 6</title>
    <style type="text/css">
        table {
        background-color: lightblue;
        }

        table th {
        background-color: mediumseagreen;
        color: white;
        }
    </style>
</head>
<body>
    <?php
        $strmang="";
        $strmang_kq ="";
        $ketqua="";


        function timKiem($mang,$giaTri){
            for ($i=0; $i < count($mang) ; $i++) { 
                if($giaTri == $mang[$i]){
                    return $i;
                }
                
            }
            return -1;

        }

        if((isset($_POST['tinh']))){
            $so = $_POST['so'];
            $strmang = $_POST['mang'];
            $arr = explode(",",$strmang);
            $strmang_kq = implode(" ",$arr);
            $vitri = timKiem($arr,$so);
            if ($vitri != -1) {
                $ketqua = "Tìm thấy " . $so . " tại vị trí thứ " . $vitri . " của mảng.";
              } else {
                $ketqua = "Không tìm thấy " . $so . " trong mảng.";
              }
        }
    ?>
<form action="" method="post">
    <table border="0" cellpadding="0">
      <th colspan="2">
        <h2>TÌM KIẾM</h2>
      </th>
      <tr>
        <td>Nhập mảng:</td>
        <td><input type="text" name="mang" size="70" value="<?php echo $strmang; ?> " /></td>
      </tr>
      <tr>
        <td>Nhập số cần tìm:</td>
        <td><input type="text" name="so" size="20" value="<?php if (isset($_POST['so'])) echo $_POST['so']; ?> " /></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="tinh" size="20" value="   Tìm kiếm  " /></td>
      </tr>
      <tr>
        <td>Mảng:</td>
        <td><input type="text" name="mang_kq" size="70" disabled="disabled" value="<?php echo $strmang_kq; ?> " /></td>
      </tr>
      <td>Kết quả tìm kiếm:</td>
      <td><input type="text" name="kq" size="70" disabled="disabled" value="<?php echo $ketqua; ?> " /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>
      </tr>
    </table>
  </form>
</body>
</html>