<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mảng phát sinh tính toán</title>
    <style type="text/css">

    table{

        color: #ffff00;

        background-color: gray;     

    }

    table th{

        background-color: blue;

        font-style: vni-times;

        color: yellow;

    }

</style>
</head>
<body>
    <?php
        $mang=array();
        $mangkq = "";
        $gtln="";
        $gtnn="";
        $tong="";

        function taoMang($n){
            for ($i=0; $i < $n ; $i++) { 
                $mang[$i] =rand(0,20);
            }
            return $mang;
        }
        
        function xuatMang($mang){
            $n = count($mang);
            $strMang ="";
            for ($i=0; $i < $n ; $i++) { 
               $strMang = implode(" ", $mang);
            }
            return $strMang;
        }
        function gtln($mang){
            $n = count($mang);
            $max = $mang[0];
            for ($i=0; $i < $n ; $i++) { 
                if($mang[$i] > $max){
                    $max = $mang[$i];
                }
            }
            return $max;
            
        }

        function gtnn($mang){
            $n = count($mang);
            $min = $mang[0];
            for ($i=0; $i < $n ; $i++) { 
                if($mang[$i] < $min){
                    $min = $mang[$i];
                }
            }
            return $min;
            
        }

        function tong($mang){
            $n = count($mang);
            $tong = 0;
            for ($i=0; $i < $n ; $i++) { 
                $tong += $mang[$i];
            }
            return $tong;
            
        }

        if((isset($_POST['tinh']))){
            $n = $_POST['n'];
            $mang = taoMang($n);
            $mangkq= xuatMang($mang);
            $gtln = gtln($mang);
            $gtnn = gtnn($mang);
            $tong = tong($mang);
        }
    ?>
    
    <form action="" method="post">
        <table >
            <tr>
                <th colspan="3" align="center"><h3>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h3></th>
            </tr>
            <tr>
                <td>Nhập số phần tử:</td>
                <td> 
                    <input required type="text"  name="n" value="<?php if(isset($_POST['n'])) echo $_POST['n'];?>" size="20"/>
                </td>
                

            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="tinh" value="Phát sinh và tính toán"/></td>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td><input disabled type="text"  name="mang" value="<?php echo ($mangkq);?>" size="45"/></td>
            </tr>
            <tr>
                <td>GTLN(MAX) trong mảng:</td>
                <td><input disabled type="text"  name="gtln" value="<?php echo $gtln;?>" size="20"/></td>
            </tr>
            <tr>
                <td>GTNN(MIN) trong mảng:</td>
                <td><input disabled type="text"  name="gtnn" value="<?php echo $gtnn;?>" size="20"/></td>
            </tr>
            <tr>
                <td>Tổng mảng:</td>
                <td><input disabled type="text"  name="tong" value="<?php echo $tong;?>" size="20"/></td>
            </tr>
            <tr >
                <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</label></td>
            </tr>
        </table>
    </form>
</body>
</html>