<?php
$n = rand(1,100);
function check_prime($n)
{
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0){
            return false;
        }
    }
    return true;
}
// $n = 101;
if(check_prime($n))
    echo "{$n} là số nguyên tố";
else
    echo "{$n} không là số nguyên tố";




echo"<br>";
for ($i = 0; $i < $n; $i++){
    if ($i % 2 == 0){
        echo"<b>$i</b>";
    }
    else {
        echo"$i";

        // echo"<u>$i<u/><br>";
    }
}
// sô n là
// n là sô
// các so chan tu 1 den n la
?>