<?php
/* Bill */
function insert_bill($hoTen, $sdt, $diaChi, $timeNhan, $ghiChu, $thanhToan, $totalTien, $trangThai, $idtk) {
    $sql = "INSERT INTO bill (hoTen, sdt, diaChi, timeNhan, ghiChu, thanhToan, totalTien, trangThai, idtk) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    return pdo_execute_return_lastInsertID($sql, [$hoTen, $sdt, $diaChi, $timeNhan, $ghiChu, $thanhToan, $totalTien, $trangThai, $idtk]);
}

function getOrdersByUserId($idtk) {
    $sql = "SELECT * FROM bill WHERE idtk = ?";
    return pdo_query($sql, array($idtk));
}

function loadall_bill() {
    $sql = "SELECT * FROM bill";
    return pdo_query($sql);
}

function loadone_bill($id) {
    $sql = "SELECT * FROM bill where id=".$id;
    $dmsp = pdo_query_one($sql);
    return $dmsp;
}

function update_bill($id, $status) {
    $sql = "UPDATE bill set trangThai='".$status."' WHERE id=".$id;
    pdo_execute($sql);
}


/* Billinfo */
function insert_billinfo($tenSp, $giaTien, $soLuong, $total, $idbill) {
    $sql = "INSERT INTO billinfo (tenSp, giaTien, soLuong, total, idbill) VALUES (?, ?, ?, ?, ?)";
    return pdo_execute($sql, [$tenSp, $giaTien, $soLuong, $total, $idbill]);
}
?>