<?php
include "../model/pdo.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "./box_left.php";

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

            include "../admin/danhmuc_tk/list_dmtk.php";
            break;
        // Tài khoản
        case 'qltk':
            include "../admin/taikhoan/list_tk.php";
            break;
        // Hóa đơn
        case 'qlhd':
            include "";
            break;
        // Nhân viên
        case 'qlnv':
            include "";
            break;            

        default:
            include "./box_right.php";
            break;
    }
}
?>