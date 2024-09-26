<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../../views/admin/index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../../public/index.php">Trang ngoài</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../views/category/category.php">Thể loại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../views/author/author.php">Tác giả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" href="../../views/article/article.php">Bài viết</a>
                        </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <?php
     require_once("../../controllers/articleController.php");
     $articleController = new ArticleController();

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $tieude = $_POST['txtCatTieude'] ?? '';
         $ten_bhat = $_POST['txtCatBaihat'] ?? '';
         $ma_tloai = $_POST['txtCatMatheloai'] ?? '';
         $tomtat = $_POST['txtCatTomtat'] ?? '';
         $noidung = $_POST['txtCatNoidung'] ?? '';
         $ma_tgia = $_POST['txtCatMatacgia'] ?? '';
         $ngayviet = $_POST['txtCatNgayviet'] ?? '';
         $hinhanh = $_POST['txtCatHinhanh'] ?? '';

         if (!empty($tieude) && !empty($ten_bhat) && !empty($ma_tloai) && !empty($tomtat) && !empty($ma_tgia) && !empty($ngayviet)) {
             $articleController->store($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh);
             header("Location: article.php?success=1");
             exit();
         } else {
             echo "<div class='alert alert-danger'>Vui lòng nhập đầy đủ thông tin!</div>";
         }
     }

    ?>

    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
                <form action="add_article.php" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatTieude">Tiêu đề</span>
                        <input type="text" class="form-control" name="txtCatTieude" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatBaihat">Tên bài hát</span>
                        <input type="text" class="form-control" name="txtCatBaihat" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatMatheloai">Mã thể loại</span>
                        <input type="text" class="form-control" name="txtCatMatheloai">
                    </div> 
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatTomtat">Tóm tắt</span>
                        <input type="text" class="form-control" name="txtCatTomtat" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatNoidung">Nội dung</span>
                        <input type="text" class="form-control" name="txtCatNoidung">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatMatacgia">Mã tác giả</span>
                        <input type="text" class="form-control" name="txtCatMatacgia" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatNgayviet">Ngày viết</span>
                        <input type="date" class="form-control" name="txtCatNgayviet" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatHinhanh">Hình ảnh</span>
                        <input type="file" class="form-control" name="txtCatHinhanh" >
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>