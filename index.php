
<!DOCTYPE html>
<html>
<body>

<?php
// có hai biến gán gí trị cụ thể
// tính cộng trừ nhân chia

$a = rand(-1000,1000);
$b =rand(-1000,1000);;
$t = 0;
$t = $a + $b;
echo "$a + $b = $t <br>";
$t = $a - $b;
echo "$a - $b = $t <br>";
$t = $a * $b;
echo "$a * $b = $t <br>";
$t = $a / $b;
echo "$a / $b = ".round($t,2)."<br>";
echo"Ham pop: $a^2 = ".pow($a,2);

echo("<br>");
//Nếu là số chẵn thì kiểm tra tiếp số đó có lớn hơn 100 hay không, nếu lớn hơn 100 thì xuất ra màn hình “Số chẵn này lớn hơn 100″, ngược lại xuất ra màn hình “Số chẵn này không lớn hơn 100″.
$number = rand(1,1000);
echo"số được tạo là $number <br>";
if($number %2 == 0){
    if ($number >100){
        echo"Số chẵn và lớn hơn 100";
    }
    else if ($number <100){
        echo"Số chẵn và nhỏ hơn 100";
    }
}
else if($number %2 != 0){
    if ($number >100){
        echo"Số lẻ và lớn hơn 100";
    }
    else if ($number <100){
        echo"Số lẻ và nhỏ hơn 100";
    }
}
echo("<br>");
for ($i = 1; $i < 10; $i++)
{
    for ($j = 9; $j >= $i; $j--)
    {
        echo $j;
    }
echo '<br/>';;
}
echo("<br>");
echo("<br>");

$n = rand(1,1000);

?>

</body>
</html>
