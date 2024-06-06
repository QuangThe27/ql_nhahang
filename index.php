<?php
session_start();

include './model/pdo.php';
include './model/sanpham.php';
include './model/taikhoan.php';
include './view/header.php';

$danhmuc_sp = loadall_dmsp();
$danhsach_sp = loadall_sp();

if (isset($_GET['act']) ? $_GET['act'] : '') {
    $act=$_GET['act'];
    switch ($act) {
        case 'trangchu':
            include './view/body.php';
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['taikhoan'];
                $pw = $_POST['matkhau'];

                $checkUser = checkuser($user, $pw);

                if (is_array($checkUser)) {
                    $_SESSION['user'] = $checkUser;
                    header('Location: index.php');
                } else {
                    $thongbao = '';
                }
            }
            include './view/login.php';
            break;
        case 'dangxuat':
            session_unset();
            header('Location: index.php');
            break;

        
        default:
            include './view/body.php';
            break;
    }
} else {
    include './view/body.php';
}

include './view/footer.php';
?>