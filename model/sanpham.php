<?php
require_once 'pdo.php';

/* Bắt đầu - Hàm danh mục sản phẩm */
function loadall_dmsp() {
    $sql = "SELECT * FROM dmsanpham";
    return pdo_query($sql);
}

function insert_dmsp($ten_dmsp) {
    $sql = "INSERT into dmsanpham(tenDm) values('$ten_dmsp')";
    pdo_execute($sql); 
}

function loadone_dmsp($id) {
    $sql = "SELECT * FROM dmsanpham where id=".$id;
    $dmsp = pdo_query_one($sql);
    return $dmsp;
}

function delete_dmsp($id) {
    $sql = "DELETE FROM dmsanpham WHERE id=".$id;
    pdo_execute($sql);
}

function update_dmsp($id_dmsp, $ten_dmsp) {
    $sql = "UPDATE dmsanpham set tenDm='".$ten_dmsp."' WHERE id=".$id_dmsp;
    pdo_execute($sql);
}

function check_tenDmsp($ten_dmsp) {
    $sql = "SELECT COUNT(*) FROM dmsanpham WHERE tenDm = :ten_dmsp";
    $result = pdo_query_value($sql, [':ten_dmsp' => $ten_dmsp]);
    return $result > 0;
}
/* Kết thúc - Hàm danh mục sản phẩm */

/* Bắt đầu - Hàm sản phẩm */
function loadall_sp() {
    $sql = "SELECT * FROM sanpham";
    return pdo_query($sql);
}

function loadone_sp($id) {
    $sql = "SELECT * FROM sanpham where id=".$id;
    $sp = pdo_query_one($sql);
    return $sp;
}

function loadall_sp_by_dmsp($id_dmsp) {
    $sql = "SELECT * FROM sanpham WHERE iddmSp = :id_dmsp";
    return pdo_query($sql, [':id_dmsp' => $id_dmsp]);
}

function insert_sp($ten_sp, $giaTien_sp, $hinhAnh_sp, $soLuong_sp, $moTa_sp, $id_dmsp) {
    $sql = "INSERT into sanpham(tenSp, giaTien, hinhAnh, soLuong, moTa, iddmSp) values('$ten_sp','$giaTien_sp','$hinhAnh_sp','$soLuong_sp','$moTa_sp','$id_dmsp')";
    pdo_execute($sql); 
}

function check_tensp($ten_sp) {
    $sql = "SELECT COUNT(*) FROM sanpham WHERE tenSp = :ten_sp";
    $result = pdo_query_value($sql, [':ten_sp' => $ten_sp]);
    return $result > 0;
}

function check_tensp_capnhat($id_sp, $ten_sp) {
    $sql = "SELECT COUNT(*) FROM sanpham WHERE tenSp = :ten_sp AND id <> :id_sp";
    $result = pdo_query_value($sql, [':ten_sp' => $ten_sp, ':id_sp' => $id_sp]);
    return $result > 0;
}

function delete_sp($id) {
    $sql = "DELETE FROM sanpham WHERE id=".$id;
    pdo_execute($sql);
}

function update_sp($id_sp, $ten_sp, $giatien_sp, $hinhanh_sp, $soluong_sp, $mota_sp, $id_dmsp) {
    if ($hinhanh_sp == "") {
        $sql = "UPDATE sanpham set tenSp='".$ten_sp."', giaTien='".$giatien_sp."', soLuong='".$soluong_sp."', moTa='".$mota_sp."', iddmSp='".$id_dmsp."' WHERE id=".$id_sp;
    } else {
        $sql = "UPDATE sanpham set tenSp='".$ten_sp."', giaTien='".$giatien_sp."', hinhAnh='".$hinhanh_sp."', soLuong='".$soluong_sp."', moTa='".$mota_sp."', iddmSp='".$id_dmsp."' WHERE id=".$id_sp;
    }
    pdo_execute($sql);
}
/* Kết thúc - Hàm sản phẩm */
?>