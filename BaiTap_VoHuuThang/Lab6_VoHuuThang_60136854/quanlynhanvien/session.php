<?php
   include('connect.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($abc,"select TaiKhoan from users where TaiKhoan = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['TaiKhoan'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      setcookie('admin', 'abc', time()+5);
      die();
   }
?>