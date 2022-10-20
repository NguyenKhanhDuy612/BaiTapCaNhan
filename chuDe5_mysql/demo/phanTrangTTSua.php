<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THông tin sữa</title>
    <style>
        tr:nth-child(even){background-color: #f2f2f2;}
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
    SELECT ten_sua,Ten_hang_sua,Ten_loai, Trong_luong,
    Don_gia FROM sua 
    join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
    join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua

LIMIT ';



$result = mysqli_query($conn, $sql . $offset . ', ' .$rowsPerPage);
echo "<p align='center'><font face= 'Verdana, Geneva, sans-serif'
size='5'> THÔNG TIN SỮA</font></P>";

// $sql='select Ma_sua,ten_sua,Trong_luong,Don_gia from sua';
// $result = mysqli_query($conn, $sql);
// echo "<p align='center'><font size='5'> THÔNG TIN SỮA</font></P>";
echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
echo '<tr>
    <th width="50">STT</th>
    <th width="150">Tên sữa</th>
    <th width="150">Hãng sữa</th>
    <th width="150">Loại sữa</th>

    <th width="200">Trọng lượng</th>
    <th width="150">Đơn giá sữa</th>

</tr>';
if(mysqli_num_rows($result)<>0)
{ $stt=1;
    while($rows=mysqli_fetch_row($result))
    { echo "<tr>";
    echo "<td>$stt</td>";
    echo "<td>$rows[0]</td>";
    echo "<td>$rows[1]</td>";
    echo "<td>$rows[2]</td>";
    echo "<td>$rows[3]</td>";
    echo "<td>$rows[4]</td>";
    // echo "<td>$rows[5]</td>";
    echo "</tr>";
    $stt+=1;
    }//while
}
echo"</table>";
$re = mysqli_query($conn, 'select * from sua');
//tổng số mẩu tin cần hiển thị
$numRows = mysqli_num_rows($re);
//tổng số trang
$maxPage = floor($numRows/$rowsPerPage) + 1;

echo "<p align='center'>";
//gắn thêm nút Back
echo "<a href=" .$_SERVER['PHP_SELF']."?page="
    .( 1).">Về đầu</a> ";

if ($_GET['page'] > 1){
    echo "<a href=" .$_SERVER['PHP_SELF']."?page="
    .($_GET['page']-1).">Back</a> ";
    
}

for ($i=1 ; $i<=$maxPage ; $i++)
{ if ($i == $_GET['page'])
    { echo '<b>Trang'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
    }
else
echo "<a href=" .$_SERVER['PHP_SELF']. "?page="
.$i.">Trang".$i."</a> ";
}
//gắn thêm nút Next
if ($_GET['page'] < $maxPage){
    echo "<a href=". $_SERVER['PHP_SELF']."?page="
    .($_GET['page']+1).">Next</a>";
}

echo "<a href=" .$_SERVER['PHP_SELF']."?page="
    .( $maxPage).">Về cuối</a> ";
echo "</p>";
// echo "<p align='center'>Tong so trang la: $maxPage </p>";
?>

</body>
</html>
