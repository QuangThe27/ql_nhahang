<div class="container-full">
            <div class="ctn-donhang">
                <!-- <?php
                if (isset($_SESSION['qrcode'])) {
                    echo '<div class="donhang_qrcoder p-2">
                        <div class="card container__rgiht-card" style="width: 300px; margin: 0 auto;">
                            <img class="card-img-top" src="' . $_SESSION['qrcode'] . '">
                            <div class="card-body">
                                <p class="card-text">Ngân hàng: MBBank</p>
                                <p class="card-text">Số tài khoản: 86666270103</p>
                                <p class="card-text">Chủ tài khoản: Nguyễn Thế Quang</p>
                                <p class="card-text">Số tiền: ' . number_format($totalTien) . ' VND</p>
                                <p class="card-text">Nội dung: ' . $_SESSION['qrcode_content'] . '</p>
                            </div>
                        </div>
                    </div>';
                    unset($_SESSION['qrcode']);
                    unset($_SESSION['qrcode_content']);
                }
                ?> -->

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
                                $status_text = '';

                                switch ($trangThai) {
                                    case 0:
                                        $status_text = 'Đang xử lý';
                                        break;
                                    case 1:
                                        $status_text = 'Đang giao';
                                        break;
                                    case 2:
                                        $status_text = 'Hoàn thành';
                                        break;
                                    default:
                                        $status_text = 'Không xác định';
                                        break;
                                }

                                echo '<tr>
                                    <td style="width: 10%;">'.$id.'</td>
                                    <td style="width: 15%;">'.$hoTen.', 0'.$sdt.'</td>
                                    <td style="width: 15%;">'.$diaChi.'</td>
                                    <td style="width: 12%;">'.$totalTien.' VNĐ</td>
                                    <td style="width: 12%;">'.$ghiChu.'</td>
                                    <td style="width: 12%;">'.$timeNhan.'</td>
                                    <td style="width: 12%;">'.$status_text.'</td>
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