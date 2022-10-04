<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập nhập cột và dòng</title>
    <link rel="stylesheet" href="./dongCot.css">
</head>
<body>
    <?php

    if(isset($_POST['dong']))  
        $dong=trim($_POST['dong']); 
    else $dong=0;

    if(isset($_POST['cot']))  
        $cot=trim($_POST['cot']); 
    else $cot=0;

        // if(isset($_POST['xl'])){
        //     if(is_numeric($_POST['dong'])){
        //         if(($dong) > 1){
        //             if(is_numeric($_POST['cot'])){
        //                 if($cot > 1 && $cot <6){
        //                     return $cot;
        //                 }
        //                 else{
        //                     echo("Vui long nhap số trong khoảng cho phép");
        //                     $cot=0;
        //                 } 
        //             }
        //             else{
        //                 echo("Vui long nhap số");
        //                 $cot=0;
        //             }
        //         }
        //         else{
        //             echo("Vui long nhap số trong khoảng cho phép");
        //             $dong=0;
        //         } 
        //     }
        //     else{
        //         echo("Vui long nhap số ");
        //         $dong=0;
        //     }


            

        // }
        // echo ("dong la: ".$dong);
        // echo ("dong la: ".$cot);
        $car = array();
        if(isset($_POST['xl'])){
            $cars = array (
                array(rand(-10,10),rand(-10,10),rand(-10,10),rand(-10,10),rand(-10,10)),
                array(rand(-10,10),rand(-10,10),rand(-10,10),rand(-10,10),rand(-10,10)),
                array(rand(-10,10),rand(-10,10),rand(-10,10),rand(-10,10),rand(-10,10)),
                array(rand(-10,10),rand(-10,10),rand(-10,10),rand(-10,10),rand(-10,10)),
                array(rand(-10,10),rand(-10,10),rand(-10,10),rand(-10,10),rand(-10,10)),
            );
            // for ($row = 0; $row < $cot; $row++) {
            //     echo "";
            //     for ($col = 0; $col < $dong; $col++) {
            //         echo $cars[$row][$col]." ";
            //     }
            //     echo "<br>";
            // }
        }
        // for ($row = 0; $row < $dong; $row++) {
        //     echo "Row number $row: ";
        //     for ($col = 0; $col < $cot; $col++) {
        //         echo $cars[$row][$col]."123 ";
        //     }
        //     echo "<br>";
        // }

        // if (empty($_POST["comment"])) {
        //     $comment = "";
        //   } else {
        //     $comment = test_input($_POST["comment"]);
        //   }
    ?>
<form align="center" action="" method="post">
      <table>
        <thead>
          <th class="color__blue" colspan="4" align="center"><h3>Mảng 2 chiều</h3></th>
        </thead>
        

        <tr>
          <td class="color__blue">Nhập số dòng</td>

          <td>
            <input
            required
              type="text"
              name="dong"
              value="<?php  echo $dong;?> "
            />
          </td>
          <td class="color__red">(2 <= dòng <= 5)</td>
        </tr>

        <tr>
          <td class="color__blue">Nhập số cột</td>

          <td>
            <input
            required
              type="text"
              name="cot"
              value="<?php  echo $cot;?> "
            />
          </td>
          <td class="color__red">(2 <= cột <= 5)</td>
        </tr>

        <tr>
          <td colspan="3" align="center">
            <input  type="submit" value="Xử Lý" name="xl" />
          </td>
        </tr>

        <tr>
            <td>Kết quả:</td>
            <td colspan="2">
              <textarea name="comment" rows="5" cols="40">
            <?php 
            for ($row = 0; $row < $cot; $row++) {
                echo "";
                for ($col = 0; $col < $dong; $col++) {
                    echo $cars[$row][$col]." ";
                }
                echo "\n";
            }
            ?>
           
            </textarea>
            </td>
          </tr>
      </table>
    </form>
</body>
</html>