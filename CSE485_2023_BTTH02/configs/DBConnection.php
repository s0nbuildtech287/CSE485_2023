<?php

class DBConnection{
    private $conn=null;

    public function __construct(){
         // B1. Kết nối DB Server
         try {
            $this->conn = new PDO('mysql:host=localhost;dbname=btth01_cse485;port=3306', 'root','');
        // Thiết lập chế độ lỗi cho PDO để xử lý lỗi
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getConnection(){
        return $this->conn;
    }


}