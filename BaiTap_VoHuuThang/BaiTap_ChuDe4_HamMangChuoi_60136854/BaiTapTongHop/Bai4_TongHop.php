<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mảng 2 chiều</title>
</head>
<body>
    <?php
        /**
        * 
        */
        if(isset($_POST['hang'])){
            $hang=trim($_POST['hang']);
        }
        else{
            $hang=0;
        }
        if(isset($_POST['cot'])){
            $cot=trim($_POST['cot']);
        }else{
            $cot=0;
        }
        //--------------------------------
        if(isset($_POST['inmang'])){
            if(empty($_POST['hang'])){
                echo "Không để khoảng trắng";
            }
            elseif(empty($_POST['cot'])){
                echo "Không để khoảng trắng";
            }
            else
            {
                class Ex
                {
                    function __construct()
                    {
                        $m=$_POST['hang'];//Dòng
                        $n=$_POST['cot'];//Cột
                        echo "<b>Ma trân $m x $n</b>";
                        $array = [];
                        // Nhập mảng 4x4 ngẫu nhiên
                        for ($a=0; $a < $m; $a++) { 
                            echo "<td>";
                            for ($b=0; $b < $n; $b++) { 
                                $array[$a][$b] = rand(-200, 200);
                            }
                            echo "</td>";
                        }
                        $this->render_Matrix($array, 0);
                        //Cái này kiểm tra nếu khác 0 thì thay bằng 1
                        for ($a=0; $a < $m; $a++) { 
                            echo "<td>";
                            for ($b=0; $b < $n; $b++) { 
                                if($array[$a][$b]!=0){
                                    $array[$a][$b]=1;//Thay thế các phần tử khác 0 thành 1
                                }
                            }
                            echo "</td>";
                        }
                        echo "<b>Ma trận $m x $n sau khi thay thế</b>";
                        $this->render_Matrixx($array, 0);
                        
                    }

                    function render_Matrix($input, $deep) {
                        if (is_array($input)) {
                            $deep++;
                            echo '<ul>';
                            foreach ($input as $key => $value) {
                                $this->render_Matrix($value, $deep);
                            }
                            echo '</ul>';
                        }else{
                            echo '<div style="width: 50px; display: inline-block">'.$input.'</div>';
                        }
                    }
                    //---
                    function render_Matrixx($input, $deep) {
                        if (is_array($input)) {
                            $deep++;
                            echo '<ul>';
                            foreach ($input as $key => $value) {
                                $this->render_Matrixx($value, $deep);
                            }
                            echo '</ul>';
                        }else{
                            echo '<div style="width: 50px; display: inline-block">'.$input.'</div>';
                        }
                    }
                }
            }
        }
    ?>
    <form method="post" action="">
        <table>
            <tr>
                <td>Nhập m: </td>
                <td><input type="text" name="hang" value="<?php echo "$hang"; ?>"></td>
            </tr>
            <tr>
                <td>Nhập n: </td>
                <td><input type="text" name="cot" value="<?php echo "$cot"; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="inmang" value="In mảng"></td>
            </tr>
        </table>
    </form>
    <?php
        new Ex();
    ?>
</body>
</html>