<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma trận dạng nhập</title>
</head>

<body>
  <?php
  //-- tạo mảng có NxM phần tử, các phần tử có giá trị [1,200]
  if (isset($_POST['n'])) {
    $n = $_POST['n'];
  } else {
    $n = 0;
  }
  if (isset($_POST['m'])) {
    $m = $_POST['m'];
  } else {
    $m = 0;
  }
  //-- khởi tạo mảng 2 chiều
  $kq = "";
  if (isset($_POST['hthi'])) {
    $arr = array();
    for ($i = 0; $i < $n; $i++) {
      for ($j = 0; $j < $m; $j++) {
        $x = rand(1, 200);
        $arr[$i][$j] = $x;
      }
    }
    $kq = "Ma trận $n dòng $m cột:  &#13;&#10;";
    // -- in kết quả mảng random
    for ($i = 0; $i < $n; $i++) {
      for ($j = 0; $j < $m; $j++) {
        $kq .= $arr[$i][$j] . " ";
      }
      $kq .= "&#13;&#10;";
    }
    //-- Hiển thị các phần tử thuộc dòng chẵn cột lẻ
    $kq .= "Các phần tử thuộc dòng chẵn cột lẻ:";
    for ($i = 0; $i < $n; $i++) {
      for ($j = 0; $j < $m; $j++) {
        if ($i % 2 != 0 && $j % 2 == 0)
          $kq .= $arr[$i][$j] . " ";
      }
    }
    //-- Tổng các phần tử là bội số của 10
    $sum = 0;
    for ($i = 0; $i < $n; $i++) {
      for ($j = 0; $j < $m; $j++) {
        if ($arr[$i][$j] % 10 == 0)
          $sum = $sum + $arr[$i][$j];
      }
    }
    $kq .= "&#13;&#10;" . "Tổng giá trị các phần tử là bội số của 10 là: $sum";
  }
  ?>
  <form action="" method="post">
    <fieldset>
      <legend><b>MA TRẬN DẠNG NHẬP</b></legend>
      <table>
        <tr>
          <td>Số dòng:</td>
          <td><input type="text" name="n" /> (Từ 2 đến 5 dòng)</td>
        </tr>
        <tr>
          <td>Số cột: </td>
          <td><input type="text" name="m" /> (Từ 2 đến 5 cột)</td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" value="Xử lý" name="hthi" />
          </td>
        </tr>
        <tr>
          <td>Kết quả: </td>
          <td>
            <textarea name="textarea" rows="10" cols="35"><?php echo $kq; ?></textarea>
          </td>
        </tr>
      </table>
    </fieldset>
  </form>
</body>

</html>