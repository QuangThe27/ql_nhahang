<div class="col-10 admin-boxright" style="min-height: 100vh;">
                <div class="admin-boxright-heading pt-3">

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

                                    echo '<tr>
                                        <td>'.$id.'</td>
                                        <td>'.$idtk.'</td>
                                        <td>'.$hoTen.', 0'.$sdt.'</td>
                                        <td>'.$diaChi.'</td>
                                        <td>'.$totalTien.' VNĐ</td>
                                        <td>'.$ghiChu.'</td>
                                        <td>'.$timeNhan.'</td>
                                        <td>'.$trangThai.'</td>
                                        <td>
                                            <a class="button_a" href="index.php?act=chitiethoadon">
                                                <button type="button" class="btn btn-success">Chi tiết</button>
                                            </a>
                                            <a class="button_a" href="'.$sua.'">
                                                <button type="button" class="btn btn-success mt-2">Sửa</button>
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
        </div>
    </div>
</body>
</html>