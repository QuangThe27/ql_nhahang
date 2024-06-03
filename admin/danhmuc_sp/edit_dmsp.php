<?php
    if (is_array($dmsp)) {
        extract($dmsp);
    }
?>

<div class="col-10 admin-boxright" style="min-height: 100vh;">
                <div class="admin-boxright-heading">

                </div>
                <div class="admin-boxright-body pt-4">
                    <form action="index.php?act=capnhat_dmsp" method="post">
                        <div class="mb-3 mt-3">
                            <label class="form-label">Mã danh mục:</label>
                            <input type="text" class="form-control" name="id_dmsp" value="<?=$id?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="ten_dmsp" class="form-label">Tên danh mục:</label>
                            <input type="text" class="form-control" id="ten_dmsp" placeholder="Nhập tên danh mục" name="ten_dmsp" value="<?=$tenDm?>">
                        </div>

                        <input type="hidden" name="id_dmsp" value="<?=$id?>">
                        <input type="submit" class="input_primary" name="capnhat" value="Cập nhật">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>