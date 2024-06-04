<div class="col-10 admin-boxright" style="min-height: 100vh;">
                <div class="admin-boxright-heading pt-3">
                  <a href="index.php?act=them_dmtk">
                    <button type="button" class="btn btn-success">Thêm danh mục</button>
                  </a>
                </div>
                <div class="admin-boxright-body pt-4">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Mã danh mục</th>
                            <th>Loại tài khoản</th>
                            <th>Chức năng</th>
                          </tr>
                        </thead>
                        <?php 
                            foreach ($list_dmtk as $dmtk) {
                              extract($dmtk);

                              $sua_dmtk = "index.php?act=sua_dmtk&id=".$id;
                              $xoa_dmtk = "index.php?act=xoa_dmtk&id=".$id;

                              echo '<tbody>
                                  <tr>
                                  <td>'.$id.'</td>
                                  <td>'.$ten.'</td>
                                  <td>
                                    <a class="button_a" href="'.$sua_dmtk.'"><button type="button" class="btn btn-success">Sửa</button></a>
                                    <a class="button_a" href="'.$xoa_dmtk.'"><button type="button" class="btn btn-success">Xóa</button></a>
                                  </td>
                                </tr>
                                </tbody>';
                            }
                        ?>
                      </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>