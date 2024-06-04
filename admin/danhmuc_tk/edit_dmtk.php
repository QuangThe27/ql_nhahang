<?php
    if (is_array($dmtk)) {
        extract($dmtk);
    }
?>

<div class="col-10 admin-boxright" style="min-height: 100vh;">
                <div class="admin-boxright-heading">

                </div>
                <div class="admin-boxright-body pt-4">
                    <form action="index.php?act=update_dmtk" method="post">
                        <div class="mb-3 mt-3">
                            <label class="form-label">Mã danh mục:</label>
                            <input type="text" class="form-control" name="id_dmtk" value="<?=$id?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="ten_dmtk" class="form-label">Loại tài khoản:</label>
                            <input type="text" class="form-control" id="ten_dmtk" placeholder="Nhập tên loại tài khoản" name="ten_dmtk" value="<?=$ten?>">
                        </div>

                        <input type="hidden" name="id_dmtk" value="<?=$id?>">
                        <input type="submit" class="input_primary" name="capnhat" value="Cập nhật">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>