<?php
function addProductToCart($idtk, $idSanPham, $soluong) {
    $sql = "INSERT INTO cart (idtk, idsp, soluong) VALUES (?, ?, ?)";
    pdo_execute($sql, array($idtk, $idSanPham, $soluong));
}

function getCartByUserId($idtk) {
    $sql = "SELECT c.idsp AS id, sp.tenSp, sp.giaTien, c.soluong, (sp.giaTien * c.soluong) AS tongTien
            FROM cart c
            JOIN sanpham sp ON c.idsp = sp.id
            WHERE c.idtk = ?";
    return pdo_query($sql, array($idtk));
}

function removeProductFromCart($idtk, $idSanPham, $soluong) {
    $sql = "DELETE FROM cart WHERE idtk = ? AND idsp = ? AND soluong = ?";
    pdo_execute($sql, array($idtk, $idSanPham, $soluong));
}

function remove_all_products_from_cart($idtk) {
    $sql = "DELETE FROM cart WHERE idtk = ?";
    pdo_execute($sql, array($idtk));
}
?>