<div class="col-10 admin-boxright" style="min-height: 100vh;">
                <div class="admin-boxright-heading pt-3">
                    <form class="container__left-headeing" action="index.php?act=search_hd" method="post">
                        <label for="search" class="form-label">Tìm kiếm hóa đơn:</label>
                        <div class="d-flex">
                            <input class="form-control me-2" type="text" placeholder="Search" id="search" name="search" style="width: 140px;">
                            <button class="btn" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="admin-boxright-body pt-4">
                    <table class="table">
                        <thead class="table-success">
                            <tr>
                            <th style="width: 5%;">Mã đơn</th>
                            <th style="width: 5%;">Mã user</th>
                            <th style="width: 15%;">Khách hàng</th>
                            <th style="width: 15%;">Địa chỉ</th>
                            <th style="width: 15%;">Tổng tiền</th>
                            <th style="width: 15%;">Ghi chú</th>
                            <th style="width: 10%;">Thời gian </th>
                            <th style="width: 10%;">Trạng thái</th>
                            <th style="width: 10%;">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($list_bill as $bill) {
                                    extract($bill);
                                    $sua = 'index.php?act=edit_bill&id='.$id;
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
                                        <td>'.$id.'</td>
                                        <td>'.$idtk.'</td>
                                        <td>'.$hoTen.', 0'.$sdt.'</td>
                                        <td>'.$diaChi.'</td>
                                        <td>'.$totalTien.' VNĐ</td>
                                        <td>'.$ghiChu.'</td>
                                        <td>'.$timeNhan.'</td>
                                        <td>'.$status_text.'</td>
                                        <td>
                                            <a class="button_a" href="index.php?act=chitiethoadon">
                                                <button type="button" class="btn btn-success">Chi tiết</button>
                                            </a>
                                            <a class="button_a" href="'.$sua.'">
                                                <button type="button" class="btn btn-success mt-2">Sửa</button>
                                            </a>
                                        </td>
                                    </tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>