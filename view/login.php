<div class="container-full">
            <div class="ctn-login">
                <div class="row">
                    <div class="col-6 ctn-login-l">
                        <img src="./upload/login.jpg" alt="" class="card-img-top">
                    </div>
                    <div class="col-6 pt-3 ctn-login-r">
                        <form action="index.php?act=dangnhap" method="post" style="margin-right: 10px;">
                            <div class="mb-3">
                                <label for="username_tk" class="form-label">Tài khoản:</label>
                                <input type="text" class="form-control" id="username_tk" placeholder="Nhập tài khoản" name="taikhoan">
                            </div>
                            <div class="mb-3">
                                <label for="matkhau_tk" class="form-label">Mật khẩu:</label>
                                <input type="password" class="form-control" id="matkhau_tk" placeholder="Nhập mật khẩu" name="matkhau">
                            </div>
                            <div class="mb-3" style="display: flex; justify-content: flex-end;">
                                <a href="index.php?act=quenpw">Quên mật khẩu?</a>
                            </div>

                            <center>
                            <input type="submit" class="input_primary" name="dangnhap" value="Đăng nhập">

                            <div class="mb-3 pt-5">
                                <p style="font-size: 14px;">Bạn chưa có tài khoản? <a href="index.php?act=dangky">Đăng ký</a></p>
                            </div>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>