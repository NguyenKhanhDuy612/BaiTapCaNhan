<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$nameSong ="";
$level ="";
$KetQua="";
$arr =array();
$sth =array();
$xep = array();

// $path = 'demo.txt';
// $fp = @fopen($path, "a+");
  
// // Kiểm tra file mở thành công không
// if (!$fp) {
//     echo 'Mở file không thành công';
// }
// else
// {
//     // Lặp qua từng ký tự để đọc
//     $data = fread($fp, filesize('demo.txt'));
//     fwrite($fp, $data);
//     $KetQua = $data;
// }


function themNhac(){
    $path = 'demo.txt';
    $fp = @fopen($path, "a+");
    
    // Kiểm tra file mở thành công không
    if (!$fp) {
        echo 'Mở file không thành công';
    }
    else
    {
        // Lặp qua từng ký tự để đọc
       if(isset($_POST['nameSong']) && isset($_POST['level'])){
        $newdata = $_POST['level'].".".$_POST['nameSong']."\n";
       }
       while(!feof($fp))
        {
            $data = fgets($fp);
            global $KetQua;
            $KetQua .= $data;
            // $KetQua .= $data;
        }
        
        // $data = fread($fp, filesize('demo.txt')) ;
        $data .=$newdata;
        fwrite($fp, $newdata);
        // global $KetQua;
        $KetQua .= $data;
        

        fclose($fp);
    }
}
function Swap(&$a, &$b)
  {
    $tam = $a;
    $a = $b;
    $b = $tam;
  }
  function Sapxeptang($arr)
  {
    for ($i = 0; $i < count($arr); $i++)
      for ($j = $i + 1; $j < count($arr); $j++) {
        if ($arr[$i] > $arr[$j]) {
          Swap($arr[$i], $arr[$j]);
        }
      }
    return $arr;
  }
function xepHang(){
    $fp = @fopen('demo.txt', "r");
  
    // Kiểm tra file mở thành công không
    if (!$fp) {
        echo 'Mở file không thành công';
    }
    else
    {
        // Lặp qua từng dòng để đọc
        while(!feof($fp))
        {
            $str = fgets($fp);
            // substr( $string,  $start, $length )
            // strpos($str, $chuoi_tim )
            global $sth;
            $sth = array( substr( $str,  0, strpos( $str,".")) => strstr($str,".") ) ;
            // echo(($sth).",");
            
            
            
            // foreach ($arr  as $key => $value) {
            //     $key = $sth;
            //     echo "<tr>
            //          <td>$key</td>
            //          <td>$value</td>
            //       </tr>.</>";
            // }
            // <!-- foreach ($sth as $chimuc => $giatri){
            //     echo("</br>");
            //     echo $chimuc . ' => ' . $giatri;
            // } -->
        print_r($sth);

        }
        
        echo("</br>");
        // foreach ($sth as $value) {
        //     echo "<tr>
        //              <td>$value</td>
        //           </tr>.</>";
        // }
        // $thangHang=array();
        // $thangHang = sort($sth);

        // for ($i=0; $i < count($sth); $i++) { 
        //     echo($thangHang[$i]);
        // }
            
        //  $arr = explode(",",$KetQua);
        //  $xep = sort($arr);
        //  $KetQua = $xep;
//             global $KetQua;

//   $KetQua =implode(",",Sapxeptang($sth));

        

         

    }
}

    if(isset($_POST['tinh'])){
        themNhac();
        
    }
    if(isset($_POST['hien'])){
        xepHang();
    }
?>

<form action="" method="post" >
        <table>
            <tr>
                <td id="title" colspan="2" align="center">XẾP HẠNG BÀI HÁT</td>
            </tr>
            <tr class="bgtr">
                <td>Nhập tên bài hát: </td>
                <td><input class="inp" type="text" value="<?php echo $nameSong ?>" name="nameSong" id="nameSong" ></td>
            </tr>
            <tr>
                <td>Hạng: </td>
                <td><input class="inp" type="text" value="<?php echo $level ?>" name="level" id="level" pattern="[0-9]+" ></td>
            </tr>
            <tr class="bgtr">
                <td></td>
                <td>
                    <button name="tinh" id="ExecSong" type="submit" class="btn-exec">Thêm bài hát</button>
                    <button name="hien" id="ExecLevel" type="text" class="btn-exec">Hiển thị bảng xếp hạng</button>
                </td>
            </tr>
            <tr>
                <td colspan="2"><textarea class="form-control text" name="KetQua"  rows="10" cols="105"><?php echo $KetQua ?></textarea></td>
            </tr>
        </table>
    </form>
</body>
</html>