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
  $arrA = "";
  $arrB = "";
  $arrC = "";
  $ptA = "";
  $ptB = "";
  $tang = "";
  $giam = "";

  if (isset($_POST['arrA'])) {
    $arrA = $_POST['arrA'];
  }
  if (isset($_POST['arrB'])) {
    $arrB = $_POST['arrB'];
  }
  if (isset($_POST['xuly'])) {
    $mangA = explode(",", $arrA);
    $mangB = explode(",", $arrB);

    $ptA = count($mangA);
    $ptB = count($mangB);
    $arrC = implode(",", array_merge($mangA, $mangB));
    $mangC = explode(",", $arrC);
    sort($mangC);
    $tang = implode(",", $mangC);
    rsort($mangC);
    $giam = implode(",", $mangC);
  }
  ?>
  <form action="" method="post">
    <table>
      <tr>
        <th colspan="3" align="center">
          <h3>ĐẾM PHẦN TỬ, GHÉP MẢNG, SẮP XẾP MẢNG</h3>
        </th>
      </tr>
      <tr>
        <td>Nhập mảng A:</td>
        <td><input type="text" name="arrA" value="<?php echo $arrA; ?>" size="20" /></td>
      </tr>
      <tr>
        <td>Nhập mảng B :</td>
        <td><input type="text" name="arrB" value="<?php echo $arrB; ?>" size="20" /></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="xuly" value="Thực hiện" /></td>
      </tr>
      <tr>
        <td>Số phần tử mảng A :</td>
        <td><input type="text" name="ptA" disabled="disabled" value="<?php echo $ptA; ?>" size="20" /></td>
      </tr>
      <tr>
        <td>Số phần tử mảng B :</td>
        <td><input type="text" name="ptB" disabled="disabled" value="<?php echo $ptB; ?>" size="20" /></td>
      </tr>
      <tr>
        <td>Mảng C:</td>
        <td><input type="text" name="arrC" disabled="disabled" value="<?php echo $arrC; ?>" size="20" /></td>
      </tr>
      <tr>
        <td>Mảng C tăng dần:</td>
        <td><input type="text" name="tang" disabled="disabled" value="<?php echo $tang; ?>" size="20" /></td>
      </tr>
      <tr>
        <td>Mảng C giảm dần :</td>
        <td><input type="text" name="giam" disabled="disabled" value="<?php echo $giam; ?>" size="20" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><label>(Các phần tử trong mảng được ngăn cách bởi dấu phẩy)</label></td>
      </tr>
    </table>
  </form>
</body>

</html>