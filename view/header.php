<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/css/main.css">
    <link rel="stylesheet" href="./view/css/bootstrap.min.css">
    <link rel="stylesheet" href="./view/fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <script src="/view/js/main.js"></script>
    <script src="/view/js/bootstrap.min.js"></script>
    <title>Fance Water</title>
</head>
<body>
    <div id="main">
        <header id="header">
            <div class="d-flex justify-content-between  mb-3">
                <div class="p-2">
                    <ul class="nav header-ul">
                        <li class="nav-item">
                          <a class="nav-link text-dark" href="index.php">Logo</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-dark" href="#">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="p-2">
                    <?php if (isset($_SESSION['user'])) { 
                            extract($_SESSION['user']);    
                    ?>
                    <div class="header-info">
                        <i class="fa-solid fa-bars"></i>
                        <div class="header-info-chlid">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="#"><?=$hoTen?></a>
                                </li>
                                <?php if ($id == 1) {?>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="admin/index.php" target="_blank">Quản lý Website</a>
                                </li>
                                <?php }?>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="index.php?act=mycart">Giỏ hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="index.php?act=donhang">Đơn hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="index.php?act=caidat">Cài đặt</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="index.php?act=dangxuat">Đăng xuất</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php } else { ?>
                    <ul class="nav header-ul">
                        <li class="nav-item">
                          <a class="nav-link text-dark" href="index.php?act=dangnhap">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-dark" href="index.php?act=dangky">Đăng ký</a>
                        </li>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </header>