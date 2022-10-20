<?php
if($_FILES['ProductImg']['name']!=NULL)
{
    $errors = array();
    $file_name = $_FILES['ProductImg']['name'];
    $file_size = $_FILES['ProductImg']['size'];
    $file_tmp = $_FILES['ProductImg']['tmp_name'];
    $file_type = $_FILES['ProductImg']['type'];
    $file_ext = @strtolower(end(explode('.',$_FILES['ProductImg']['name'])));
    $expensions = array("jpeg","jpg","png");

    if(in_array($file_ext, $expensions)=== false){
        $errors[]= "Loi chi nhap 3 duoi";
    };
    if($file_size > 2097152){
        $errors[] = 'Kich thuoc file la 2MB';
    }
    if(empty($errors)==true){
        move_uploaded_file($_FILES["ProductImg"]["tmp_name"],
        "C:\\xampp\\htdocs\\BaiTapCaNhan\\img\\".$_FILES["ProductImg"]["name"]);
        echo "<h3>Upload thành công</h3>";
    }
    else{
        print_r($errors);
    }
// echo "Name: " .$_FILES["ProductImg"]["name"]."<br>";
// echo "Type: " .$_FILES["ProductImg"]["type"]."<br>";
// echo "Size: " .($_FILES["ProductImg"]["size"]/1024)."Kb<br>";
// echo "Temp. Stored in: ".$_FILES["ProductImg"]["tmp_name"];
}
// else echo "Vui lòng chọn file upload!";
?>