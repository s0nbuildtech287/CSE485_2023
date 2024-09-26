<?php
require_once("C:/xampp/htdocs/CSE485_2023/CSE485_2023_BTTH02/configs/DBConnection.php");

class ArticleModel {
    private $db;

    public function __construct() {
        $dbConnection = new DBConnection();
        $this->db = $dbConnection->getConnection();
    }

    //lấy tất cả thông tin bài viết
    public function getAllArticles() {
        $stmt = $this->db->prepare("SELECT * FROM baiviet");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // thêm mới bài viết
    public function addArticle($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh) {
        $stmt = $this->db->prepare("INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) 
                                    VALUES (:tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, :ngayviet, :hinhanh)");
        return $stmt->execute([
            'tieude' => $tieude,
            'ten_bhat' => $ten_bhat,
            'ma_tloai' => $ma_tloai,
            'tomtat' => $tomtat,
            'noidung' => $noidung,
            'ma_tgia' => $ma_tgia,
            'ngayviet' => $ngayviet,
            'hinhanh' => $hinhanh
        ]);
    }

    // Cập nhập bài viết
    public function updateArticle($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh) {
        $stmt = $this->db->prepare("UPDATE baiviet SET tieude = :tieude, ten_bhat = :ten_bhat, ma_tloai = :ma_tloai, tomtat = :tomtat, 
                                    noidung = :noidung, ma_tgia = :ma_tgia, ngayviet = :ngayviet, hinhanh = :hinhanh WHERE ma_bviet = :ma_bviet");
        return $stmt->execute([
            'tieude' => $tieude,
            'ten_bhat' => $ten_bhat,
            'ma_tloai' => $ma_tloai,
            'tomtat' => $tomtat,
            'noidung' => $noidung,
            'ma_tgia' => $ma_tgia,
            'ngayviet' => $ngayviet,
            'hinhanh' => $hinhanh,
            'ma_bviet' => $ma_bviet
        ]);
    }

    // Delete an article
    public function deleteArticle($ma_bviet) {
        $stmt = $this->db->prepare("DELETE FROM baiviet WHERE ma_bviet = :ma_bviet");
        return $stmt->execute(['ma_bviet' => $ma_bviet]);
    }

}
?>