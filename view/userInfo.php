<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $username_tk = $user['taiKhoan'];
    $email_tk = $user['email'];
    $hoten_tk = $user['hoTen'];
    $sdt_tk = $user['sdt'];
    $diachi_tk = $user['diaChi'];
} else {
    header('Location: index.php?act=dangnhap');
}
?>

<div class="container-full">
    <div class="ctn-register">
        <form action="index.php?act=user_info" method="post" class="pb-3">
            <div class="mb-3">
                <label for="username_tk" class="form-label">Tài khoản:</label>
                <input required type="text" class="form-control" id="username_tk" name="username_tk" value="<?php echo $username_tk; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="matkhau_tk" class="form-label">Mật khẩu mới:</label>
                <input required type="password" class="form-control" id="matkhau_tk" placeholder="Nhập mật khẩu" name="matkhau_tk">
            </div>
            <div class="mb-3">
                <label for="matkhau2_tk" class="form-label">Nhập lại mật khẩu:</label>
                <input required type="password" class="form-control" id="matkhau2_tk" placeholder="Nhập lại mật khẩu" name="matkhau2_tk">
            </div>
            <div class="mb-3">
                <label for="email_tk" class="form-label">Email:</label>
                <input required type="email" class="form-control" id="email_tk" placeholder="Nhập email" name="email_tk" value="<?php echo $email_tk; ?>">
            </div>
            <div class="mb-3">
                <label for="hoten_tk" class="form-label">Họ Tên:</label>
                <input required type="text" class="form-control" id="hoten_tk" placeholder="Nhập họ và tên" name="hoten_tk" value="<?php echo $hoten_tk; ?>">
            </div>
            <div class="mb-3">
                <label for="sdt_tk" class="form-label">Số điện thoại:</label>
                <input required type="tel" class="form-control" id="sdt_tk" placeholder="Nhập số điện thoại" name="sdt_tk" value="<?php echo $sdt_tk; ?>">
            </div>
            <div class="mb-3">
                <label for="diachi_tk" class="form-label">Địa chỉ:</label>
                <input required type="text" class="form-control" id="diachi_tk" placeholder="Nhập địa chỉ" name="diachi_tk" value="<?php echo $diachi_tk; ?>">
            </div>

            <input type="submit" class="input_primary" name="capnhat" value="Cập nhật">
        </form>
    </div>
</div>
