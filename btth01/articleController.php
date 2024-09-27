<?php

require_once("C:/xampp/htdocs/CSE485_2023/CSE485_2023_BTTH02/app/models/articleModel.php");

class ArticleController {
    private $articleModel;

    public function __construct() {
        $this->articleModel = new ArticleModel();
    }

    // Lấy danh sách tất cả bài viết
    public function index() {
        return $this->articleModel->getAllArticles();
    }
    
    // Thêm bài viết mới
    public function store($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh) {
        // kiểm tra trường còn trống
        if (!empty($tieude) && !empty($ten_bhat) && !empty($ma_tloai) && !empty($tomtat) && !empty($noidung) && !empty($ma_tgia) &&!empty($ngayviet)) {
            $result = $this->articleModel->addArticle($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh);
            if ($result) {
                echo "<script>alert('Thêm bài viết thành công!');</script>";
            } else {
                echo "<script>alert('Có lỗi xảy ra khi thêm bài viết!');</script>";
            }
        } else {
            echo "<script>alert('Vui lòng nhập đầy đủ thông tin!');</script>";
        }
    }

    // Sửa bài viết
    public function update($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh) {
        if (!empty($ma_bviet) && !empty($tieude) && !empty($ten_bhat) && !empty($ma_tloai) && !empty($tomtat) && !empty($noidung) && !empty($ma_tgia) && !empty($ngayviet)) {
            $result = $this->articleModel->updateArticle($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh);
            if ($result) {
                echo "<script>alert('Cập nhật bài viết thành công!');</script>";
            } else {
                echo "<script>alert('Có lỗi xảy ra khi cập nhật bài viết!');</script>";
            }
        } else {
            echo "<script>alert('Vui lòng nhập đầy đủ thông tin!');</script>";
        }
    }

    // Xóa bài viết
    public function delete($ma_bviet) {
        if (!empty($ma_bviet)) {
            $result = $this->articleModel->deleteArticle($ma_bviet);
            if ($result) {
                echo "<script>alert('Xóa bài viết thành công!');</script>";
            } else {
                echo "<script>alert('Có lỗi xảy ra khi xóa bài viết!');</script>";
            }
        } else {
            echo "<script>alert('Mã bài viết không hợp lệ!');</script>";
        }
    }
}
?>