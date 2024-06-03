<div class="col-10 admin-boxright" style="min-height: 100vh;">
                <div class="admin-boxright-heading pt-3">
                    <div class="">
                      <a href="index.php?act=them_sp">
                        <button type="button" class="btn btn-success">Thêm sản phẩm</button>
                      </a>
                    </div>

                    <form action="index.php?act=list_sp_dmsp" method="post" class="pt-3">
                      <input type="hidden" name="act" value="list_sp_dmsp">
                      <select class="form-select" name="id_dmsp" style="max-width: 140px;" onchange="this.form.submit()">
                          <option value="">Danh sách sản phẩm</option>
                          <?php
                              foreach ($list_dmsp as $dmsp) {
                                  extract($dmsp);
                                  echo '<option value="'.$id.'">'.$tenDm.'</option>';
                              }
                          ?>    
                      </select>
                  </form>
                </div>
                <div class="admin-boxright-body pt-4">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Mô tả</th>
                            <th>Chức năng</th>
                          </tr>
                        </thead>

                        <?php
                          foreach ($list_sp as $sp) {
                            extract($sp);
                            $hinhpath = "../upload/".$hinhAnh; 
                            if (is_file($hinhpath)) {
                              $hinh_sp = "<img src='".$hinhpath."' height='80'>";
                            } else {
                              $hinh_sp = "no photo";
                            }

                            $sua_sp = "index.php?act=sua_sp&id=".$id;
                            $xoa_sp = "index.php?act=xoa_sp&id=".$id;

                            echo '
                                <tbody>
                                <tr>
                                  <td>'.$id.'</td>
                                  <td>'.$tenSp.'</td>
                                  <td>'.$giaTien.'</td>
                                  <td>'.$hinh_sp.'</td>
                                  <td>'.$soLuong.'</td>
                                  <td>'.$moTa.'</td>
                                  <td>
                                    <a class="button_a" href="'.$sua_sp.'"><button type="button" class="btn btn-success">Sửa</button></a>
                                    <a class="button_a" href="'.$xoa_sp.'"><button type="button" class="btn btn-success">Xóa</button></a>
                                  </td>
                                </tr>
                              </tbody>
                            ';
                          }
                        ?>
                      </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>