<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Thông tin sữa</title>
<style>


 tr:nth-child(even){background-color: #f2f2f2;}


    </style>

</head>

<body>

<?php

 

  // Ket noi CSDL

//require("connect.php");

$conn = mysqli_connect ('localhost', 'root', '', 'qlbansua') 

		OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

$sql = 'select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi,Dien_thoai,Email from khach_hang';

$result = mysqli_query($conn, $sql);

// $hinhanh=$_FILES["./img"]['./img/nam.PNG'];


echo "<p align='center'><font size='5' color='blue'> THÔNG TIN Khách Hàng</font></P>";

 echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";

 echo '<tr>


     <th width="50">Mã khách hàng</th>

    <th width="150">Tên khách hàng</th>

    <th width="200">Giới tính</th>
    <th width="200">Địa chỉ</th>
    <th width="200">Điện thoại</th>
    <th width="200">Email</th>


</tr>';



 if(mysqli_num_rows($result)<>0)

 {	 $stt=1;

	while($rows=mysqli_fetch_row($result))

	{        
        if ($rows[2] == 0 ) {
            $rows[2] = "<img src='./img/nam.PNG' >";
        }
        else{
            $rows[2] = '<img src="./img/nu.PNG" alt="">';
           
        }
        echo "<tr>";
		     echo "<td>$rows[0]</td>";
		     echo "<td>$rows[1]</td>";
		     echo "<td>$rows[2]</td>";
		     echo "<td>$rows[3]</td>";
		     echo "<td>$rows[4]</td>";
		     echo "<td>$rows[5]</td>";

		     echo "</tr>";

	             $stt+=1;

	}

 }

echo"</table>";

?>

</body>

</html>