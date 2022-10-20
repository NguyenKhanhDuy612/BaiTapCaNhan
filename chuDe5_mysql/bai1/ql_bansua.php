

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
        border:1px solid black;
        }
    </style>
</head>
<body>
    <?php
    // 1. Ket noi CSDL
    // require("")
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die ('Không thể kết nối tới database'. mysqli_connect_error());
    // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    $sql = "SELECT * FROM Khach_hang";
    $result = mysqli_query($conn, $sql);
    // 4.Xu ly du lieu tra ve

    if(mysqli_num_rows($result)!=0){
    while ($row = mysqli_fetch_array($result))
        {   for ($i=0; $i<mysqli_num_fields($result); $i++)
            {
                echo( $row[$i] . " ");
            }
            
            echo("</br>");
        }
        
    }
    // 5. Xoa ket qua khoi vung nho va Dong ket noi
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
</body>
</html>