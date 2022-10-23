<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 1 - Một số thao tác trên mảng số nguyên</title>
</head>
<body>
<!-- Tạo form nhập vào 1 số tự nhiên n. Sử dụng hàm rand() (đưa ra số interger ngẫu nhiên)
 để phát sinh dữ liệu cho mảng có độ dài n. Sau đó viết hàm thực hiện các yêu cầu sau: -->
 <!-- a- Hiển thị mảng phát sinh ngẫu nhiên có độ dài n. -->
 <?php
$n ='';
$arr = array();
$a = '';
$ket_qua = '';
$ket_qua2 = '';
$ket_qua3 = '';
$chia_du = array();
$chia_du2 = array();
$chia_du3 = array();
$dem_chan ='';
$dem_lon ='';
$tong_am = 0;

function hien_thi($n,$arr){
    for ($i=0; $i < $n ; $i++) { 
        $a = rand(-1000,1000);
        $arr[]=$a;
    }
    
    // return $ket_qua;
}
    if(isset($_POST['tinh'])){
        if(isset($_POST['so_n'])){
            $n = $_POST['so_n'];
        }
        // a- Hiển thị mảng phát sinh ngẫu nhiên có độ dài n.
        // echo($n);
        // print_r($arr);
        hien_thi($n,$arr,$ket_qua);
        // $ket_qua = implode(",",$arr) ;
        // echo($ket_qua);

        
        // // b- Đếm xem có bao nhiêu thành phần trong mảng có giá trị là số chẵn.
        // for ($i=0; $i < $n ; $i++) { 
        //     if($arr[$i] %2 ==0){
        //         $dem_chan ++;
        //     }
            
        // }
        // // c- Đếm xem có bao nhiêu thành phần trong mảng có giá trị là số nhỏ hơn 100.
        // for ($i=0; $i < $n ; $i++) { 
        //     if($arr[$i] >100 ){
        //         $dem_lon ++;
        //     }
            
        // }
        // // d- Tính tổng của các thành phần trong mảng giá trị là số âm.
        // for ($i=0; $i < $n ; $i++) { 
        //     if($arr[$i] <0 ){
        //         $tong_am +=$arr[$i];
        //     }
            
        // }
        // // e- In ra vị trí của các thành phần trong mảng có chữ số kề cuối là 0.
        // for ($i=0; $i < $n ; $i++) { 
        //     $chia_du[] = $arr[$i] / 10;
        //     $chia_du2[] = $chia_du[$i] % 10;
        //     if($chia_du2[$i] == 0){
        //         $chia_du3[] = $arr[$i];
        //     }
        //     // for ($j=0; $j < $n ; $j++) { 
        //     //     $chia_du2[$j] = $chia_du[$j] % 10;
        //     // }
        //     // echo"$chia_du.",".";
        //     // echo"$chia_du2.",".";
        //     // echo"</br>";

            
        // }
        // // print_r($chia_du3);
        // $ket_qua3 = implode(",",$chia_du3);

        // // f- Sắp xếp các số đó theo thứ tự tăng dần rồi lại in ra màn hình.
        // for ($i=0; $i < $n ; $i++) { 
        //     for ($j=$i+1; $j < $n ; $j++) { 
        //         if($arr[$i] > $arr[$j] ){
        //             $tam =$arr[$i];
        //             $arr[$i] = $arr[$j];
        //             $arr[$j] =$tam;
        //         }
                
        //     }

            
        // }
        // ///////////////////////////
        // $ket_qua2 = implode(" < ",$arr) ;
        
    }
?>
 <form action="" method="POST" >
    <table>
        <tr>
            <td>
                Nhap N:
                <input type="text" name="so_n" value="<?php echo $n ?>">
            </td>
        </tr>
        <tr>
            <td>
                <!-- Kết quả -->
               <input type="submit" name="tinh" value="Tính">
            </td>
        </tr>
        <tr>
            <td>
                <!-- Kết quả -->
               <textarea name="ket_qua" id="" cols="30" rows="10"><?php echo "Mảng phát sinh la: " . $ket_qua ?>
                    <?php echo "Đếm số chẵn là: " . $dem_chan ?>
                    <?php echo "Đếm số lớn hơn 100: " . $dem_lon ?>
                    <?php echo "Tổng số âm: " . $tong_am ?>
                    <?php echo "Số kề cuối bằng số 0 là: " . $ket_qua3 ?>
                    <?php echo "Sắp tăng dần: " . $ket_qua2 ?>
                </textarea>
            </td>
        </tr>
    </table>
 </form>
</body>
</html>