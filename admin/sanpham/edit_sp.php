<?php
    if (is_array($sp)) {
        extract($sp);
    }
?>


<div class="col-10 admin-boxright" style="min-height: 100vh;">
                <div class="admin-boxright-heading">

                </div>
                <div class="admin-boxright-body pt-3 pb-3">
                    <form action="index.php?act=capnhat_sp" method="post" enctype="multipart/form-data">
                        <div class="mb-3 mt-3">
                            <label class="form-label">Danh mục sản phẩm:</label>
                            <select class="form-select" name="id_dmsp">
                                <?php
                                    foreach ($list_dmsp as $dmsp) {
                                        $iddmSpCurrent = $sp['iddmSp'];
                                        $s = ($dmsp['id'] == $iddmSpCurrent) ? "selected" : "";
                                        echo '<option value="'.$dmsp['id'].'" '.$s.'>'.$dmsp['tenDm'].'</option>';
                                    }
                                ?>    
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mã sản phẩm:</label>
                            <input type="text" class="form-control" value="<?=$id?>" name="id_sp" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="ten_sp" class="form-label">Tên sản phẩm:</label>
                            <input type="text" class="form-control" id="ten_sp" placeholder="Nhập tên danh mục" value="<?=$tenSp?>" name="ten_sp">
                        </div>
                        <div class="mb-3">
                            <label for="giatien_sp" class="form-label">Giá tiền:</label>
                            <input type="number" class="form-control" id="giatien_sp" placeholder="Nhập tên danh mục" value="<?=$giaTien?>" name="giatien_sp">
                        </div>
                        <div class="mb-3">
                        <label for="hinhanh_sp" class="form-label">Hình ảnh:</label>
                            <input type="file" class="form-control" id="hinhanh_sp" name="hinhanh_sp">
                            <input type="text" class="form-control mt-2" id="hinhanh_sp_current" value="<?=$hinhAnh?>" readonly>
                            <?php
                                if (!empty($hinhAnh)) {
                                    $hinhpath = "../upload/".$hinhAnh;
                                    echo '<img src="'.$hinhpath.'" height="80">';
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="soluong_sp" class="form-label">Số lượng:</label>
                            <input type="number" class="form-control" id="soluong_sp" placeholder="Nhập tên danh mục" value="<?=$soLuong?>" name="soluong_sp">
                        </div>
                        <div class="mb-3">
                            <label for="mota_sp" class="form-label">Mô tả:</label>
                            <input type="text" class="form-control" id="mota_sp" placeholder="Nhập tên danh mục" value="<?=$moTa?>" name="mota_sp">
                        </div>

                        <input type="hidden" name="id_sp" value="<?=$id?>">
                        <input type="submit" class="input_primary" name="capnhat" value="Cập nhật">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>