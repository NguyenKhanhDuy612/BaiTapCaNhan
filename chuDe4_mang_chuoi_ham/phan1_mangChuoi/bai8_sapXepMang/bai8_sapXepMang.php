<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  function Swap(&$a, &$b)
  {
    $tam = $a;
    $a = $b;
    $b = $tam;
  }
  function Sapxeptang($arr)
  {
    for ($i = 0; $i < count($arr); $i++)
      for ($j = $i + 1; $j < count($arr); $j++) {
        if ($arr[$i] > $arr[$j]) {
          Swap($arr[$i], $arr[$j]);
        }
      }
    return $arr;
  }
  function Sapxepgiam($arr)
  {
    for ($i = 0; $i < count($arr); $i++)
      for ($j = $i + 1; $j < count($arr); $j++) {
        if ($arr[$i] < $arr[$j]) {
          Swap($arr[$i], $arr[$j]);
        }
      }
    return $arr;
  }

  $array = array();
  $str = "";
  $array = "";
  $arr = "";
  $tang = " ";
  $giam = " ";
  if (isset($_POST['arr'])) {
    $arr = $_POST['arr'];
  }
  if (isset($_POST['sapxep'])) {
    $str = $_POST['arr'];
    $array = explode(",", $str);
    $tang = implode(",", Sapxeptang($array));
    $giam = implode(",", Sapxepgiam($array));
    ////////////////
    $fp = fopen('../bai6.txt', 'w+');
    $data =  $arr . "\n" . $tang . "\n" . $giam . "\n";
    fwrite($fp, $data);
    fclose($fp);
    $readFile = fopen('../bai6.txt', "r") or die("File $fp not found !!");
    $temp = fgets($readFile);
    $tang = fgets($readFile);
    $giam = fgets($readFile);
    fclose($readFile);
    ////////////////////
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
        <td><input type="text" name="arr" value="<?php echo $arr; ?>" size="20" /></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="sapxep" value="Sắp xếp tăng/giảm " /></td>
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