<?php
$fp = @fopen('demo.txt', "w+");

$n = rand(1,10);
// echo"Bang cưu chương $n";
// echo '<br/>';
if (!$fp) {
    echo 'Mở file không thành công';
}
else{
    // for ($i = 1; $i <= $n; $i++)
    // {
        
    //     // $data = '$i';

    //     echo '<br/>';;
    //     fwrite($fp, "$i*$n = ".$i*$n);
    // }
    // fclose($fp);
fwrite($fp, "Số n là ".$n."\n");

    function check_prime($n)
{
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0){
            return false;
        }
    }
    return true;
}
if(check_prime($n))
    fwrite($fp,"{$n} là số nguyên tố"."\n");
else
    fwrite($fp,"{$n} không là số nguyên tố"."\n");

    fwrite($fp,"Các số chẵn từ 1 đến $n là: ");

for ($i = 0; $i < $n; $i++){
    if ($i % 2 == 0){
        fwrite($fp,$i."\t");
    }
    
}

}
    fclose($fp);



?>