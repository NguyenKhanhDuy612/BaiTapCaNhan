<?php
$a = rand(1,4);
$b = rand(10,100);
$pi = 3.14;
echo"$a";
echo '<br/>';;

switch($a){
    case 1:
        echo"Tính chu vi và diện tích của hình vuông";
        echo '<br/>';;
        echo"chu vi la: $b*4".$b*4;
        echo '<br/>';;
        echo"Dien tich la: $b*$b".$b*$b;
        echo '<br/>';;
        break;
    case 2:
        echo"Tính chu vi và diện tích của hình tròn";
        echo '<br/>';;
        echo"Chu vi la: $b*2*pi = ".$b*2*$pi;
        echo '<br/>';;
        echo"Dien tich la: pi*$b = ".$pi*$b;
        echo '<br/>';;
        break;
    case 3:
        echo"Tính chu vi và diện tích của hình tam giác đều";
        echo '<br/>';
        echo"Chu vi la: $b*3 = ".$b*3;
        echo '<br/>';;
        echo"Dien tich la: $b*sqrt(3)/2 = ".(($b*sqrt(3)/2)*$b)/2;
        echo '<br/>';;
        break;
    case 4:
        echo"Tính chu vi và diện tích của hình chữ nhật";
        echo '<br/>';;
        echo"Chu vi la: ($b+$b)*2 = ".($b+$b)*2;
        echo '<br/>';;
        echo"Dien tich la: $b*$b = ".$b*$b;
        echo '<br/>';;
        break;
}
// if($a==1){
    
// }
// if($a==2){
//     echo"Tính chu vi và diện tích của hình tròn";
//     echo '<br/>';;
//     echo"Chu vi la: $b*2*pi";
//     echo '<br/>';;
//     echo"Dien tich la: pi*$b"."3.14*$b";
//     echo '<br/>';;
//     }
?>