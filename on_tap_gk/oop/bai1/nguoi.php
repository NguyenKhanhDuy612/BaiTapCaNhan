<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1 - Tạo các lớp đơn giản</title>
</head>
<body>
    <?php
        // Lớp Người:
        abstract class Nguoi{
            protected $ho_ten, $dia_chi, $gioi_tinh;

            public function set_ho_ten($ho_ten){
                $this->ho_ten = $ho_ten;

            }
            public function get_ho_ten(){
                return $this->ho_ten;

            }

            public function set_dia_chi( $dia_chi){
                $this->dia_chi = $dia_chi;
            }
            public function get_dia_chi( ){
                return  $this->dia_chi ;
            }

            public function set_gioi_tinh( $gioi_tinh){
                $this->gioi_tinh = $gioi_tinh;
            }
            public function get_gioi_tinh( ){
                return $this->gioi_tinh ;
            }

            

        }
        // Lớp Sinh viên kế thừa từ lớp Người
        class SinhVien extends Nguoi{
            protected $lop, $nganh_hoc;

            public function set_lop($lop)
            {
                $this->lop = $lop;
            }
            public function get_lop()
            {
                return $this->lop;
            }

            public function set_nganh_hoc($nganh_hoc)
            {
                $this->nganh_hoc = $nganh_hoc;
            }
            public function get_nganh_hoc()
            {
                return $this->nganh_hoc;
            }

            public function TinhDiemThuong()
            {
                if($this->nganh_hoc == "CNTT"){
                    return 1;
                }
                elseif($this->nganh_hoc == "KT"){
                    return 1.5;
                }
                else{
                    return 0;
                }
            }
        }

        // Lớp Giảng viên kế thừa từ lớp Người
        class GiangVien extends Nguoi{
            protected $trinh_do;
            const luong_co_ban= 1500000 ;

            public function set_trinh_do($trinh_do)
            {
                $this->trinh_do = $trinh_do;
            }
            public function get_trinh_do()
            {
                return $this->trinh_do ;
            }

            public function TinhLuong()
            {
                if($this->trinh_do == "CN"){
                    return self::luong_co_ban * 2.34;
                }elseif($this->trinh_do == "ThS"){
                    return self::luong_co_ban * 3.67;
                }elseif($this->trinh_do == "TS"){
                    return self::luong_co_ban * 5.66;
                }
            }
        }

    ?>
    <!--  -->
    <?php
        $str ='';
        if(isset($_POST['tinh'])){
            
        }
    ?>

    <!--  -->
    <form action="" method="post">
        <fieldset>
            <table>
                <th>Quan ly sinh vien và giao viên</th>
                <tr>
                    <td>
                        Họ Tên: 
                        <input type="text" name="ho_ten" value="">
                    </td>
                </tr>
                <tr>
                    <td>
                        Đia chỉ: 
                        <input type="text" name="dia_chi" value="">
                    </td>
                </tr>
                <tr>
                    <td>
                        Giới Tính: 
                        <input type="radio" name="radGT" value="Nam" <?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nam') 
                            echo 'checked="checked"'; ?> checked/> Nam

                        <input type="radio" name="radGT" value="Nữ" <?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nữ') 
                            echo 'checked="checked"'; ?>/> Nữ

                    </td>
                </tr>
                <tr>
                    <td>
                        Chọn đối tượng: 
                        <input type="radio" name="radDT" value="Giáo Viên" <?php if(isset($_POST['radDT'])&&$_POST['radDT']=='Giáo Viên') 
                            echo 'checked="checked"'; ?> checked/> Giáo Viên

                        <input type="radio" name="radDT" value="Sinh Viên" <?php if(isset($_POST['radDT'])&&$_POST['radDT']=='Sinh Viên') 
                            echo 'checked="checked"'; ?>/> Sinh Viên

                    </td>
                </tr>
                <tr>
                    <td>
                        <fieldset>
                            <legend>Giáo Viên</legend>
                            <table>
                                
                                    <tr>
                                        <td>
                                            Trình độ:
                                            <select name="trinhDo" >
                                                <option value="Cử nhân" selected
                                                    <?php if((isset($_POST['trinhDo'])  &&  ($_POST['trinhDo']=='Cử nhân'))) { echo('selected'); }?>>
                                                    Cử nhân
                                                </option> 
                                                <option value="Thạc sĩ" 
                                                    <?php if((isset($_POST['trinhDo'])  &&  ($_POST['trinhDo']=='Thạc sĩ'))) { echo('selected'); }?>>
                                                    Thạc sĩ
                                                </option> 
                                                <option value="Tiến sĩ" 
                                                    <?php if((isset($_POST['trinhDo'])  &&  ($_POST['trinhDo']=='Tiến sĩ'))) { echo('selected'); }?>>
                                                    Tiến sĩ
                                                </option> 
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Lương cơ bản:
                                            <input type="text" name="luong_cb" value="15000" disabled>
                                        </td>
                                    </tr>
                                    
                            </table>
                        </fieldset>
                        </td>
                        <!--  -->
                        <td>
                        <fieldset>
                            <legend>Sinh Viên</legend>
                            <table>
                                    <tr>
                                        <td>
                                            Lớp học:
                                            <input type="text" name="lop" value="" >
                                        </td>
                                    </tr>
                                    <tr>
                                    <td>
                                            Ngành Học:
                                            <select name="nganh_hoc" >
                                                <option value="Công nghệ thông tin" selected
                                                    <?php if((isset($_POST['nganh_hoc'])  &&  ($_POST['nganh_hoc']=='Công nghệ thông tin'))) { echo('selected'); }?>>
                                                    Công nghệ thông tin
                                                </option> 
                                                <option value="Kinh Tế" 
                                                    <?php if((isset($_POST['nganh_hoc'])  &&  ($_POST['nganh_hoc']=='Kinh Tế'))) { echo('selected'); }?>>
                                                    Kinh Tế
                                                </option> 
                                                <option value="Khác" 
                                                    <?php if((isset($_POST['nganh_hoc'])  &&  ($_POST['nganh_hoc']=='Khác'))) { echo('selected'); }?>>
                                                    Khác
                                                </option> 
                                            </select>
                                        </td>
                                    </tr>
                                    
                            </table>
                        </fieldset>
                    </td>
                   
                </tr>
                <tr>
                    <td colspan="2" >
                        Kết quả:
                        <br>
                        <textarea name="ketqua"  cols="70" rows="7" disabled="disabled">
                            <?php echo $str;?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="tinh" value="Xử lý"/>
                    </td>
                </tr>

            </table>
            
        </fieldset>
        
    </form>
</body>
</html>