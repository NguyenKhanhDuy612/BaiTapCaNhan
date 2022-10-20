<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.6 thông tin sản phẩm</title>
    <style>
        .title{
            font-weight: 600;
            color: orange;
            font-size: 20px;
        }
        .hinh{
            width: 200px;
            height: 150px;
            
        }
        .hinh img{
            width: 200px;
            height: 100px;
            object-fit: contain;

        }
        .noi_dung{
            width: 400px;
        }
    </style>
</head>
<body>
<?php
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
        mysqli_set_charset($conn, 'UTF8');
        
        $rowsPerPage=10; //số mẩu tin trên mỗi trang, giả sử là 10
        if (!isset($_GET['page']))
            { 
                $_GET['page'] = 1;
            }
        //vị trí của mẩu tin đầu tiên trên mỗi trang
        $offset =($_GET['page']-1)*$rowsPerPage;
        //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
        $sql = '
            SELECT Ten_sua,Ten_hang_sua,Ten_loai, Trong_luong,Don_gia,Hinh
            FROM sua 
                join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
                join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua
        
        LIMIT ';
        
        
        
        $result = mysqli_query($conn, $sql . $offset . ', ' .$rowsPerPage);
        // echo "<p align='center'><font face= 'Verdana, Geneva, sans-serif'
        // size='5'> THÔNG Các Sản Phẩm</font></P>";
        
        echo "<table align='center' width='500' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
        echo '<th colspan="4" class="title"> THÔNG TIN CÁC SẢN PHẨM</th>';
        if(mysqli_num_rows($result)<>0)
        { 
          
            // while($rows=mysqli_fetch_row($result))
            // {
            //     // print_r($rows);
            //     // echo "<tr>";
            //     // echo "<td>$rows['Ten_hang_sua']</td>";
            //     // echo "<td>$rows[1]</td>";
            //     // echo "<td>$rows[0]</td>";
            //     // echo "<td>$rows[1]</td>";
            //     // <td class='noi_dung'>
            //     //     <p><b> $rows[0]</b></p>
            //     //     <p>
                    
            //     //         $rows[3] - $rows[4] gr- $rows[5] VNĐ
            //     //     </p>
            //     //     <p></p>
            //     // </td>
            //     // echo "</tr>";
    
          
            
            // // echo "<td>$rows[0]</td>";
            // // echo "<td>$rows[1]</td>";
            
           
            $n = count(mysqli_fetch_row($result));
            // }//while
            for ($i=0; $i < $n; $i++) { 
                # code...
            }
           
        }
        echo"</table>";
    ?>
</body>
</html>