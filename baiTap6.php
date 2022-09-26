<?php
$fp = @fopen('demo1.txt', "w+");
// for ($i=1; $i < 5; $i++) { 
//     $n = rand(0,6);
//     $n1 = rand(0,6);
//     // $data = $n;
//     if ($n == $n1) {
//         fwrite($fp, "Số n là ".$n."\n");

//     }
//     else{

//     }

// }
for ($i=1; $i <= 5; $i++) { 
    $n = rand(0,65);
    $n1 = rand(0,65);
    while($n==$n1){
        $n = rand(0,65);
    }
    if($n >= 0 && $n <=9){
    //  echo"Số n là "."0".$n."</br>";
    echo"0".$n." - ";
    fwrite($fp, "0".$n." - ");

        // fwrite($fp, "Số n là "."0".$n."\n");
    }
    else{
        // echo"Số n là ".$n."</br>";
        echo $n." - ";
        // fwrite($fp, "Số n là ".$n."\n");
        
        fwrite($fp, $n." - ");

    }
 }


 fclose($fp);
// 5 cặp số ngẫu nhiên khác nhau có hai chữ số
// có giá trị từ 0 đến 65
// a in ra màng hình
// b lưu vào file
?>