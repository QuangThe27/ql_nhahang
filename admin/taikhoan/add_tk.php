<div class="col-10 admin-boxright" style="min-height: 100vh;">
                <div class="admin-boxright-heading">

                </div>
                <div class="admin-boxright-body pt-4">
                    <form action="index.php?act=them_tk" method="post">
                        <div class="mb-3">
                            <label class="form-label">Danh mục sản phẩm:</label>
                            <select class="form-select" name="id_dmtk" style="max-width: 200px;">
                                <?php
                                    foreach ($list_dmtk as $dmtk) {
                                        extract($dmtk);
                                        echo '<option value="'.$id.'">'.$ten.'</option>';
                                    }
                                ?>    
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label class="form-label">Mã tài khoản:</label>
                            <input type="text" class="form-control" name="id_tk" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="ten_tk" class="form-label">Tài khoản:</label>
                            <input type="text" class="form-control" id="username_tk" placeholder="Nhập tài khoản" name="username_tk">
                        </div>
                        <div class="mb-3">
                            <label for="matkhau_tk" class="form-label">Mật khẩu:</label>
                            <input type="text" class="form-control" id="matkhau_tk" placeholder="Nhập mật khẩu" name="matkhau_tk">
                        </div>
                        <div class="mb-3">
                            <label for="email_tk" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email_tk" placeholder="Nhập email" name="email_tk">
                        </div>
                        <div class="mb-3">
                            <label for="hoten_tk" class="form-label">Họ Tên:</label>
                            <input type="text" class="form-control" id="hoten_tk" placeholder="Nhập họ và tên" name="hoten_tk">
                        </div>
                        <div class="mb-3">
                            <label for="sdt_tk" class="form-label">Số điện thoại:</label>
                            <input type="tel" class="form-control" id="sdt_tk" placeholder="Nhập số điện thoại" name="sdt_tk">
                        </div>
                        <div class="mb-3">
                            <label for="diachi_tk" class="form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" id="diachi_tk" placeholder="Nhập đại chỉ" name="diachi_tk">
                        </div>

                        <input type="submit" class="input_primary" name="themmoi" value="Thêm mới">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>