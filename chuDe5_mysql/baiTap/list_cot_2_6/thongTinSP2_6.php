<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.6 thông tin sản phẩm</title>
    <style>
        td{
            width: 200px;
        }
        
        img{
            width: 200px;
            height: 300px;
            
        }
       
    </style>
</head>
<body>
<?php
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
        mysqli_set_charset($conn, 'UTF8');
        $sql = '
            SELECT Ten_sua,Ten_hang_sua,Ten_loai, Trong_luong,Don_gia,Hinh
            FROM sua 
                join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
                join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua
            ';
        
        
        $result = mysqli_query($conn, $sql );
        // $a =count($rows=mysqli_fetch_row($result));
        $mang = [];
        
            while($rows=mysqli_fetch_array($result))
                {
                    $mang[] = $rows;
                    
                }
        echo "<table align='center' width='500' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
        echo '<th colspan="5" class="title"> THÔNG TIN CÁC SẢN PHẨM</th>';
        // $b=0;
            for ($i=1; $i < 100; $i++) { 
                echo "<tr>";
                    // echo "<td>";
                    
                for ($j= 0; $j < 5; $j++) { 
                    $a=rand(0,20);
                    echo "<td align='center'>
                                <h3>".$mang[$a]['Ten_sua']."</h3>
                                ".$mang[$a]['Trong_luong']."
                                    gr - 
                                ".$mang[$a]['Don_gia']."
                                    VND
                            <img src='../Hinh_sua/".$mang[$a]['Hinh']."'/>
                            </td>";
                }
                    // echo"</td>";
                echo"</tr>";
                // $b=$b+5;
            }
           
        echo"</table>";
        print_r($a);
    ?>
</body>
</html>