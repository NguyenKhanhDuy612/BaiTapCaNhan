<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
    <style type="text/css">

    table{

        color: #ffff00;

        background-color: gray;     

    }

    table th{

        background-color: blue;

        font-style: vni-times;

        color: yellow;

    }

</style>
</head>
<body>
    <?php
     // khai báo
    $outputMang = array();
    $outputKetQua ='';
    $soSearch = '';
    $textMang = '';
    $strMang ='';

    function timKiem($outputMang,$soSearch){
        for ($i=0; $i < count($outputMang); $i++) { 
            if($soSearch === $outputMang[$i]){
                return 1;
            }
            
        }
        return -1;
    }

    if(isset($_POST['soSearch'])){

        $soSearch=$_POST['soSearch'];
    
    }
    
        
        if (isset($_POST['submit'])) {
            $textMang=$_POST['textMang'];
            $outputMang = explode(',',$textMang);
            $strMang = implode(',', $outputMang);
            timKiem($outputMang,$soSearch);
            if(timKiem($outputMang,$soSearch) != -1){
                $outputKetQua = 'tìm thấy';
            }
            else{
                $outputKetQua = 'không tìm thấy';
            }
        }
    ?>
<!--  -->
<!--  -->
    <form action="" method="POST">
        <table>
        <th colspan="2"><h2>TÌM KIẾM</h2></th>
            <tr>
                <td>
                    Nhập mảng:
                </td>
                <td>
                    <input required type="text" name="textMang" 
                    value="<?php echo $textMang;?>">
                </td>
            </tr>
            <tr>
                <td>
                    Nhập số cần tìm:
                </td>
                <td>
                    <input required type="text" name="soSearch" 
                    value="<?php echo($soSearch) ?>">
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" name="submit" value="Tìm kiếm">
                </td>
            </tr>
            <tr>
                <td>
                    Mảng:
                </td>
                <td>
                    <input disabled type="text" name="strMang" 
                    value="<?php echo($strMang) ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Kết quả tìm kiếm:
                </td>
                <td>
                    <input disabled type="text" name="outputKetQua" 
                    value="<?php echo($outputKetQua) ?>">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>