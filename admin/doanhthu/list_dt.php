<?php
$tongTienHoaDon = 0;

if (isset($list_bill) && count($list_bill) > 0) {
    foreach ($list_bill as $bill) {
        if ($bill['trangThai'] === '2') {
            $tongTienHoaDon += $bill['totalTien'];
        }
    }
}

require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['export'])) {
    $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'Mã đơn');
    $sheet->setCellValue('B1', 'Mã user');
    $sheet->setCellValue('C1', 'Khách hàng');
    $sheet->setCellValue('D1', 'Địa chỉ');
    $sheet->setCellValue('E1', 'Tổng tiền');
    $sheet->setCellValue('F1', 'Ghi chú');
    $sheet->setCellValue('G1', 'Thời gian');
    $sheet->setCellValue('H1', 'Trạng thái');

    $row = 2;
    foreach ($list_bill as $bill) {
        if ($bill['trangThai'] === '2') {
            $sheet->setCellValue('A'.$row, $bill['id']);
            $sheet->setCellValue('B'.$row, $bill['idtk']);
            $sheet->setCellValue('C'.$row, $bill['hoTen'].', 0'.$bill['sdt']);
            $sheet->setCellValue('D'.$row, $bill['diaChi']);
            $sheet->setCellValue('E'.$row, $bill['totalTien']);
            $sheet->setCellValue('F'.$row, $bill['ghiChu']);
            $sheet->setCellValue('G'.$row, $bill['timeNhan']);
            $sheet->setCellValue('H'.$row, $bill['trangThai']);
            $row++;
        }
    }

    $sheet->setCellValue('A'.$row, 'Tổng doanh thu:');
    $sheet->setCellValue('E'.$row, $tongTienHoaDon);

    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->setOffice2003Compatibility(true);
    $filename= "doanh_thu.xlsx";
    $writer->save($filename);
    header("location:".$filename);
    exit;
}
?>

<div class="col-10 admin-boxright" style="min-height: 100vh;">
                <div class="admin-boxright-heading pt-3">
                    <form class="container__left-headeing" action="index.php?act=search_dt" method="post" style="display: inline-block">
                        <label for="search" class="form-label">Tìm kiếm hóa đơn:</label>
                        <div class="d-flex">
                            <input class="form-control me-2" type="date" placeholder="Search" id="search_from" name="search_from" style="width: 160px;">
                            <i class="fa-solid fa-angles-right p-2"></i>
                            <input class="form-control me-2" type="date" placeholder="Search" id="search_to" name="search_to" style="width: 160px;">
                            <button class="btn" type="submit">Search</button>
                        </div>
                    </form>
                    <div class="p-2" style="display: inline-block; margin-left: 30px;">
                        <span><p class="h6" style="display: inline-block;">Tổng doanh thu:</p> <?php echo number_format($tongTienHoaDon); ?> VND</span>
                    </div>
                    <form action="" method="post">
                        <input type="hidden" name="search_from" value="<?php echo isset($from_date) ? $from_date : ''; ?>">
                        <input type="hidden" name="search_to" value="<?php echo isset($to_date) ? $to_date : ''; ?>">
                        <button type="submit" name="export">Export</button>
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
                                if (isset($list_bill) && count($list_bill) > 0) {
                                    foreach ($list_bill as $bill) {
                                        extract($bill);
                                        if ($trangThai === '2') {
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
                                                </td>
                                            </tr>';
                                        }
                                    }
                                } else {
                                    echo '<tr><td colspan="9" class="text-center">Không tìm thấy hóa đơn nào.</td></tr>';
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