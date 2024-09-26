<?php
 // Gọi model để thao tác với CSDL

$USERS = [
    "username1" => "password1",
    "username2" => "password2",
    "username3" => "password3",
    "admin" => "123",
  ];

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isset($USERS[$username]) && $USERS[$username] == $password) {
        echo "<script>alert('Đăng nhập thành công!');</script>";
        header('location: ../../../../../../CSE485_2023/CSE485_2023_BTTH02/app/views/admin/index.php');
    } else {
        echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng! vui lòng ấn quay trở lại');</script>";
        //header('location: ../../../../../../CSE485_2023/CSE485_2023_BTTH02/app/views/login/login.php');
    }
  }
?>