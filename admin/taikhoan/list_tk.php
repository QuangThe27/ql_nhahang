<div class="col-10 admin-boxright" style="min-height: 100vh;">
                <div class="admin-boxright-heading pt-3">
                    <div class="">
                      <a href="index.php?act=them_tk">
                        <button type="button" class="btn btn-success">Thêm tài khoản</button>
                      </a>
                    </div>
                    <form action="index.php?act=list_tk_dmtk" method="post" class="pt-3">
                      <input type="hidden" name="act" value="list_tk_dmtk">
                      <select class="form-select" name="id_dmtk" style="max-width: 140px;" onchange="this.form.submit()">
                          <option value="">Loại tài khoản</option>
                          <?php
                              foreach ($list_dmtk as $dmtk) {
                                  extract($dmtk);
                                  echo '<option value="'.$id.'">'.$ten.'</option>';
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
                            <th>Tài khoản</th>
                            <th>Mật khẩu</th>
                            <th>Email</th>
                            <th>Họ tên</th>
                            <th>Tel</th>
                            <th>Địa chỉ</th>
                            <th style="width: 17%;">Chức năng</th>
                          </tr>
                        </thead>
                        <?php
                          foreach ($list_tk as $tk) {
                            extract($tk);

                            $sua_tk = "index.php?act=sua_tk&id=".$id;
                            $xoa_tk = "index.php?act=xoa_tk&id=".$id;

                            echo '<tbody>
                              <tr>
                                <td ">'.$id.'</td>
                                <td>'.$taiKhoan.'</td>
                                <td>'.str_repeat("*", strlen($matKhau)).'</td>
                                <td>'.$email.'</td>
                                <td>'.$hoTen.'</td>
                                <td>0'.$sdt.'</td>
                                <td>'.$diaChi.'</td>
                                <td style="width: 17%;">
                                  <a href="'.$sua_tk.'"><button type="button" class="btn btn-success">Sửa</button></a>
                                  <a href="'.$xoa_tk.'"><button type="button" class="btn btn-success">Xóa</button></a>
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