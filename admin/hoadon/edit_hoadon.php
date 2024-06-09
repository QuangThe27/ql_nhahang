<?php
    if (is_array($bill)) {
        extract($bill);
    }
?>

<div class="col-10 admin-boxright" style="min-height: 100vh;">
                <div class="admin-boxright-heading">

                </div>
                <div class="admin-boxright-body pt-4">
                    <form action="index.php?act=capnhat_bill" method="post">
                        <div class="mb-3 mt-3">
                            <label class="form-label">Mã hóa đơn:</label>
                            <input type="text" class="form-control" name="id" value="<?=$id?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="ten_dmsp" class="form-label">Trạng thái:</label>
                            <input type="text" class="form-control" id="ten_dmsp" placeholder="Nhập tên danh mục" name="status" value="<?=$trangThai?>">
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