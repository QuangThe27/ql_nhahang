<div class="container-full">
            <div class="ctn-donhang">
                <table class="table">
                    <thead class="table-success">
                        <tr>
                        <th style="width: 10%;">Mã đơn</th>
                        <th style="width: 15%;">Khách hàng</th>
                        <th style="width: 15%;">Địa chỉ</th>
                        <th style="width: 12%;">Tổng tiền</th>
                        <th style="width: 12%;">Ghi chú</th>
                        <th style="width: 12%;">Thời gian </th>
                        <th style="width: 12%;">Trạng thái</th>
                        <th style="width: 12%;">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $userId = $_SESSION['user']['id'];
                            $orders = getOrdersByUserId($userId);
                            foreach ($orders as $bill) {
                                extract($bill);

                                echo '<tr>
                                    <td style="width: 10%;">'.$id.'</td>
                                    <td style="width: 15%;">'.$hoTen.', 0'.$sdt.'</td>
                                    <td style="width: 15%;">'.$diaChi.'</td>
                                    <td style="width: 12%;">'.$totalTien.' VNĐ</td>
                                    <td style="width: 12%;">'.$ghiChu.'</td>
                                    <td style="width: 12%;">'.$timeNhan.'</td>
                                    <td style="width: 12%;">'.$trangThai.'</td>
                                    <td style="width: 12%;">
                                        <a class="button_a" href="index.php?act=chitiethoadon">
                                            <button type="button" class="btn btn-success">Chi tiết</button>
                                        </a>
                                    </td>
                                </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
           </div>
        </div>