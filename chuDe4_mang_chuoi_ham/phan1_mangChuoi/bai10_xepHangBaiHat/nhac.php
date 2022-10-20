<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xếp hạng nhạc</title>
</head>
<body>
<body>
    <?php
    session_start();
    if (isset($_POST['nameSong']))
        $nameSong = $_POST['nameSong'];
    else
        $nameSong = '';
    if (isset($_POST['level']))
        $level = $_POST['level'];
    else
        $level = '';
    if (isset($_POST['KetQua']))
        $KetQua = $_POST['KetQua'];
    else
        $KetQua = '';
    if (isset($_POST['ExecSong'])) {
        // khởi tạo mảng chứa tên và thứ hạng
        $array = array(
            $nameSong => $level
        );
        // lồng mảng chứa tên và thứ hạng và session
        $_SESSION['List'][] = $array;
        $KetQua = "Bài hát:" . $nameSong . " - Hạng: " . $level . "\n" . $KetQua  . "\n";
    }
    if (isset($_POST['ExecLevel'])) {
        $KetQuaList = null;
        $KetQua = $_POST['KetQua'];
        $rankingList = array();
        foreach ($_SESSION as $k => $v) {
            foreach ($v as $k1 => $v1) {
                foreach ($v1 as $key => $value) {
                    $rankingList[$key] = $value;
                }
            }
        }
        asort($rankingList);
        foreach ($rankingList as $key => $value)
            $KetQuaList .=  $key . "&nbsp;-&nbsp;&nbsp;" . $value . "&#10;";
        $KetQua = "Bảng xếp hạng: &#10;" . $KetQuaList;
    }
    if (isset($_POST['ExecLevel'])) {
        session_unset();
        session_destroy();
    }

    ?>
    <form action="" method="post" id="myFormId">
        <table>
            <tr>
                <td id="title" colspan="2" align="center">XẾP HẠNG BÀI HÁT</td>
            </tr>
            <tr class="bgtr">
                <td>Nhập tên bài hát: </td>
                <td><input class="inp" type="text" value="<?php echo $nameSong ?>" name="nameSong" id="nameSong" required></td>
            </tr>
            <tr>
                <td>Hạng: </td>
                <td><input class="inp" type="text" value="<?php echo $level ?>" name="level" id="level" pattern="[0-9]+" required></td>
            </tr>
            <tr class="bgtr">
                <td></td>
                <td>
                    <button name="ExecSong" id="ExecSong" type="submit" class="btn-exec">Thêm bài hát</button>
                    <button name="ExecLevel" id="ExecLevel" type="submit" class="btn-exec">Bảng xếp hạng</button>
                    </button><button name="ExecReset" id="ExecReset" type="reset" class="btn-exec"  onclick="resetForm('myFormId'); return false;">Reset Session</button>
                </td>
            </tr>
            <tr>
                <td colspan="2"><textarea class="form-control text" name="KetQua" placeholder="Danh sách" rows="10" cols="105"><?php echo $KetQua ?></textarea></td>
            </tr>
        </table>
    </form>
</body>

</body>
</html>