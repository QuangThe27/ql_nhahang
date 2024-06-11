<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once "../model/pdo.php";
require_once "../model/sanpham.php";
require_once "../model/taikhoan.php";
require_once "../model/bill.php";
require_once "../model/cart.php";
require_once "../admin/box_left.php";

if (isset($_GET['act']) ? $_GET['act'] : '') {
    $act=$_GET['act'];
    switch ($act) {
        // Danh mục sản phẩm
        case 'dmsp':
            $list_dmsp = loadall_dmsp();
            include "../admin/danhmuc_sp/list_dmsp.php";
            break;
        case 'them_dmsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $ten_dmsp = $_POST['ten_dmsp'];

                if (!check_tenDmsp($ten_dmsp)) {
                    insert_dmsp($ten_dmsp);
                    $thongbao = "Thêm danh mục thành công!";
                } else {
                    $thongbao = "Tên danh mục đã tồn tại";
                }
                echo '<script>
                        setTimeout(function(){
                            alert("'.$thongbao.'");
                        }, 300);
                    </script>';
            }
            include "../admin/danhmuc_sp/add_dmsp.php";
            break;
        case 'xoa_dmsp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                delete_dmsp($id);
            }
            $list_dmsp = loadall_dmsp();
            include "../admin/danhmuc_sp/list_dmsp.php";
            break;
        case 'sua_dmsp':
            if (isset($_GET['id']) && ($_GET['id']>0)) {
                $dmsp = loadone_dmsp($_GET['id']);
            }
            include "../admin/danhmuc_sp/edit_dmsp.php";
            break;
        case 'capnhat_dmsp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $ten_dmsp = $_POST['ten_dmsp'];
                $id_dmsp = $_POST['id_dmsp'];

                if (!check_tenDmsp($ten_dmsp)) {
                    update_dmsp($id_dmsp, $ten_dmsp);   
                    $thongbao = "Cập nhật danh mục thành công!";
                } else {
                    $thongbao = "Cập nhật danh mục không thành công, tên danh mục đã tồn tại!";
                }

                echo '<script>
                        setTimeout(function(){
                            alert("'.$thongbao.'");
                        }, 300);
                    </script>';
            }
            $list_dmsp = loadall_dmsp();
            include "../admin/danhmuc_sp/list_dmsp.php";
            break;
        // Sản phẩm        
        case 'qlsp':
            $list_sp = loadall_sp();
            $list_dmsp = loadall_dmsp();
            include "../admin/sanpham/list_sp.php";
            break;
        case 'them_sp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $ten_sp = $_POST['ten_sp'];
                $giaTien_sp = $_POST['giatien_sp'];
                $soLuong_sp = $_POST['soluong_sp'];
                $moTa_sp = $_POST['mota_sp'];
                $id_dmsp = $_POST['id_dmsp'];

                if (isset($_FILES['hinhanh_sp']) && ($_FILES['hinhanh_sp']['error'] == 0)) {
                    $tmp_name = $_FILES['hinhanh_sp']['tmp_name'];
                    $hinhAnh_sp = $_FILES['hinhanh_sp']['name'];
                    $hinh_dir = "../upload/";
                    $upload_file = $hinh_dir . basename($hinhAnh_sp);

                    if (move_uploaded_file($tmp_name, $upload_file)) {
                        // $thongbao = "Tệp hình ảnh đã được tải lên thành công.";
                    } else {
                        //$thongbao = "Có lỗi xảy ra khi tải lên tệp hình ảnh.";
                    }
                    
                } else {
                    $hinhAnh_sp = '';
                }
                

                if (!check_tensp($ten_sp)) {
                    insert_sp($ten_sp, $giaTien_sp, $hinhAnh_sp, $soLuong_sp, $moTa_sp, $id_dmsp);
                    $thongbao = "Thêm sản phẩm thành công!";


                } else {
                    $thongbao = "Tên sản phẩm đã tồn tại";
                }

                echo '<script>
                        setTimeout(function(){
                            alert("'.$thongbao.'");
                        }, 300);
                    </script>';
            }
            $list_dmsp = loadall_dmsp();
            include "../admin/sanpham/add_sp.php";
            break;
        case 'sua_sp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sp = loadone_sp($_GET['id']);
            }
            $list_dmsp = loadall_dmsp();
            include "../admin/sanpham/edit_sp.php";
            break;
        case 'xoa_sp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                delete_sp($id);
            }
            $list_sp = loadall_sp();
            include "../admin/sanpham/list_sp.php";
            break;
        case 'capnhat_sp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'] > 0)) {
                $id_sp = $_POST['id_sp'];
                $ten_sp = $_POST['ten_sp'];
                $giatien_sp = $_POST['giatien_sp'];
                $soluong_sp = $_POST['soluong_sp']; 
                $mota_sp = $_POST['mota_sp'];
                $id_dmsp = $_POST['id_dmsp'];
                $hinhanh_sp = $sp['hinhAnh'];

                if (isset($_FILES['hinhanh_sp']) && ($_FILES['hinhanh_sp']['error'] == 0)) {
                    $tmp_name = $_FILES['hinhanh_sp']['tmp_name'];
                    $hinhanh_sp = $_FILES['hinhanh_sp']['name'];
                    $hinh_dir = "../upload/";
                    $upload_file = $hinh_dir . basename($hinhanh_sp);
        
                    if (!move_uploaded_file($tmp_name, $upload_file)) {
                        // Nếu có lỗi xảy ra khi tải lên tệp hình ảnh, giữ nguyên hình ảnh cũ
                        $hinhanh_sp = $sp['hinhAnh'];
                    }
                }

                if (!check_tensp_capnhat($id_sp, $ten_sp)) {
                    update_sp($id_sp, $ten_sp, $giatien_sp, $hinhanh_sp, $soluong_sp, $mota_sp, $id_dmsp);
                    $thongbao = "Cập nhật sản phẩm thành công!";
                } else {
                    $thongbao = "Tên sản phẩm đã tồn tại";
                }
                echo '<script>
                        setTimeout(function(){
                            alert("'.$thongbao.'");
                            window.location.href = "index.php?act=qlsp";
                        }, 300);
                        </script>';
                     exit;
            }
            break;
        case 'list_sp_dmsp':
            if(isset($_POST['id_dmsp'])) {
                $id_dmsp = $_POST['id_dmsp'];
                $list_sp = loadall_sp_by_dmsp($id_dmsp);
            }
            $list_dmsp = loadall_dmsp();
            include "../admin/sanpham/list_sp.php";
            break;
        // Danh mục tài khoản
        case 'dmtk':
            $list_dmtk = loadall_dmtk();
            include "../admin/danhmuc_tk/list_dmtk.php";
            break;
        case 'them_dmtk':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
               $ten_dmtk = $_POST['ten_dmtk'];

               if (!check_ten_dmtk($ten_dmtk)) {
                insert_dmtk($ten_dmtk);
                $thongbao = 'Thêm thành công!';
               } else {
                $thongbao = 'Thêm thất bại. Loại tài khoản đã tồn tại!';
               }
               echo '<script>
                        setTimeout(function(){
                            alert("'.$thongbao.'");
                        }, 300);
                    </script>';
            }
            $list_dmtk = loadall_dmtk();
            include "../admin/danhmuc_tk/add_dmtk.php";
            break;
        case 'sua_dmtk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dmtk = loadone_dmtk($_GET['id']);
            }
            $list_dmtk = loadall_sp();
            include "../admin/danhmuc_tk/edit_dmtk.php";
            break;
        case 'update_dmtk':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'] > 0)) {
                $id_dmtk = $_POST['id_dmtk'];
                $ten_dmtk = $_POST['ten_dmtk'];

                if (!check_ten_dmtk($ten_dmtk)) {
                    update_dmtk($id_dmtk, $ten_dmtk);
                    $thongbao = "Cập nhật loại tài khoản thành công!";
                    echo '<script>
                    setTimeout(function(){
                        alert("'.$thongbao.'");
                        window.location.href = "index.php?act=dmtk";
                    }, 300);
                    </script>';
                } else {
                    $thongbao = "Loại tài khoản đã tồn tại!";
                    echo '<script>
                    setTimeout(function(){
                        alert("'.$thongbao.'");
                        window.location.href = "index.php?act=dmtk";
                    }, 300);
                    </script>';
                }
            }
            break;
        case 'xoa_dmtk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id_dmtk = $_GET['id'];
                delete_dmtk($id_dmtk);
            }
            $list_dmtk = loadall_dmtk();
            include "../admin/danhmuc_tk/list_dmtk.php";
            break;
        // Tài khoản
        case 'qltk':
            $list_dmtk = loadall_dmtk();
            $list_tk = loadall_tk();
            include "../admin/taikhoan/list_tk.php";
            break;
        case 'them_tk':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm_tk = $_POST['id_dmtk'];
                $username_tk = $_POST['username_tk'];
                $matkhau_tk = $_POST['matkhau_tk'];
                $email_tk = $_POST['email_tk'];
                $hoten_tk = $_POST['hoten_tk'];
                $sdt_tk = $_POST['sdt_tk'];
                $diachi_tk = $_POST['diachi_tk'];

                if (!check_username_tk($username_tk)) {
                    if (!check_email_tk($email_tk)) {
                        insert_tk($username_tk, $matkhau_tk, $email_tk, $hoten_tk, $sdt_tk, $diachi_tk, $iddm_tk);
                        $thongbao = "Thêm tài khoản thành công!";
                        echo '<script>
                        setTimeout(function(){
                            alert("'.$thongbao.'");
                            window.location.href = "index.php?act=qltk";
                        }, 300);
                        </script>';
                    } else {
                        $thongbao_lost = "Email đã tồn tại!";
                        echo '<script>
                        setTimeout(function(){
                            alert("'.$thongbao_lost.'");
                            window.location.href = "index.php?act=them_tk";
                        }, 300);
                        </script>';
                    }
                } else {
                    $thongbao_lost = "Tài khoản đã tồn tại!";
                    echo '<script>
                    setTimeout(function(){
                        alert("'.$thongbao_lost.'");
                        window.location.href = "index.php?act=them_tk";
                    }, 300);
                    </script>';
                }
            }
            $list_dmtk = loadall_dmtk();
            include "../admin/taikhoan/add_tk.php";
            break;
        case 'xoa_tk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id_tk = $_GET['id'];
                delete_tk($id_tk);
            }
            $list_tk = loadall_tk();
            include "../admin/taikhoan/list_tk.php";
            break;
        case 'sua_tk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $tk = loadone_tk($_GET['id']);
            }
            $list_dmtk = loadall_dmtk();
            include "../admin/taikhoan/edit_tk.php";
            break;
        case 'capnhat_tk':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $iddm_tk = $_POST['iddm_tk'];
                $id_tk = $_POST['id_tk'];
                $username_tk = $_POST['username_tk'];
                $matkhau_tk = $_POST['matkhau_tk'];
                $email_tk = $_POST['email_tk'];
                $hoten_tk = $_POST['hoten_tk'];
                $sdt_tk = $_POST['sdt_tk'];
                $diachi_tk = $_POST['diachi_tk'];
        
                $tk = [
                    'iddmTk' => $iddm_tk,
                    'id' => $id_tk,
                    'taiKhoan' => $username_tk,
                    'matKhau' => $matkhau_tk,
                    'email' => $email_tk,
                    'hoTen' => $hoten_tk,
                    'sdt' => $sdt_tk,
                    'diaChi' => $diachi_tk,
                ];
        
                $error = "";
                if (!check_email_capnhat($id_tk, $email_tk)) {
                    update_tk($id_tk, $matkhau_tk, $email_tk, $hoten_tk, $sdt_tk, $diachi_tk, $iddm_tk);
                    $thongbao = "Cập nhật tài khoản thành công!";
                    echo '<script>
                    setTimeout(function(){
                        alert("'.$thongbao.'");
                        window.location.href = "index.php?act=qltk";
                    }, 300);
                    </script>';
                    exit; 
                } else {
                    $error = "Email đã tồn tại!";
                }
            }
            $list_dmtk = loadall_dmtk();
            include "../admin/taikhoan/edit_tk.php";
            break;
        case 'list_tk_dmtk':
            if(isset($_POST['id_dmtk'])) {
                $id_dmtk = $_POST['id_dmtk'];
                $list_tk = loadall_tk_by_dmtk($id_dmtk);
            }
            $list_dmtk = loadall_dmtk();
            include "../admin/taikhoan/list_tk.php";
            break;
        // Hóa đơn
        case 'qlhd':
            $list_bill = loadall_bill();
            include "../admin/hoadon/list_hoadon.php";
            break;
        case 'edit_bill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $bill = loadone_bill($_GET['id']);
            }
            include "../admin/hoadon/edit_hoadon.php";
            break;
        case 'capnhat_bill':
            if (isset($_POST['capnhat'])) {
                $id = $_POST['id'];
                $status = $_POST['status'];

                update_bill($id, $status);

                $thongbao = "Cập nhật thành công!";
                echo '<script>
                setTimeout(function(){
                    alert("'.$thongbao.'");
                    window.location.href = "index.php?act=qlhd";
                }, 300);
                </script>';
                exit; 
            }
            break;
        case 'search_hd':
            if (isset($_POST['search']) && !empty($_POST['search'])) {
                $keyword = $_POST['search'];
                $list_bill = search_bill($keyword);
            } else {
                $list_bill = loadall_sp();
            }
            include './hoadon/list_hoadon.php';
            break;
        // Doanh thu
        case 'qldt':
            $list_bill = loadall_bill();
            include './doanhthu/list_dt.php';
            break; 
        case 'search_dt':
            if (isset($_POST['search_from']) && isset($_POST['search_to'])) {
                $from_date = $_POST['search_from'];
                $to_date = $_POST['search_to'];
                $list_bill = search_bill_by_date_range($from_date, $to_date);
                include './doanhthu/list_dt.php';
            }
            break;
        default:
            include "./box_right.php";
            break;
    }
}
?>