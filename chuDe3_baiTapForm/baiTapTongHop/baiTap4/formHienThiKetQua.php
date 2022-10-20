
<?php 

if((isset($_POST['gui']))){
    $name = $_POST["name"];
    $address = $_POST["adr"];
    $numberphone = $_POST["phone"];
    $gender = $_POST["gender"];
    $nationality = $_POST["country"];
    $comment = $_POST["comment"];


    echo "<b>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</b> <br>";
    echo "Họ tên: ".$name ."<br>";
    echo "Giới tính: ".$gender."<br>";
    echo "Địa chỉ: ".$address."<br>";
    echo "Điện thoại: " .$numberphone."<br>";
    echo "Quốc tịch: " .$nationality."<br>";
    echo "Môn học: " ;
    if(isset($_POST['chk1'])) echo ($_POST['chk1'])  ;
    echo(" ");
    if(isset($_POST['chk2'])) echo ($_POST['chk2']);
    echo(" ");
    if(isset($_POST['chk3']))  echo ($_POST['chk3']);
    echo(" ");
    if(isset($_POST['chk4']))  echo ($_POST['chk4']);
    echo("</br>");
    echo "Ghi chú: " .$comment."<br>";
    echo "<a href='javascript:window.history.back(-1);'>Trở về trang trước</a>";
}
else{
    echo("vui long nhap lieu");
}
        
    ?>

