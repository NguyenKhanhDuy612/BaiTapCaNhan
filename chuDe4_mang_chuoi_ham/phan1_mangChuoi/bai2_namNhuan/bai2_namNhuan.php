<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 2 - Thiết kế Form tìm năm nhuận</title>
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
    // hàm kiểm tra năm nhuận
    function nam_nhuan($namMot){
        if($namMot % 400 == 0 || ($namMot % 4 == 0 && $namMot % 100 != 0))
        {
            return 1;
        }
        else{
            return 0;
        }
    }
    if(isset($_POST['namMot'] ) && isset($_POST['namHai']))
    {
        $namMot=$_POST['namMot'];
        $namHai=$_POST['namHai'];
        $kq = "";
        $kqHai = "";
        foreach (range(2000,$namMot) as $year)
        {
            if(nam_nhuan($year)){
                $kq = $kq. $year . " ";
        }
        
        }
        if($kq!=""){
            $kq =$kq . " là năm nhuận";
        }
        else{
            $kq = "Không có năm nhuận";
        }
// lơn hơn 2000
        foreach (range(2000,$namHai) as $yearHai)
        {
            if(nam_nhuan($yearHai)){
                $kqHai = $kqHai. $yearHai . " ";
        }
        
        }
        if($kqHai!=""){
            $kqHai =$kqHai . " là năm nhuận";
        }
        else{
            $kqHai = "Không có năm nhuận";
        }
    }
  else{
    $kq = "";
    $kqHai = "";
  }

    
?>

    <form action="" method="post">
        <fieldset>
            <table>
                <tr class="noiDung">
                    <td >
                        Năm nhập vào nhỏ hơn năm 2000
                    </td>
                </tr>

                <tr class="tieuDe">
                    <th>
                        <h3>TÌM NĂM NHUẬN</h3>
                    </th>
                </tr>

                <tr>
                    <td>
                        Năm:
                        <input required type="text"  name="namMot" 
                        value="<?php if(isset($_POST['namMot'])) 
                        echo $_POST['namMot'];?>"/>

                    </td>
                </tr>
                <tr>
                    <td>
                    <textarea name="kq" disabled cols="30" rows="2"><?php echo $kq?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Tìm năm nhuận"/>
                    </td>
                </tr>
            </table>
            <br>
            <br>
            <hr>
            <table>
                <tr class="noiDung">
                    <td >
                        Năm nhập vào lớn hơn năm 2000
                    </td>
                </tr>

                <tr class="tieuDe">
                    <th>
                        <h3>TÌM NĂM NHUẬN</h3>
                    </th>
                </tr>

                <tr>
                    <td>
                        Năm:
                        <input required type="text"  name="namHai" 
                        value="<?php if(isset($_POST['namHai'])) 
                        echo $_POST['namHai'];?>"/>

                    </td>
                </tr>
                <tr>
                    <td>
                    <textarea name="kqHai" disabled cols="30" rows="2"><?php echo $kqHai?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Tìm năm nhuận"/>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>