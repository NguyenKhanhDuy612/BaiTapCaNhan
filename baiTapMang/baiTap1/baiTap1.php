<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>random</title>
</head>
<body>
<?php 
        if(isset($_POST['son']))  
            $son=trim($_POST['son']); 
        else $son=0;
        // if(isset($_POST['chieurong'])) 
        //     $chieurong=trim($_POST['chieurong']); 
        // else $chieurong=0;
        
        if(isset($_POST['tinh']))
                if (is_numeric($son))  {
                    echo($son);
                    
                }
                
                else {
                        echo "<font color='red'>Vui lòng nhập vào số nguyên dương! </font>"; 
                   
                    }
        else $dientich=0;
    ?>
    <form align="center" action="" method="post">
      <table>
        <thead>
          <th colspan="2" align="center"><h3>XỬ LÝ MẢNG</h3></th>
        </thead>

        <tr>
          <td>Nhập n:</td>

          <td>
            <input
              type="text"
              name="son"
              value="<?php  echo $son;?> "
            />
          </td>
        </tr>

        <tr>
          <td colspan="2" align="center">
            <input type="submit" value="Xử lý" name="tinh" />
          </td>
        </tr>
      </table>
    </form>
</body>
</html>