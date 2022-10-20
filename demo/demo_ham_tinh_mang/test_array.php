<?php
    $array1 = array(
        'chu_Thuong' => 'Hello'
    );
    //   Chuyển viết hoa sang thường thường sang hoa
    $array1 = array_change_key_case($array1,CASE_LOWER);
    var_dump($array1);
    // Kết quả là:   'CHU_THUONG' => 'Hello'
// ////////////////////////TEST-2 KẾT HỢP KEY VÀ GIÁ TRỊ///////////////////////////////
    $array_keys = array('a', 'b', 'c');
    $array_values = array('one', 'two', 'three');
    print_r(array_combine($array_keys, $array_values));
    /* kết quả:
    Array(
    [a] => one
    [b] => two
    1 => three;
    )*/;

// ///////////////DẾM SỐ LẦN XUẤT HIỆN///////////////
    $array = array(1, "hello", 1, "world", "hello");
    print_r(array_count_values($array));
    /* Kết quả:
    Array (
    [1] => 2;
    [hello] => 2;
    [world] => 1
    )*/
// ///////////////THÊM VÀO CUỐI MẢNG/////////////////
    $stack = array("orange", "banana");
    array_push($stack, "apple", "raspberry");
    print_r($stack);
    /* Kết quả
    Array
    (
        [0] => orange
        [1] => banana
        [2] => apple
        [3] => raspberry
    )
    */
 /////////////////XÓA PHẦN TỬ CUỐI///////////////
    $stack = array("orange", "banana", "apple", "raspberry");
    $fruit = array_pop($stack);
    print_r($stack);
    
    /* Biến $stack sẽ còn 3 giá trị
    Array (
        [0] => orange
        [1] => banana
        [2] => apple
    )
    Còn biến $fruit sẽ có giá trị là raspberry
    */
// ////////////////////THÊM VÀO MẢNG( ĐẦU HOẶC CUỐI)//////////////////////
    $input = array(12, 10, 9);
    
    // Giãn thành 5 phần tử ở cuối mảng và
    // các phần tử giãn có giá trị là 5:
    $result = array_pad($input, 5, 0);
    // Kết quả là  array(12, 10, 9, 0, 0)
    
    // Giản thành 7 phần tử ở đầu mảng
    //  và các phần tử giãn có giá trị -1
    $result = array_pad($input, -7, -1);
    // Kết quả là array(-1, -1, -1, -1, 12, 10, 9)
    
    // Giãn thành 2 phần tử nhưng mảng $input
    // lại có 3 phần tử nên sẽ không được xử lý
    $result = array_pad($input, -7, -1);
    // Kết quả giữ nguyên array(12, 10, 9)
    echo("mang la:");
    print_r($result);
// ////////////////////XÓA PHẦN TỬ ĐẦU TIÊN////////////////////////////
    $stack = array("orange", "banana", "apple", "raspberry");
    $fruit = array_shift($stack);
    print_r($stack);
    /* Kết quả biến $stack
    Array (
        [0] => banana
        [1] => apple
        [2] => raspberry
    )
    Kết quả biến $fruit là orange */

// ///////////////////////THÊM VÀO ĐẦU MẢNG////////////////////////////////////////
    $queue = array("orange", "banana");
    array_unshift($queue, "apple", "raspberry");
    print_r($queue);
    /*Kết quả là:
    * Array (
        [0] => apple
        [1] => raspberry
        [2] => orange
        [3] => banana
    * ) */

// /////////////////////////KIỂM TRA GIÁ TRỊ CÓ NAWMG TRONG MẢNG HAY KHÔNG//////////////////////////////////////
    $haystackarray = array('hello', 'nobody', 'freetuts.net');
    
    // Kết quả là true
    var_dump(in_array('freetuts.net', $haystackarray));
    
    // Kết quả là false
    var_dump(in_array('net', $haystackarray));
// //////////////////////////KIỂM TRA CÓ KEY KHÔNG///////////////////////////////////////////////////

    $searcharray = array(
        'username' => 'thehalfheart',
        'email' => 'thehalfheart@gmail.com',
        'website' => 'freetuts.net'
    );
    
    // Trả về true
    var_dump(array_key_exists('username', $searcharray));
    
    // Trả về false
    var_dump(array_key_exists('otherkey', $searcharray));
// ///////////////////////////////////LOẠI BỎ GIÁ TRỊ TRÙNG ///////////////////////////////////////////////
    $array = array('freetuts.net', 'freetuts.net');
    $result = array_unique($array);
    
    // Kết quả mảng chỉ còn 1 giá trị freetuts.net
    var_dump($result);
// ////////////////CHUYỂN MẢNG SANG CHỈ MỤC/////////////////////////////////////////////
    $array = array(
        'username' => 'thehalfheart',
        'password' => 'somepasss'
        );
        
        var_dump(array_values($array));
        /* Kêt quả của mảng là array(
            0 => thehalfheart,
            1 => somepasss
        ) */

// /////////////////////////////////////////////////////
?>