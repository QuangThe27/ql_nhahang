<?php
    if (is_array($sp)) {
        extract($sp);
    }
    $hinh = "upload/".$hinhAnh;
?>

<div class="container-full">
            <div class="row pt-3 prd-detail" style="width: 1000px; margin: 0 auto;">
                <div class="col-6 prd-detail-l">
                    <div class="">
                        <img src="<?=$hinh?>" alt="">
                    </div>
                </div>
                <div class="col-6 prd-detail-r">
                    <form action="index.php?act=mycart" method="post">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <div class="">
                            <p class="h6">Tên sản phẩm:</p><?=$tenSp?>
                        </div>
                        <div class="pt-3">
                            <p class="h6">Giá tiền:</p><?=$giaTien?> VNĐ
                        </div>
                        <div class="pt-3">
                            <p class="h6">Số lượng hiện tại:</p><?=$soLuong?>
                        </div>
                        <div class="pt-3">
                            <p class="h6">Mô tả:</p><?=$moTa?>
                        </div>
                        <div class="pt-3 pb-3">
                            <label for="" class="form-label h6">Số lượng: </label>
                            <input type="number" class="form-control" name="soluong" placeholder="Nhập số lượng" min="1" max="<?=$soLuong?>" required>
                        </div>
                        <input type="submit" class="input_primary mt-3" name="dathang" value="Đặt hàng">
                    </form>
                </div>
            </div>
        </div>