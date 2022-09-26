<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3: Tạo trang web thực hiện phép tính trên 2 số</title>
    <link rel="stylesheet" href="./baiTap3.css">
</head>
<body>
<?php 
        if(isset($_POST['onenumber']))  
            $onenumber=trim($_POST['onenumber']); 
        else $onenumber=0;

        if(isset($_POST['twonumber'])) 
            $twonumber=trim($_POST['twonumber']); 
        else $twonumber=0;
        
        if(isset($_POST['tinh']))
          if(($onenumber) && ($twonumber)){
            if (is_numeric($onenumber) && is_numeric($twonumber))  {
              if(isset($_POST['pheptinh'])&&$_POST['pheptinh']=='cong'){
                $ketqua=$onenumber + $twonumber;
              }else{
                if(isset($_POST['pheptinh'])&&$_POST['pheptinh']=='tru'){
                  $ketqua=$onenumber - $twonumber;
                }else{
                  if(isset($_POST['pheptinh'])&&$_POST['pheptinh']=='nhan'){
                    $ketqua=$onenumber * $twonumber;
                  }else{
                    if(isset($_POST['pheptinh'])&&($_POST['pheptinh']=='chia')&& ($twonumber) >0){
                      $ketqua=$onenumber / $twonumber;
                    }
                    else{
                      echo "<font color='red'>Vui lòng nhập số thứ 2 lớn hơn không </font>"; 
                      $ketqua="";
                    }
                  }
                }
              }
            }
            else {
                    echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                $ketqua="";
                }
          }else{
            echo "<font color='red'>Vui lòng nhập giá trị! </font>"; 
                $ketqua="";
          }
                
        else $ketqua="0";
    ?>
    <form align="center" action="./ketQuaBaiTap3.php" method="post">
      <table>
        <thead>
          <th class="color__blue" colspan="5" align="center"><h3>PHÉP TÍNH TRÊN HAI SỐ</h3></th>
        </thead>
        <tr>
          <td class="color__red">Chọn phép tính: </td>

          <td>
          <input type="radio" name="pheptinh" value="cong" <?php if(isset($_POST['pheptinh'])&&$_POST['pheptinh']=='cong')
              echo 'checked="checked"';?> checked/>		
              Cộng
          </td>

          <td>
          <input type="radio" name="pheptinh" value="tru" <?php if(isset($_POST['pheptinh'])&&$_POST['pheptinh']=='tru')
              echo 'checked="checked"';?> />		
              Trừ
          </td>

          <td>
          <input type="radio" name="pheptinh" value="nhan" <?php if(isset($_POST['pheptinh'])&&$_POST['pheptinh']=='nhan')
              echo 'checked="checked"';?> />		
              Nhân
          </td>

          <td>
          <input type="radio" name="pheptinh" value="chia" <?php if(isset($_POST['pheptinh'])&&$_POST['pheptinh']=='chia')
              echo 'checked="checked"';?> />		
              Chia
          </td>
        </tr>

        <tr>
          <td class="color__blue">Số thứ nhất:</td>

          <td colspan="4">
            <input
              type="text"
              name="onenumber"
              value="<?php  echo $onenumber;?> "
            />
          </td>
        </tr>

        <tr>
          <td class="color__blue">Số thứ nhì:</td>

          <td colspan="4">
            <input
              type="text"
              name="twonumber"
              value="<?php  echo $twonumber;?> "
            />
          </td>
        </tr>

        <!-- <tr>
          <td>Kết quả:</td>

          <td>
            <input
              type="text"
              name="ketqua"
              disabled="disabled"
              value="<?php  echo $ketqua;?> "
            />
          </td>
        </tr> -->

        <tr>
          <td colspan="4" align="center">
            <input type="submit" value="Tính" name="tinh" />
          </td>
        </tr>
      </table>
    </form>
</body>
</html>