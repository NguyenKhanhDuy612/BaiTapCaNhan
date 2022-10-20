<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/button.css">
    <script src="vendor/bootstrap.min.js"></script>

    <style type="text/css">
        a{
          text-decoration: none;
        }
    </style>
    
    
</head>
<body>
    <div class="jumbotron text-center">
        <h2 style="color: blue;font-weight: 700;">QUẢN LÝ NHÂN VIÊN</h2>
        <br/>
        <a href="index_nhanvien2.php"><span data-attr="Nhân viên">Nhân viên</span></a>
        <a href="index_loainhanvien.php"><span data-attr="Loại nhân viên">Loại nhân viên</span></a>
        <a href="index_phongban.php"><span data-attr="Phòng ban">Phòng ban</span></a>
        <?php
            include('connect.php');
            include('session.php');
            echo '<h1>Xin chào: '.$login_session.'</h1>';
            echo '<h2><a href = "logout.php">Sign Out</a></h2>';
        ?>
    </div>
</body>
</html>