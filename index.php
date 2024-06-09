<?php
session_start();

require_once "./model/pdo.php";
require_once "./model/sanpham.php";
require_once "./model/taikhoan.php";
require_once "./model/bill.php";
require_once "./model/cart.php";
require_once "./model/send_email.php";
require_once "./view/header.php";

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
        
                    // Tải giỏ hàng từ cơ sở dữ liệu
                    $_SESSION['cart'] = getCartByUserId($_SESSION['user']['id']);
        
                    header('Location: index.php');
                } else {
                    $thongbao = '';
                }
            }
            include './view/login.php';
            break;
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $username_tk = $_POST['username_tk'];
                $matkhau_tk = $_POST['matkhau_tk'];
                $matkhau2_tk = $_POST['matkhau2_tk'];
                $email_tk = $_POST['email_tk'];
                $hoten_tk = $_POST['hoten_tk'];
                $sdt_tk = $_POST['sdt_tk'];
                $diachi_tk = $_POST['diachi_tk'];
                $iddm_tk = 5; // người dùng
        
                // Kiểm tra mật khẩu nhập lại
                if ($matkhau_tk !== $matkhau2_tk) {
                    $thongbao = "Mật khẩu nhập lại không khớp!";
                } elseif (check_username_tk($username_tk)) {
                    $thongbao = "Tên tài khoản đã tồn tại!";
                } elseif (check_email_tk($email_tk)) {
                    $thongbao = "Email đã tồn tại!";
                } else {
                    insert_tk($username_tk, $matkhau_tk, $email_tk, $hoten_tk, $sdt_tk, $diachi_tk, $iddm_tk);
                    $thongbao = "Đăng ký thành công!";
                }
        
                echo '<script>
                        setTimeout(function(){
                            alert("'.$thongbao.'");
                        }, 300);
                      </script>';
            }
            include './view/register.php';
            break;
        case 'quenpw':
            if(isset($_POST['dongy'])) {
                $taikhoan = $_POST['taikhoan'];
                $email = $_POST['email'];
        
                if(!empty($taikhoan) && !empty($email)) {
                    $user_info = checkuser_email($taikhoan, $email);
                    if($user_info) {
                        $matkhau_ngaunhien = generateRandomPassword();
                        updatePassword($taikhoan, $matkhau_ngaunhien);

                        $subject = "Mat khau moi";
                        $body = "Mật khẩu mới của bạn là: " . $matkhau_ngaunhien;
                        $result = sendEmail($email, $subject, $body);
        
                        if ($result) {
                            echo "Mật khẩu đã được gửi thành công qua email.";
                        } else {
                            echo "Có lỗi xảy ra trong quá trình gửi email. Vui lòng thử lại sau.";
                        }
                    } else {
                        echo "Tài khoản hoặc email không tồn tại. Vui lòng kiểm tra lại.";
                    }
                } else {
                    echo "Vui lòng nhập đầy đủ tài khoản và email.";
                }
            }
            include './view/quenmk.php';
            break;            
        case 'dangxuat':
            session_unset();
            header('Location: index.php');
            break;
        case 'search':
            if (isset($_POST['search']) && !empty($_POST['search'])) {
                $keyword = $_POST['search'];
                $danhsach_sp = search_sp_by_name($keyword);
            } else {
                $danhsach_sp = loadall_sp();
            }
            include './view/body.php';
            break;
        case 'sort_price_asc':
            $danhsach_sp = loadall_sp_sorted('asc');
            include './view/body.php';
            break;
        
        case 'sort_price_desc':
            $danhsach_sp = loadall_sp_sorted('desc');
            include './view/body.php';
            break;
        case 'danhmuc':
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
                $danhsach_sp = loadall_sp_by_dmsp($iddm);
            } else {
                $danhsach_sp = loadall_sp();
            }
            include './view/body.php';
            break;
        case 'dathang_sp':
            if (isset($_SESSION['user'])) {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $sp = loadone_sp($_GET['id']);
                }
                include './view/prd_detail.php';
            } else {
                $thongbao = 'Vui lòng đăng nhập để sử dụng dịch vụ!';
                echo '<script>
                        setTimeout(function(){
                            alert("'.$thongbao.'");
                        }, 300);
                    </script>';
                include './view/body.php';
            }
            break;
        case 'mycart':
            if (isset($_POST['dathang'])) {
                $id = $_POST['id'];
                $soluong = $_POST['soluong'];
        
                // Lấy thông tin sản phẩm từ cơ sở dữ liệu
                $sp = loadone_sp($id);
        
                // Thêm sản phẩm vào giỏ hàng
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }
        
                $cartItem = [
                    'id' => $sp['id'],
                    'tenSp' => $sp['tenSp'],
                    'giaTien' => $sp['giaTien'],
                    'soluong' => $soluong,
                    'tongTien' => $soluong * $sp['giaTien']
                ];
        
                $_SESSION['cart'][] = $cartItem;
        
                // Lưu giỏ hàng vào cơ sở dữ liệu
                if (isset($_SESSION['user'])) {
                    addProductToCart($_SESSION['user']['id'], $sp['id'], $soluong);
                }
            }
            include './view/mycart.php';
            break;
        case 'remove_cart':
            if (isset($_GET['id']) && isset($_GET['soluong'])) {
                $idToRemove = $_GET['id'];
                $soluongToRemove = $_GET['soluong'];
        
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $item) {
                        // Kiểm tra id và số lượng của sản phẩm
                        if ($item['id'] == $idToRemove && $item['soluong'] == $soluongToRemove) {
                            unset($_SESSION['cart'][$key]);
                            
                            // Xóa sản phẩm khỏi cơ sở dữ liệu
                            if (isset($_SESSION['user'])) {
                                removeProductFromCart($_SESSION['user']['id'], $idToRemove, $soluongToRemove);
                            }
        
                            break; 
                        }
                    }
                }
            }
            header('Location: index.php?act=mycart');
            break;
        case 'checkout':
            if (isset($_POST['checkout']) && isset($_SESSION['cart']) && isset($_SESSION['user'])) {
                $hoTen = isset($_POST['hoten']) ? $_POST['hoten'] : '';
                $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
                $diaChi = isset($_POST['diaChi']) ? $_POST['diaChi'] : '';
                $ghiChu = isset($_POST['ghiChu']) ? $_POST['ghiChu'] : '';
                $thanhToan = isset($_POST['payment']) ? $_POST['payment'] : '';
                $totalTien = 0;
                foreach ($_SESSION['cart'] as $item) {
                    $totalTien += $item['tongTien'];
                }
                $idtk = $_SESSION['user']['id'];
                $date = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh'));
                $timeNhan = $date->format('Y-m-d H:i:s');
                $trangThai = 'Đang xử lý';
                if ($hoTen && $sdt && $diaChi && $thanhToan) {
                    $idBill = insert_bill($hoTen, $sdt, $diaChi, $timeNhan, $ghiChu, $thanhToan, $totalTien, $trangThai, $idtk);
                    foreach ($_SESSION['cart'] as $item) {
                        insert_billinfo($item['tenSp'], $item['giaTien'], $item['soluong'], $item['tongTien'], $idBill);
                        update_soluong_sp($item['id'], $item['soluong']); // Cập nhật số lượng sản phẩm
                    }
                    remove_all_products_from_cart($idtk);
                    unset($_SESSION['cart']);
                    echo '<script>
                            setTimeout(function(){
                                alert("Đặt hàng thành công!");
                            }, 300);
                            </script>';
                    header('Location: index.php?act=donhang');
                } else {
                    echo '<script>
                            setTimeout(function(){
                                alert("Vui lòng điền đầy đủ thông tin");
                            </script>';
                }
            }
                include './view/checkout.php';
            break;
            case 'donhang':
                include './view/donhang.php';
                break;
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