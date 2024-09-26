<?php
        require_once("../../../../../CSE485_2023/CSE485_2023_BTTH02/configs/DBConnection.php");

        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

            // Đếm số lượng thể loại
        $sql_theloai = "SELECT COUNT(ma_tloai) AS count_theloai FROM theloai";
        $result_theloai = $conn->query($sql_theloai);
        $count_theloai = $result_theloai->fetch(PDO::FETCH_ASSOC)['count_theloai'];

            // Đếm số lượng tác giả
        $sql_tacgia = "SELECT COUNT(ma_tgia) AS count_tacgia FROM tacgia";
        $result_tacgia = $conn->query($sql_tacgia);
        $count_tacgia = $result_tacgia->fetch(PDO::FETCH_ASSOC)['count_tacgia'];

            // Đếm số lượng bài viết
        $sql_baiviet = "SELECT COUNT(ma_bviet) AS count_baiviet FROM baiviet";
        $result_baiviet = $conn->query($sql_baiviet);
        $count_baiviet = $result_baiviet->fetch(PDO::FETCH_ASSOC)['count_baiviet'];

            // Đếm số lượng người dùng
        $sql_users = "SELECT COUNT(user_id) AS count_users FROM users";
        $result_users = $conn->query($sql_users);
        $count_users = $result_users->fetch(PDO::FETCH_ASSOC)['count_users'];
        
?> 
