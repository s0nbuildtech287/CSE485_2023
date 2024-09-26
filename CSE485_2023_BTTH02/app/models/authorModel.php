<?php
require_once("C:/xampp/htdocs/CSE485_2023/CSE485_2023_BTTH02/configs/DBConnection.php");
class AuthorModel {
    private $db;

    public function __construct() {
        $dbConnection = new DBConnection();
        $this->db = $dbConnection->getConnection();
    }

    //lấy tất cả thông tin tác giả
    public function getAllAuthors() {
        $stmt = $this->db->prepare("SELECT * FROM tacgia");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //thêm tác giả
    public function addAuthor($ten_tgia, $hinh_tgia) {
        // Fix table name and parameter names in the query
        $stmt = $this->db->prepare("INSERT INTO tacgia (ten_tgia, hinh_tgia) VALUES (:ten_tgia, :hinh_tgia)");
    
        // Pass a single associative array with both parameters
        $stmt->execute([
            'ten_tgia' => $ten_tgia,
            'hinh_tgia' => $hinh_tgia
        ]);
    }

    //sửa tác giả
    public function updateAuthor($ma_tgia, $ten_tgia, $hinh_tgia) {
        $stmt = $this->db->prepare("UPDATE tacgia SET ten_tgia = :ten_tgia, hinh_tgia = :hinh_tgia WHERE ma_tgia = :ma_tgia");
        $stmt->execute([
            'ten_tgia' => $ten_tgia,
            'hinh_tgia' => $hinh_tgia,
            'ma_tgia' => $ma_tgia
        ]);
    }

    //xoá tác giả
    public function deleteAuthor($ma_tgia) {
        $stmt = $this->db->prepare("DELETE FROM tacgia WHERE ma_tgia = :ma_tgia");
        $stmt->execute(['ma_tgia' => $ma_tgia]);
    }
}
?>

