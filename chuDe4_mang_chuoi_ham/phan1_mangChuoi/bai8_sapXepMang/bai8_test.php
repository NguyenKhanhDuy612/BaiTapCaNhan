<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 8 - Thiết kế Form Sắp xếp mảng</title>
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
$arr =array();
$tang="";
$giam="";

function hoanVi(&$b,&$c){
    $a = $b;
    $b =$c;
    $c = $a;
}

function sapTang($mang){
    for ($i=0; $i < count($mang); $i++) { 
        for ($j=$i+1; $j < count($mang); $j++) { 
            if($mang[$i] > $mang[$j]){
                hoanVi($mang[$j],$mang[$i]);
            }
        }
    }
    return $mang;
}

function sapGiam($mang){
  for ($i=0; $i < count($mang); $i++) { 
      for ($j=$i+1; $j < count($mang); $j++) { 
          if($mang[$i] < $mang[$j]){
              hoanVi($mang[$j],$mang[$i]);
          }
      }
  }
  return $mang;
}


if((isset($_POST['tinh']))){
  $mangNhap = $_POST['mang'];
  $arr = explode(",",$mangNhap);
  // $str= sapTang($arr);
  $tang =implode(",",sapTang($arr));
  $giam =implode(",",sapGiam($arr));
}


?>

<form action="" method="post">
    <table>
      <tr>
        <th colspan="3" align="center">
          <h3>SẮP XẾP MẢNG</h3>
        </th>
      </tr>
      <tr>
        <td>Nhập mảng :</td>
        <td><input type="text" name="mang" value="<?php if (isset($_POST['mang'])) echo $_POST['mang']; ?>" size="20" /></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="tinh" value="Sắp xếp tăng/giảm " /></td>
      </tr>
      <tr>
        <td>Sau khi sắp xếp:</td>
        <td></td>
      </tr>
      <tr>
        <td>Tăng dần:</td>
        <td><input type="text" name="tang" disabled="disabled" value="<?php echo $tang; ?>" size="20" /></td>
      </tr>
      <tr>
        <td>Giảm dần :</td>
        <td><input type="text" name="giam" disabled="disabled" value="<?php echo $giam; ?>" size="20" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><label>(Các phần tử trong mảng được ngăn cách bởi dấu phẩy)</label></td>
      </tr>
    </table>
  </form>
</body>
</html>