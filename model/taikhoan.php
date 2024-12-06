<?php
/* Bắt đầu: Danh mục tài khoản */
function insert_dmtk($ten_dmtk) {
    $sql = "INSERT into dmtaikhoan(ten) values('$ten_dmtk')";
    pdo_execute($sql); 
}

function loadall_dmtk() {
    $sql = "SELECT * FROM dmtaikhoan";
    return pdo_query($sql);
}

function loadone_dmtk($id) {
    $sql = "SELECT * FROM dmtaikhoan WHERE id=".$id;
    $dmtk = pdo_query_one($sql);
    return $dmtk;
}

function update_dmtk($id_dmtk, $ten_dmtk) {
    $sql = "UPDATE dmtaikhoan set ten='".$ten_dmtk."' WHERE id=".$id_dmtk;
    pdo_execute($sql);
}

function delete_dmtk($id_dmtk) {
    $sql = "DELETE FROM dmtaikhoan WHERE id=".$id_dmtk;
    pdo_execute($sql);
}

function check_ten_dmtk($ten_dmtk) {
    $sql = "SELECT COUNT(*) FROM dmtaikhoan WHERE ten = :ten_dmtk";
    $result = pdo_query_value($sql, [':ten_dmtk' => $ten_dmtk]);
    return $result > 0;
}
/* Kết thức: Danh mục tài khoản */

/* Bắt đầu: Danh sách tài khoản */
function insert_tk($username_tk, $matkhau_tk, $email_tk, $hoten_tk, $sdt_tk, $diachi_tk, $iddm_tk) {
    $sql = "INSERT into taikhoan(taiKhoan, matKhau, email, hoTen, sdt, diaChi, iddmTk) values('$username_tk', '$matkhau_tk', '$email_tk', '$hoten_tk', '$sdt_tk', '$diachi_tk', '$iddm_tk')";
    pdo_execute($sql); 
}

function loadall_tk() {
    $sql = "SELECT * FROM taikhoan";
    return pdo_query($sql);
}

function loadone_tk($id) {
    $sql = "SELECT * FROM taikhoan WHERE id=".$id;
    $dmtk = pdo_query_one($sql);
    return $dmtk;
}

function loadall_tk_by_dmtk($id_dmtk) {
    $sql = "SELECT * FROM taikhoan WHERE iddmTk = :id_dmtk";
    return pdo_query($sql, [':id_dmtk' => $id_dmtk]);
}

function check_username_tk($username_tk) {
    $sql = "SELECT COUNT(*) FROM taikhoan WHERE taiKhoan = :username_tk";
    $result = pdo_query_value($sql, [':username_tk' => $username_tk]);
    return $result > 0;
}

function check_email_tk($email_tk) {
    $sql = "SELECT COUNT(*) FROM taikhoan WHERE email = :email_tk";
    $result = pdo_query_value($sql, [':email_tk' => $email_tk]);
    return $result > 0;
}

function check_username_capnhat($id_tk, $username_tk) {
    $sql = "SELECT COUNT(*) FROM taikhoan WHERE taiKhoan = :username_tk AND id <> :id_tk";
    $result = pdo_query_value($sql, [':username_tk' => $username_tk, ':id_tk' => $id_tk]);
    return $result > 0;
}

function check_email_capnhat($id_tk, $email_tk) {
    $sql = "SELECT COUNT(*) FROM taikhoan WHERE email = :email_tk AND id <> :id_tk";
    $result = pdo_query_value($sql, [':email_tk' => $email_tk, ':id_tk' => $id_tk]);
    return $result > 0;
}

function delete_tk($id_tk) {
    $sql = "DELETE FROM taikhoan WHERE id=".$id_tk;
    pdo_execute($sql);
}

function update_tk($id_tk, $matkhau_tk, $email_tk, $hoten_tk, $sdt_tk, $diachi_tk, $iddm_tk) {
    $sql = "UPDATE taikhoan set matKhau='".$matkhau_tk."', email='".$email_tk."', hoTen='".$hoten_tk."', sdt='".$sdt_tk."', diaChi='".$diachi_tk."', iddmTk='".$iddm_tk."' WHERE id=".$id_tk;
    pdo_execute($sql);
}
/* Kết thúc: Danh sách tài khoản */

/* Bắt đầu: Tài khoản trang người dùng */
function checkuser($user,$pw) {
    $sql = "SELECT * FROM taikhoan WHERE taiKhoan='".$user."' AND matKhau='".$pw."'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function checkuser_email($user, $email) {
    $sql = "SELECT * FROM taikhoan WHERE taiKhoan='".$user."' AND email='".$email."'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function generateRandomPassword() {
    $characters = '0123456789';
    $password = '';
    for ($i = 0; $i < 6; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $password .= $characters[$index];
    }
    return $password;
}

function updatePassword($user, $new_password) {
    $sql = "UPDATE taikhoan SET matKhau = :new_password WHERE taiKhoan = :user";
    pdo_execute($sql, [':new_password' => $new_password, ':user' => $user]);
}
?>