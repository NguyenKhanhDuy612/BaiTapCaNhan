<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2: Thiết kế form tính tiền điện</title>
    <link rel="stylesheet" href="./baiTap2.css">
</head>
<body>
<?php 
        if(isset($_POST['user'])) 
            $user=trim($_POST['user']); 
        else $user="duy";

        if(isset($_POST['odd']))  
            $odd=trim($_POST['odd']); 
        else $odd=0;

        if(isset($_POST['new'])) 
            $new=trim($_POST['new']); 
        else $new=0;

        if(isset($_POST['price'])) 
             $price=trim($_POST['price']); 
         else $price=2000;

        if(isset($_POST['tinh'])){
            if(($user)){
                if(is_numeric($odd) && is_numeric($new) && is_numeric($price)){
                    if((($odd) < ($new)) ){
                            $tiendien=($new - $odd)*$price;
                        }
                        else{
                            echo "<font color='red'>Chỉ số mới phải lớn hơn chỉ số cũ </font>";
                            $tiendien = "0";
                        }
                }
                else{
                    echo "<font color='red'>Vui lòng nhập số </font>";
                    $tiendien = "0";
                }
                
            }
            else{
                echo "<font color='red'>Vui lòng nhập tên chủ hộ ! </font>";
                $tiendien = "0";
            }
        }
        else $tiendien="0";
    ?>
<form align="center" action="" method="post">
      <table>
        <thead>
          <th colspan="3" align="center"><h3>THANH TOÁN TIỀN ĐIỆN</h3></th>
        </thead>

        <tr>
          <td>Tên chủ hộ: </td>

          <td>
            <input
              type="text"
              name="user"
              value="<?php  echo $user;?> "
            />
          </td>
        </tr>

        <tr>
          <td>Chỉ số cũ:</td>

          <td>
            <input
              type="text"
              name="odd"
              value="<?php  echo $odd;?> "
            />
          </td>
          <td>(Kw)</td>
        </tr>
        <tr>
          <td>Chỉ số mới:</td>

          <td>
            <input
              type="text"
              name="new"
              value="<?php  echo $new;?> "
            />
          </td>
          <td>(Kw)</td>
        </tr>
        <tr>
          <td>Đơn giá:</td>

          <td>
            <input
              type="text"
              name="price"
              value="<?php  echo $price; ?> "
            />
          </td>
          <td>(VND)</td>
        </tr>
        <tr>
          <td>Số tiền thanh toán</td>

          <td>
            <input
              type="text"
              name="tiendien"
              disabled="disabled"
              value="<?php  echo $tiendien;?> "
            />
          </td>
          <td>(VND)</td>
        </tr>

        <tr>
          <td colspan="2" align="center">
            <input type="submit" value="Tính" name="tinh" />
          </td>
        </tr>
      </table>
    </form>
</body>
</html>