<div class="col-10 admin-boxright" style="min-height: 100vh;">
                <div class="admin-boxright-heading pt-3">
                    <a href="index.php?act=them_dmsp">
                      <button type="button" class="btn btn-success">Thêm danh mục</button>
                    </a>
                </div>
                <div class="admin-boxright-body pt-4">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Mã danh mục</th>
                            <th>Loại sản phẩm</th>
                            <th>Chức năng</th>
                          </tr>
                        </thead>

                        <?php
                          foreach ($list_dmsp as $dmsp) {
                            extract($dmsp);
                            $sua_dmsp = "index.php?act=sua_dmsp&id=".$id;
                            $xoa_dmsp = "index.php?act=xoa_dmsp&id=".$id;

                            echo '
                              <tbody>
                                <tr>
                                <td>'.$id.'</td>
                                <td>'.$tenDm.'</td>
                                <td>
                                    <a class="button_a" href="'.$sua_dmsp.'">
                                      <button type="button" class="btn btn-success">Sửa</button>
                                    </a>

                                    <a class="button_a" href="'.$xoa_dmsp.'">
                                      <button type="button" class="btn btn-success">Xóa</button>
                                    </a>
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