<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 1 - Một số thao tác trên mảng số nguyên</title>
</head>
<body>
<?php
// khai báo
    $array = array();
    $nhapN;
// /////////////
    if(isset($_POST['nhapN']))  
        $nhapN=trim($_POST['nhapN']); 
    else $nhapN=0;

    echo ("n la:" .$nhapN."</br>");
    echo("a-Phần tử trong mảng"."</br>");
    for ($i=0; $i < $nhapN; $i++) { 
        $a = rand(-1000,1000);
        // echo("a la:" .$a."</br>");
       
        $array[$i] = $a;
        // echo("hello"."</br>");
    }



    function mangNgauNhien($nhapN,$array){
        echo( "</br>");
        echo("e- In ra vị trí của các thành phần trong mảng có chữ số kề cuối là 0.");
        echo( "</br>");
        echo( "</br>");
        
        
        // $tam =0;
        // for ($i=0; $i < $nhapN; $i++) { 
        //     for ($j=0; $j < $nhapN-1; $j++) { 
        //         if ($array[$i] <$array[$j]) {
        //             $tam = $array[$i];
        //             $array[$i] = $array[$j];
        //             $array[$j] =  $tam;
        //             echo( $tam);
        //             if($i <$nhapN -1){
        //                 echo( ",");
        //             }
        //         }
        //     }
            
        // }
    }
    // a- Hiển thị mảng phát sinh ngẫu nhiên có độ dài n.
    function hienTHiMang($nhapN,$array){
        
        echo("mang la:");
    
        for ($i=0; $i < $nhapN; $i++) { 
            echo( $array[$i]);
            if($i <$nhapN -1){
                echo( ",");
            }
        }
    }
    // b- Đếm xem có bao nhiêu thành phần trong mảng có giá trị là số chẵn.
    function mangChan($nhapN,$array){
        echo( "</br>");
        echo("b-Đếm phần tử chẵn trong mảng"."</br>");
        $dem =0;
        for ($i=0; $i < $nhapN; $i++) { 
            if ($array[$i] %2 == 0) {
                echo( $array[$i]);
                if($i <$nhapN -1){
                    echo( ",");
                }
                $dem+=1;
            }
        }
        echo( "</br>");
        echo("Có ".  $dem." phần tử trong mảng là số chẵn"."</br>");
    }
    // c- Đếm xem có bao nhiêu thành phần trong mảng có giá trị là số nhỏ hơn 100.
    function max100($nhapN,$array){
        echo( "</br>");
        echo("Câu c Đếm xem có bao nhiêu thành phần trong mảng có giá trị là số nhỏ hơn 100");
        echo( "</br>");
        $demmin=0;
        for ($i=0; $i < $nhapN; $i++) { 
            if ($array[$i] %2 == 0) {
                echo( $array[$i]);
                if($i <$nhapN -1){
                    echo( ",");
                }
                $demmin+=1;
            }
        }
        echo( "</br>");
        echo("Có ".  $demmin." phần tử trong mảng bé hơn 100"."</br>");
        echo( "</br>");
    }
    // d- Tính tổng của các thành phần trong mảng giá trị là số âm.
    function tongAm($nhapN,$array){
        echo( "</br>");
        echo("d- Tính tổng của các thành phần trong mảng giá trị là số âm.");
        echo( "</br>");
        $tongAm=0;
        for ($i=0; $i < $nhapN; $i++) { 
            if ($array[$i] <0) {
                // echo( $array[$i]);
                // if($i <$nhapN -1){
                //     echo( ",");
                // }
                $tongAm+=$array[$i];
            }
        }
        echo("Tổng các số âm là: ". $tongAm);
        echo( "</br>");
    }
    // e- In ra vị trí của các thành phần trong mảng có chữ số kề cuối là 0.
    // f- Sắp xếp các số đó theo thứ tự tăng dần rồi lại in ra màn hình.
    function sapXepTang($nhapN,$array){
        echo("f- Sắp xếp các số đó theo thứ tự tăng dần rồi lại in ra màn hình.");
        echo( "</br>");
        sort($array);
        for ($i=0; $i < $nhapN; $i++) { 
            // if ($array[$i] <0) {
                echo( $array[$i]);
                if($i <$nhapN -1){
                    echo( ",");
                }
            // }
        }
    }
    // a- Hiển thị mảng phát sinh ngẫu nhiên có độ dài n.
    hienTHiMang($nhapN,$array);
    // b- Đếm xem có bao nhiêu thành phần trong mảng có giá trị là số chẵn.
    mangChan($nhapN,$array);
    // c- Đếm xem có bao nhiêu thành phần trong mảng có giá trị là số nhỏ hơn 100.
    max100($nhapN,$array);
    // d- Tính tổng của các thành phần trong mảng giá trị là số âm.
    tongAm($nhapN,$array);
    // e- In ra vị trí của các thành phần trong mảng có chữ số kề cuối là 0.
// mangNgauNhien($nhapN,$array);
    // f- Sắp xếp các số đó theo thứ tự tăng dần rồi lại in ra màn hình.
    sapXepTang($nhapN,$array);


    
?>
<form action="" method="post">
    Nhập n: <input type="text" name="nhapN" value="<?php  echo $nhapN;?> "><br>
    <!-- n là độ dài của mảng -->
    <input type="submit" name="submit" value="Submit">  
</form>
</body>
</html>