<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 7</title>
    <style type="text/css">
        table {
        background-color: lightpink;
        }
        table th {
        background-color: mediumorchid;
        color: white;
        }
    </style>
</head>
<body>

<?php
    $str_cu ="";
    $str_moi="";
    $mang=array();
    // $mangNhap ="";
    
    function thayThe(&$mang,$cu,$moi){
        for ($i=0; $i < count($mang) ; $i++) { 
            if($cu == $mang[$i]){
                $mang[$i] = $moi;
            }
            
        }
        return $mang;
    }

    if((isset($_POST['tinh']))){
        $mangNhap = $_POST['mang'];
        $arr = explode(",",$mangNhap);
        $str_cu = implode(" ",$arr);
        $cu = $_POST['socanthay'];
        $moi = $_POST['sothay'];
        $str_moi = implode(" ",thayThe($arr,$cu,$moi));
    }
?>

<form action="" method="post">
    <table border="0" cellpadding="0">
      <th colspan="2">
        <h2>THAY THẾ</h2>
      </th>
      <tr>
        <td>Nhập các phần tử:</td>
        <td><input required type="text" name="mang" size="70" value="<?php if (isset($_POST['mang'])) echo $_POST['mang']; ?>" /></td>
      </tr>
      <tr>
        <td>Giá trị cần thay thế:</td>
        <td><input required type="text" name="socanthay" size="20" value="<?php if (isset($_POST['socanthay'])) echo $_POST['socanthay']; ?>" /></td>
      </tr>
      <tr>
        <td>Giá trị thay thế:</td>
        <td><input required type="text" name="sothay" size="20" value="<?php if (isset($_POST['sothay'])) echo $_POST['sothay']; ?>" /></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="tinh" size="20" value="   Thay thế  " /></td>
      </tr>
      <tr>
        <td>Mảng cũ:</td>
        <td><input type="text" name="mang_cu" size="70" disabled="disabled" value="<?php echo $str_cu; ?>" /></td>
      </tr>
      <td>Mảng sau khi thay thế:</td>
      <td><input type="text" name="mang_moi" size="70" disabled="disabled" value="<?php echo $str_moi; ?>" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>
      </tr>
    </table>
  </form>
</body>
</html>