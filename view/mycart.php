<div class="container-full">
           <div class="ctn-cart">
                <form action="index.php?act=checkout" method="post">
                    <table class="table">
                        <thead class="table-success">
                            <tr>
                            <th style="width: 20%;">Sản phẩm</th>
                            <th style="width: 20%;">Giá tiền</th>
                            <th style="width: 20%;">Số lượng</th>
                            <th style="width: 20%;">Tổng tiền</th>
                            <th style="width: 20%;">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tongTienHoaDon = 0; 
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $item) {
                                    $tongTienHoaDon += $item['tongTien'];
                                    echo "<tr>
                                        <td>{$item['tenSp']}</td>
                                        <td>{$item['giaTien']} VND</td>
                                        <td>{$item['soluong']}</td>
                                        <td>{$item['tongTien']} VND</td>
                                        <td>
                                            <a class='button_a' href='index.php?act=remove_cart&id={$item['id']}&soluong={$item['soluong']}'>
                                                <button type='button' class='btn btn-success'>Xóa</button>
                                            </a>
                                        </td>
                                    </tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="p-2">
                        <span><p class="h6" style="display: inline-block;">Tổng tiền hóa đơn:</p> <?php echo number_format($tongTienHoaDon); ?> VND</span>
                    </div>
                    <div class="p-2">
                        <a class="button_a" href="index.php">
                            <button type="button" class="btn btn-success">Tiếp tục đặt hàng</button>
                        </a>
                    </div>
                    <?php
                        if (isset($_SESSION['user'])) {
                            $user_id = $_SESSION['user']['id'];
                            $user_info = loadone_tk($user_id);
                            $hoten = $user_info['hoTen'];
                            $sdt = $user_info['sdt'];
                            $diachi = $user_info['diaChi'];
                        } else {
                            $hoten = "";
                            $sdt = "";
                            $diachi = "";
                        }
                    ?>
                    <div class="p-2">
                        <label for="" class="form-label h6">Họ tên:</label>
                        <input name="hoten" type="text" class="form-control" value="<?=$hoten?>" required>
                    </div>
                    <div class="p-2">
                        <label for="" class="form-label h6">Số điện thoại: </label>
                        <input name="sdt" type="text" class="form-control" value="0<?=$sdt?>" required>
                    </div>
                    <div class="p-2">
                        <label for="" class="form-label h6">Địa chỉ giao hàng: </label>
                        <input name="diaChi" type="text" class="form-control" value="<?=$diachi?>" required>
                    </div>
                    <div class="p-2">
                        <label for="" class="form-label h6">Ghi chú: </label>
                        <input name="ghiChu" type="text" class="form-control" value="">
                    </div>
                    <div class="p-2">
                        <label for="" class="form-label h6">Thanh toán: </label>
                        <div class="input-group-text">
                            <input type="radio" name="payment" value="online" style="margin-right: 12px;" required>
                            Thanh toán online
                        </div>
                        <div class="input-group-text mt-1">
                            <input type="radio" name="payment" value="cod" style="margin-right: 12px;" required>
                            Thanh toán khi nhận hàng
                        </div>
                    </div>

                    <input type="submit" class="input_primary m-2" name="checkout" value="Đặt hàng">
                </form>
           </div>
        </div>